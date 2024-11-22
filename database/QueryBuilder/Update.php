<?php

namespace Database\QueryBuilder;

class Update extends BaseQuery {
    public function updateWithCondition($model, $data, $condition)
    {
        if (!class_exists($model)) {
            throw new \InvalidArgumentException("The model $model does not exist.");
        }

        $query = $model::query();

        if (is_callable($condition)) {
            $query->where($condition);
        } elseif (is_array($condition)) {
            $query->where($condition);
        } else {
            throw new \InvalidArgumentException('Condition must be a closure or an array');
        }
        return $query->update($data);
    }

    public function updateManyWithCondition($model, $data, $condition)
    {
        if (!class_exists($model)) {
            throw new \InvalidArgumentException("The model $model does not exist.");
        }

        foreach ($data as $item) {
            $query = $model::query();

            if (is_callable($condition)) {
                $query->where($condition);
            } elseif (is_array($condition)) {
                $query->where($condition);
            } else {
                throw new \InvalidArgumentException('Condition must be a closure or an array');
            }

            $query->update($item);
        }

        return true;
    }
}