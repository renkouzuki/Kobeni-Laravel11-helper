<?php

namespace Database\QueryBuilder;

class FindId extends BaseQuery {
    public function findById($Data, $id, $relations = null, $select = null)
    {
        $query = $this->buildQuery($Data, $relations, $select);

        return $query->find($id);
    }

    public function findByIds($Data, $ids, $relations = null, $select = null)
    {
        $query = $this->buildQuery($Data, $relations, $select);

        return $query->whereIn('id', $ids)->get();
    }
}