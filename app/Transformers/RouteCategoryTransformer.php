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
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
