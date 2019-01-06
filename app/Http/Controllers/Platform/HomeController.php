<?php

namespace App\Http\Controllers\Platform;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Platform\Basics\WebsiteThemeServices;
use App\Services\Platform\Basics\NewsServices;
use App\Services\Platform\Basics\FaqServices;
use App\Services\Platform\Basics\HistoryServices;
use App\Services\Platform\Basics\JobServices;

class HomeController extends Controller
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
        return view('platform.home.index');
    }

    public function business(Request $request, $type)
    {
        switch ($type) {
            case 'business1' :
                $viewUrl = 'platform.home.business1';
                break;
            case 'business2' :
                $viewUrl = 'platform.home.business2';
                break;
            case 'business3' :
                $viewUrl = 'platform.home.business3';
                break;
            default :
                $viewUrl = 'platform.home.business1';
                break;
        }
        return view($viewUrl);
    }

    public function osw()
    {
        return view('platform.home.osw');
    }

    public function help(Request $request, $type, $page = 1, $pageSize = 10)
    {
        $list = [];
        $skip = $pageSize*($page-1);
        switch ($type) {
            case 'faq' :
                $total = count(FaqServices::getAll());
                $list = FaqServices::getByCondition([], '*', $skip, $pageSize, 'creat_time desc');
                $viewUrl = 'platform.home.faq';
                break;
            case 'news' :
                $total = count(NewsServices::getAll());
                $list = NewsServices::getByCondition([], '*', $skip, $pageSize, 'creat_time desc');
                $viewUrl = 'platform.home.news';
                break;
            default :
                $total = count(FaqServices::getAll());
                $list = FaqServices::getByCondition([], '*', $skip, $pageSize, 'creat_time desc');
                $viewUrl = 'platform.home.faq';
                break;
        }
        foreach ($list as $index => $item) {
            $list[$index] = self::formatArrayObject($item, 'formatToArr');
        }
        return view($viewUrl, [
            'total' => $total,
            'curr' => $page,
            'limit' => $pageSize,
            'list' => $list
        ]);
    }

    public function newDetail(Request $request, $id)
    {
        $detail = NewsServices::getByCondition([
            'n_id' => $id
        ]);
        $detail = empty($detail) ? [] : $detail[0];
        return view('platform.home.secdetail', [
            'detail' => $detail
        ]);
    }

    public function faqDetail(Request $request, $id)
    {
        $detail = FaqServices::getByCondition([
            'f_id' => $id
        ]);
        $detail = empty($detail) ? [] : $detail[0];
        return view('platform.home.secdetail', [
            'detail' => $detail
        ]);
    }

    public static function multiArraySort($arr, $shortKey, $short = SORT_DESC, $shortType = SORT_REGULAR)
    {
        foreach ($arr as $key => $data) {
            $name[$key] = $data[$shortKey];
        }
        array_multisort($name, $shortType, $short, $arr);
        return $arr;
    }

    public function about()
    {
        $res = [];
        $list = HistoryServices::getByCondition();
        foreach ($list as $index => $item) {
            $list[$index] = self::formatArrayObject($item, 'formatToArr');
        }
        foreach ($list as $item) {
            $res[$item['year']][] = $item;
        }
        foreach ($res as $k=>$re) {
            $res[$k] = self::multiArraySort($re, 'month');
        }
        krsort($res);
        $jobList = JobServices::getByCondition([], '*', 0, 2, 'creat_time desc');
        foreach ($jobList as $index => $item) {
            $jobList[$index] = self::formatArrayObject($item, 'formatToArr');
        }
        return view('platform.home.about', [
            'list' => $res,
            'jobList' => $jobList,
        ]);
    }

    public function jobList(Request $request, $page = 1, $pageSize = 10)
    {
        $total = count(JobServices::getAll());
        $skip = $pageSize*($page-1);
        $jobList = JobServices::getByCondition([], '*', $skip, $pageSize, 'creat_time desc');
        foreach ($jobList as $index => $item) {
            $jobList[$index] = self::formatArrayObject($item, 'formatToArr');
        }
        return view('platform.home.jobs', [
            'total' => $total,
            'curr' => $page,
            'limit' => $pageSize,
            'jobList' => $jobList,
        ]);
    }
}
