<?php

namespace App\Transformers;

use App\RouteCategory;

/**
 * Class RouteCategoryTransformer.
 *
 * @package namespace App\Transformers;
 */
class RouteCategoryTransformer 
{
    /**
     * Transform the RouteCategory entity.
     *
     * @param \App\Models\RouteCategory $model
     *
     * @return array
     */
    public function transform(RouteCategory $model)
    {
        return [
            'id' => (int) $model->id,
            'name' => $model->name,
            'created_at' => carbon()->parse($model->created_at)->format("Y-m-d h:i:s A"),
            'updated_at' => carbon()->parse($model->updated_at)->format("Y-m-d h:i:s A")
        ];
    }
}
