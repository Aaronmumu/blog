<?php

namespace App\Http\Controllers\Aaron;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Aaron\Blog\BlogServices;

class BlogController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    public function blog(Request $request, $page = 1, $pageSize = 10)
    {
        $list = [];
        $skip = $pageSize*($page-1);
        $total = count(BlogServices::getAll());
        $list = BlogServices::getByCondition([], '*', $skip, $pageSize, 'creat_at desc');
        foreach ($list as $index => $item) {
            $list[$index] = self::formatArrayObject($item, 'formatToArr');
        }
        return view('aaron.blog.view', [
            'total' => $total,
            'curr' => $page,
            'limit' => $pageSize,
            'list' => $list
        ]);
    }
}
