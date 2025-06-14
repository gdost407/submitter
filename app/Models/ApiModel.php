<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Database\BaseBuilder;
use Config\Services;

class ApiModel extends Model
{
    protected $table;

    protected $primaryKey = 'id';

    protected $allowedFields = [];

    public function setTable($table)
    {
        $this->table = $table;
        return $this;
    }

    public function GetData($table, $field = '*', $condition = [], $group = '', $order = '', $limit = '', $singleRow = false)
    {
        $builder = $this->db->table($table);
        $builder->select($field);

        if (!empty($condition)) {
            $builder->where($condition);
        }

        if (!empty($group)) {
            $builder->groupBy($group);
        }

        if (!empty($order)) {
            $builder->orderBy($order);
        }

        if (!empty($limit)) {
            $builder->limit($limit);
        }

        if ($singleRow) {
            return $builder->get()->getRow();
        } else {
            return $builder->get()->getResult();
        }
    }

    public function GetDataAll($table, $field = '*', $condition = [], $group = '', $order = '', $limit = '', $page = '')
    {
        $builder = $this->db->table($table);
        $builder->select($field);

        if (!empty($condition)) {
            $builder->where($condition);
        }

        if (!empty($group)) {
            $builder->groupBy($group);
        }

        if (!empty($order)) {
            $builder->orderBy($order);
        }

        if (!empty($limit) && !empty($page)) {
            $offset = ($page - 1) * $limit;
            $builder->limit($limit, $offset);
        } elseif (!empty($limit)) {
            $builder->limit($limit);
        }

        return $builder->get()->getResult();
    }

    public function PageCount($table, $condition = [], $limit = '')
    {
        $builder = $this->db->table($table);

        if (!empty($condition)) {
            $builder->where($condition);
        }

        $totalRows = $builder->countAllResults();
        return ceil($totalRows / $limit);
    }

    public function SaveData($table, $data, $condition = [])
    {
        $builder = $this->db->table($table);

        if (!empty($condition)) {
            return $builder->where($condition)->set($data)->update();
        } else {
            return $builder->insert($data);
        }
    }

    public function DeleteData($table, $condition = [], $limit = '')
    {
        $builder = $this->db->table($table);

        if (!empty($condition)) {
            $builder->where($condition);
        }

        if (!empty($limit)) {
            $builder->limit($limit);
        }

        return $builder->delete();
    }

    public function checkExists($table, $where)
    {
        $builder = $this->db->table($table);

        $builder->select('*')->where($where);

        return ($builder->get()->getRow()) ? 1 : 0;
    }

    public function SelectField($table, $where, $field = '*')
    {
        $builder = $this->db->table($table);
        
        $builder->select($field)->where($where);

        return $builder->get();
    }
    

}