<?php

namespace App\Services\Platform\Basics;

use App\Models\Platform\Basics\History;
use App\Services\Platform\Service;

class HistoryServices extends Service
{
    private static $class = null;

    public static function getInstance()
    {
        if (!isset(self::$class)) {
            self::$class = new History();
        }
        return self::$class;
    }

    public static function add(array $data)
    {
        return self::getInstance()->add($data);
    }

    public static function deleteByCondition($condition = [], $field = 'REPLACE_PRIMARY')
    {
        return self::getInstance()->deleteByCondition($condition, $field);
    }

    public static function getAll()
    {
        return self::getInstance()->getAll()->toArray();
    }

    public static function getByCondition($condition = [], $type = '*', $skip = 0, $take = 0, $orderBy = '', $groupBy = '', $field = 'REPLACE_PRIMARY')
    {
        return self::getInstance()->getByCondition($condition, $type, $skip, $take, $orderBy, $groupBy, $field);
    }

    public static function updateByCondition($data, $condition, $field = 'REPLACE_PRIMARY')
    {
        return self::getInstance()->updateByCondition($data, $condition, $field);
    }
}
