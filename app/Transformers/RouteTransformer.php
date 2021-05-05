<?php

namespace App\Transformers;

use App\Route;

/**
 * Class RouteTransformer.
 *
 * @package namespace App\Transformers;
 */
class RouteTransformer 
{
    /**
     * Transform the Route entity.
     *
     * @param \App\Models\Route $model
     *
     * @return array
     */
    public function index(Route $model)
    {
        return [
            'id' => (int) $model->id,
            'start' => $model->start,
            'end' => $model->end,
            'price' => $model->price,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
