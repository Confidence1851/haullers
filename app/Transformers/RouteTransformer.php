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
    public function transform(Route $model)
    {
        return [
            'id' => (int) $model->id,
            'start' => $model->start,
            'end' => $model->end,
            'start_to_end' => "$model->start to $model->end",
            'price' => $model->price,
            "formatted_price" => format_money($model->price , 0),
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
