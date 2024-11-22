<?php

namespace Database\QueryBuilder;

class FindId {
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

    private function buildQuery($Data, $relations = null, $select = null)
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

        return $query;
    }
}