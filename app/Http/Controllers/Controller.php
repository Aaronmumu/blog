<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * 方法描述:返回JSON
     * @author Aaron zt-7650
     * @date 2018/12/18 13:56
     * @link http://www.zongteng.com.cn/
     * @param array $data
     * @param string $ret succ | fail | http-code
     * @param string $message
     * @param array $errMessage
     */
    public static function responseJson($data = [], $ret = 'succ', $message = '成功', $errMessage = [])
    {
        if ($ret !== 'succ' && $message === '成功') {
            $message = '失败';
        }
        $result = [
            'ret' => $ret,
            'data' => $data,
            'message' => $message,
            'errMessage' => $ret,
        ];
        die(\GuzzleHttp\json_encode($result));
    }

    /**
     * 方法描述 数组转对象
     * @author Aaron zt-7650
     * @date 2018/12/18 14:47
     * @link http://www.zongteng.com.cn/
     * @param $data
     * @param string $type
     * @return StdClass
     */
    public static function formatArrayObject($data, $type = 'formatToObj')
    {

        if ($type == 'formatToArr') {
            if (is_object($data)) {
                foreach ($data as $key => $value) {
                    $array[$key] = $value;
                }
            } else {
                $array = $data;
            }

            $reuslt = $array;
        }
        if ($type == 'formatToObj') {
            if (gettype($data) != 'array') {
                return;
            }
            foreach ($data as $k => $v) {
                if (gettype($v) == 'array' || getType($v) == 'object') {
                    $data[$k] = (object)array_to_object($v);
                }
            }
            return (object)$data;
        }
        return $reuslt;
    }
}
