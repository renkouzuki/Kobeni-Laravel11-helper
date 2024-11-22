<?php

namespace Database\QueryBuilder;

class Delete extends BaseQuery {
/**
     * Delete a single record with dynamic conditions.
     *
     * @param  string  $model The model class name (e.g., 'App\Models\User').
     * @param  mixed  $condition A closure or array of conditions.
     * @return bool
     */
    public function deleteWithCondition($model, $condition)
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

        return $query->delete();
    }

    public function deleteManyWithCondition($model, $condition)
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

        return $query->delete();
    }
}