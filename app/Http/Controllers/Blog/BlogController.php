<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use App\Services\Blog\Blog\BlogServices;

class BlogController extends Controller
{
    /*$input = $request->all();  #获取所有参数
    $input_many = $request->except(['_token', 'create_time']); #获取除了_token和create_time意外的所有参数*/

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('blog.blog.index');
    }

    public function blog()
    {
        $list = BlogServices::getByCondition([], '*', 0, 0, 'b_id DESC');
        foreach ($list as $index => $item) {
            $list[$index] = self::formatArrayObject($item, 'formatToArr');
        }

        return view('blog.blog.index', [
            'list' => $list
        ]);
    }

    public function addBlog(Request $request)
    {
        $res = [];
        try {
            $input = $request->only(['b_id', 'type', 'title', 'cover', 'content']);  #获取部分参数
            if ($request->isMethod('post') && !empty($input)) {
                $insert = [
                    'b_id' => $input['b_id'],
                    'type' => $input['type'],
                    'title' => $input['title'],
                    'cover' => $input['cover'],
                    'content' => $input['content'],
                    'creat_at' => date('Y-m-d H:i:s'),
                ];
                if (empty($insert['b_id'])) {
                    unset($insert['b_id']);
                    $res[] = BlogServices::add($insert);
                } else {
                    $res = BlogServices::updateByCondition($insert, $insert['b_id']);
                }
            }
        } catch (Exception $e) {
            $this->responseJson([], 'fail', $e->getMessage());
        }
        $this->responseJson($res);
    }

    public function getBlogJson(Request $request, $id)
    {
        $res = [];
        try {
            $res = BlogServices::getByCondition([
                'b_id' => $id
            ]);
            if (empty($res)) {
                throw new Exception('数据不存在');
            } else {
                $res = $res[0];
            }
        } catch (Exception $e) {
            $this->responseJson([], 'fail', $e->getMessage());
        }
        $this->responseJson($res);
    }

    public function delBlog(Request $request, $id)
    {
        $res = [];
        try {
            $res = BlogServices::deleteByCondition([
                'b_id' => $id
            ]);
            if (!$res) {
                throw new Exception('删除失败');
            }
        } catch (Exception $e) {
            $this->responseJson([], 'fail', $e->getMessage());
        }
        $this->responseJson($res);
    }
}
