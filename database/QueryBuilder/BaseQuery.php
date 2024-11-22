<?php

namespace Database\QueryBuilder;

class BaseQuery {
    public function buildQuery($Data, $sort, $relations = null, $select = null , $where = null)
    {
        $query = $Data::query();

        if ($relations) {
            foreach ($relations as $relation => $closure) {
                if ($closure instanceof \Closure) {
                    $query->with([$relation => $closure]);
                } else {
                    $query->with($relation);
                }
            }
        }

        if ($select) {
            $query->select($select);
        }

        if (is_array($sort)) {
            $query->orderBy($sort[0], $sort[1]);
        } else {
            switch ($sort) {
                case 'latest':
                    $query->latest();
                    break;
                case 'oldest':
                    $query->oldest();
                    break;
            }
        }

        if ($where) {
            foreach ($where as $condition) {
                $query->where($condition[0], $condition[1], $condition[2]);
            }
        }

        return $query;
    }
}