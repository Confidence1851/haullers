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
            "formatted_price" => format_money($model->price),
            'created_at' => carbon()->parse($model->created_at)->format("Y-m-d h:i:s A"),
            'updated_at' => carbon()->parse($model->updated_at)->format("Y-m-d h:i:s A")
        ];
    }
}
