<?php

namespace App\Models\Blog\Basics;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class WebsiteTheme extends Model
{
    protected $table = 'website_theme';
    protected $primaryKey = 'wt_id';
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

    public function getByCondition($condition, $orderBy = '', $field = 'REPLACE_PRIMARY')
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
