<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use App\Services\Blog\Basics\WebsiteThemeServices;
use App\Services\Blog\Basics\BlogServices;
use App\Services\Blog\Basics\FaqServices;
use App\Services\Blog\Basics\HistoryServices;
use App\Services\Blog\Basics\JobServices;

class HomeController extends Controller
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
        return view('blog.index');
    }

    public function pic()
    {
        $exSet = true;
        $list = WebsiteThemeServices::getByCondition([
            'type' => 'banner'
        ], 'sort ASC');
        if (empty($list)) {
            $exSet = false;
            $list = [];
            for ($i = 1; $i < 4; $i++) {
                $detail = [
                    'path' => '',
                    'link' => '',
                    'sort' => $i,
                ];
                $detail = self::formatArrayObject($detail);
                $list[] = $detail;
            }
        }
        return view('blog.pic', [
            'list' => $list,
            'exSet' => $exSet,
        ]);
    }

    /**
     * 方法描述 添加 | 编辑 轮播图
     * @author Aaron zt-7650
     * @date 2018/12/18 14:21
     * @link http://www.zongteng.com.cn/
     * @param Request $request
     */
    public function addBannerPic(Request $request)
    {
        $res = [];
        try {
            WebsiteThemeServices::deleteByCondition([
                'type' => 'banner'
            ]);
            $input = $request->only(['addBannerPic']);  #获取部分参数
            if ($request->isMethod('post') && !empty($input)) {
                foreach ($input['addBannerPic'] as $list) {
                    $data = [
                        'path' => $list['pic'],
                        'link' => empty($list['link']) ? ' ' : $list['link'],
                        'sort' => $list['order'],
                        'type' => 'banner',
                        'creat_time' => date('Y-m-d H:i:s'),
                    ];
                    $res[] = WebsiteThemeServices::add($data);
                }
            }
        } catch (Exception $e) {
            $this->responseJson([], 'fail', $e->getMessage());
        }
        $this->responseJson($res);
    }

    public function news()
    {
        $list = BlogServices::getByCondition([], '*', 0, 0, 'n_id DESC');
        foreach ($list as $index => $item) {
            $list[$index] = self::formatArrayObject($item, 'formatToArr');
        }
        return view('blog.news', [
            'list' => $list
        ]);
    }

    public function addNews(Request $request)
    {
        $res = [];
        try {
            $input = $request->only(['n_id', 'title', 'cover', 'content']);  #获取部分参数
            if ($request->isMethod('post') && !empty($input)) {
                $insert = [
                    'n_id' => $input['n_id'],
                    'title' => $input['title'],
                    'cover' => $input['cover'],
                    'content' => $input['content'],
                    'creat_time' => date('Y-m-d H:i:s'),
                ];
                if (empty($insert['n_id'])) {
                    unset($insert['n_id']);
                    $res[] = BlogServices::add($insert);
                } else {
                    $res = BlogServices::updateByCondition($insert, $insert['n_id']);
                }
            }
        } catch (Exception $e) {
            $this->responseJson([], 'fail', $e->getMessage());
        }
        $this->responseJson($res);
    }

    public function getNewsJson(Request $request, $id)
    {
        $res = [];
        try {
            $res = BlogServices::getByCondition([
                'n_id' => $id
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

    public function delNews(Request $request, $id)
    {
        $res = [];
        try {
            $res = BlogServices::deleteByCondition([
                'n_id' => $id
            ]);
            if (!$res) {
                throw new Exception('删除失败');
            }
        } catch (Exception $e) {
            $this->responseJson([], 'fail', $e->getMessage());
        }
        $this->responseJson($res);
    }

    public function faq()
    {
        $list = FaqServices::getByCondition([], 'f_id DESC');
        foreach ($list as $index => $item) {
            $list[$index] = self::formatArrayObject($item, 'formatToArr');
        }
        return view('blog.faq', [
            'list' => $list
        ]);
    }

    public function addFaq(Request $request)
    {
        $res = [];
        try {
            $input = $request->only(['f_id', 'title', 'content']);  #获取部分参数
            if ($request->isMethod('post') && !empty($input)) {
                $insert = [
                    'f_id' => $input['f_id'],
                    'title' => $input['title'],
                    'content' => $input['content'],
                    'creat_time' => date('Y-m-d H:i:s'),
                ];

                if (empty($insert['f_id'])) {
                    unset($insert['f_id']);
                    $res[] = FaqServices::add($insert);
                } else {
                    $res = FaqServices::updateByCondition($insert, $insert['f_id']);
                }
            }
        } catch (Exception $e) {
            $this->responseJson([], 'fail', $e->getMessage());
        }
        $this->responseJson($res);
    }

    public function getFaqJson(Request $request, $id)
    {
        $res = [];
        try {
            $res = FaqServices::getByCondition([
                'f_id' => $id
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

    public function delFaq(Request $request, $id)
    {
        $res = [];
        try {
            $res = FaqServices::deleteByCondition([
                'f_id' => $id
            ]);
            if (!$res) {
                throw new Exception('删除失败');
            }
        } catch (Exception $e) {
            $this->responseJson([], 'fail', $e->getMessage());
        }
        $this->responseJson($res);
    }

    public function join()
    {
        $list = JobServices::getByCondition([], 'j_id DESC');
        foreach ($list as $index => $item) {
            $list[$index] = self::formatArrayObject($item, 'formatToArr');
        }
        return view('blog.join', [
            'list' => $list,
        ]);
    }

    public function addJoin(Request $request)
    {
        $res = [];
        try {
            $input = $request->only(['j_id', 'job', 'department', 'country', 'city', 'email', 'content']);  #获取部分参数
            if ($request->isMethod('post') && !empty($input)) {
                $insert = [
                    'j_id' => $input['j_id'],
                    'job' => $input['job'],
                    'department' => $input['department'],
                    'country' => $input['country'],
                    'city' => $input['city'],
                    'email' => $input['email'],
                    'content' => $input['content'],
                    'creat_time' => date('Y-m-d H:i:s'),
                ];
                if (empty($insert['j_id'])) {
                    unset($insert['j_id']);
                    $res[] = JobServices::add($insert);
                } else {
                    $res = JobServices::updateByCondition($insert, $insert['j_id']);
                }
            }
        } catch (Exception $e) {
            $this->responseJson([], 'fail', $e->getMessage());
        }
        $this->responseJson($res);
    }

    public function getJoinJson(Request $request, $id)
    {
        $res = [];
        try {
            $res = JobServices::getByCondition([
                'j_id' => $id
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

    public function delJoin(Request $request, $id)
    {
        $res = [];
        try {
            $res = JobServices::deleteByCondition([
                'j_id' => $id
            ]);
            if (!$res) {
                throw new Exception('删除失败');
            }
        } catch (Exception $e) {
            $this->responseJson([], 'fail', $e->getMessage());
        }
        $this->responseJson($res);
    }

    public function about()
    {
        $month = [
            1 => '一月',
            2 => '二月',
            3 => '三月',
            4 => '四月',
            5 => '五月',
            6 => '六月',
            7 => '七月',
            8 => '八月',
            9 => '九月',
            10 => '十月',
            11 => '十一月',
            12 => '十二月',
        ];
        $list = HistoryServices::getByCondition([], 'h_id DESC');
        foreach ($list as $index => $item) {
            $list[$index] = self::formatArrayObject($item, 'formatToArr');
        }
        $res = [];
        foreach ($list as $key => $item) {
            $item['date'] = $item['year'] . ' ' . $month[$item['month']];
            $list[$key] = $item;
        }

        return view('blog.about', [
            'list' => $list,
            'month' => $month,
        ]);
    }

    public function addAbout(Request $request)
    {
        $res = [];
        try {
            $input = $request->only(['h_id', 'year', 'month', 'content']);  #获取部分参数
            if ($request->isMethod('post') && !empty($input)) {
                $insert = [
                    'h_id' => $input['h_id'],
                    'year' => $input['year'],
                    'month' => $input['month'],
                    'content' => $input['content'],
                    'creat_time' => date('Y-m-d H:i:s'),
                ];
                if (empty($insert['h_id'])) {
                    unset($insert['h_id']);
                    $res[] = HistoryServices::add($insert);
                } else {
                    $res = HistoryServices::updateByCondition($insert, $insert['h_id']);
                }
            }
        } catch (Exception $e) {
            $this->responseJson([], 'fail', $e->getMessage());
        }
        $this->responseJson($res);
    }

    public function getAboutJson(Request $request, $id)
    {
        $res = [];
        try {
            $res = HistoryServices::getByCondition([
                'h_id' => $id
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

    public function delAbout(Request $request, $id)
    {
        $res = [];
        try {
            $res = HistoryServices::deleteByCondition([
                'h_id' => $id
            ]);
            if (!$res) {
                throw new Exception('删除失败');
            }
        } catch (Exception $e) {
            $this->responseJson([], 'fail', $e->getMessage());
        }
        $this->responseJson($res);
    }

    public function upload(Request $request)
    {
        if ($request->isMethod('POST')) {
            $file = $request->file('source');

            //判断文件是否上传成功
            if ($file->isValid()) {
                //获取原文件名
                $originalName = $file->getClientOriginalName();
                //扩展名
                $ext = $file->getClientOriginalExtension();
                //文件类型
                $type = $file->getClientMimeType();
                //临时绝对路径
                $realPath = $file->getRealPath();

                $filename = date('Y-m-d-H-i-S') . '-' . uniqid() . '-.' . $ext;

                $bool = Storage::disk('public')->put($filename, file_get_contents($realPath));

                echo json_encode([
                    'status' => $bool,
                    'path' => Storage::url($filename)
                ]);
                exit();
            }
        }
    }

    /**
     * 处理上传文件
     * @return [type] [description]
     */
    public function uploadFile(Request $request)
    {
        $postFile = 'upload';
        $allowedPrefix = ['jpeg', 'jpg', 'png'];
        //检查文件是否上传成功
        if (!$request->hasFile($postFile) || !$request->file($postFile)->isValid()) {
            return $this->CKEditorUploadResponse(0, '文件上传失败');
        }
        $extension = $request->file($postFile)->extension();
        $size = $request->file($postFile)->getSize();

        $filename = $request->file($postFile)->getClientOriginalName();
        //检查后缀名
//        Log::info('extension', [$filename => $extension]);
        if (!in_array($extension, $allowedPrefix)) {
            return $this->CKEditorUploadResponse(0, '文件类型不合法');
        }
        //检查大小
        if ($size > 2 * 1024 * 1024) {
            return $this->CKEditorUploadResponse(0, '文件大小超过限制2M');
        }
        //保存文件
        $ext = $request->file($postFile)->getClientOriginalExtension();
        //文件类型
        $type = $request->file($postFile)->getClientMimeType();
        //临时绝对路径
        $realPath = $request->file($postFile)->getRealPath();

        $filename = date('Y-m-d-H-i-S') . '-' . uniqid() . '-.' . $ext;

        $bool = Storage::disk('public')->put($filename, file_get_contents($realPath));

        return $this->CKEditorUploadResponse($bool, '', $filename, Storage::url($filename));
    }

    /**
     * CKEditor 上传文件的标准返回格式
     * @param [type] $uploaded [description]
     * @param string $error [description]
     * @param string $filename [description]
     * @param string $url [description]
     */
    private function CKEditorUploadResponse($uploaded, $error = '', $filename = '', $url = '')
    {
        return [
            "uploaded" => $uploaded,
            "fileName" => $filename,
            "url" => $url,
            "error" => [
                "message" => $error
            ]
        ];
    }
}
