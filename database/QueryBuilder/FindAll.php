<?php

namespace Database\QueryBuilder;

class FindAll
{
    public function allWithPagination($Data, $sort = 'latest', $perPage = 10, $relations = null, $select = null , $where = null)
    {
        $query = $this->buildQuery($Data, $sort, $relations, $select);

        return $query->paginate($perPage);
    }

    public function allWithLimit($Data, $limit = 10, $offset = 0, $relations = null, $select = null, $sort = 'latest' , $where = null)
    {
        $query = $this->buildQuery($Data, $sort, $relations, $select);

        return $query->skip($offset)->take($limit)->get();
    }

    public function allData($Data, $sort = 'latest', $relations = null, $select = null , $where = null)
    {
        $query = $this->buildQuery($Data, $sort, $relations, $select);

        return $query->get();
    }

    public function allDataWithSelect($Data, $select = [], $relations = null , $where = null)
    {
        $query = $this->buildQuery($Data, 'latest', $relations, $select);

        return $query->get();
    }

    private function buildQuery($Data, $sort, $relations = null, $select = null , $where = null)
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
