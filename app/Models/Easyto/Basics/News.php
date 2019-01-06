<?php

namespace App\Models\Easyto\Basics;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';
    protected $primaryKey = 'n_id';
    public $timestamps = false;

    public function add(array $data)
    {
        return DB::table($this->table)->insert($data);
    }

    public function deleteByCondition($condition, $field = 'REPLACE_PRIMARY')
    {
        if (!is_array($condition)) {
            $field = $field == 'REPLACE_PRIMARY' ? $this->primaryKey : $field;
            $condition = [
                $field => $condition
            ];
        }

        $DB = DB::table($this->table);
        foreach ($condition as $key => $val) {
            $DB->where($key, '=', $val);
        }
        return $DB->delete();
    }

    public function getAll()
    {
        return $this->all();
    }

    public function getByCondition($condition = [], $type = '*', $skip = 0, $take = 0, $orderBy = '', $groupBy = '', $field = 'REPLACE_PRIMARY')
    {
        if (!is_array($condition)) {
            $field = $field == 'REPLACE_PRIMARY' ? $this->primaryKey : $field;
            $condition = [
                $field => $condition
            ];
        }

        $DB = DB::table($this->table);
        foreach ($condition as $key => $val) {
            $DB->where($key, '=', $val);
        }
        if (!empty($orderBy)) {
            $DB->orderByRaw($orderBy);
        }
        if (!empty($skip)) {
            $DB->skip($skip);
        }
        if (!empty($take)) {
            $DB->take($take);
        }
        return $DB->get()->toArray();
    }

    public function updateByCondition($data, $condition, $field = 'REPLACE_PRIMARY')
    {
        if (!is_array($condition)) {
            $field = $field == 'REPLACE_PRIMARY' ? $this->primaryKey : $field;
            $condition = [
                $field => $condition
            ];
        }

        $DB = DB::table($this->table);
        foreach ($condition as $key => $val) {
            $DB->where($key, '=', $val);
        }
        return $DB->update($data);
    }
}
