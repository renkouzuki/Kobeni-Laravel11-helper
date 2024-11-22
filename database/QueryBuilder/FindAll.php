<?php

namespace Database\QueryBuilder;

class FindAll extends BaseQuery
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
}
