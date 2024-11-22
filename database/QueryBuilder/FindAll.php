<?php

namespace Database\QueryBuilder;

class FindAll {
    public function allWithPagination($Data , $sort , $perPage = 10 , $relations = null , $select = null){
        $query = $Data::query();

        if ($relations) {
            $query->with($relations);
        }

        if ($select) {
            $query->select($select);
        }
    
        if (!is_array($sort)) {
            switch ($sort) {
                case 'latest':
                    $query->latest();
                    break;
                case 'oldest':
                    $query->oldest();
                    break;
            }
        } else {
            $query->orderBy($sort[0], $sort[1]);
        }
    
        return $query->paginate($perPage);
    }

    public function allWithLimit(){

    }
}

