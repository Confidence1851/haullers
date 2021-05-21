<?php

namespace App\Transformers;

use App\Order;
use App\OrderContact;
use App\Route;

/**
 * Class OrderTransformer.
 *
 * @package namespace App\Transformers;
 */
class OrderTransformer 
{
    /**
     * Transform the Route entity.
     *
     * @param \App\Models\Route $model
     *
     * @return array
     */
    public function transform(Order $model)
    {
        // $userTrans = new UserTransformer;
        $orderContactTrans = new OrderContactTransformer;
        $vehicleTrans = new VehicleTransformer;
        $paymentTrans = new PaymentTransformer;
        $routeTrans = new RouteTransformer;

        $route = $model->route;

        return [
            'id' => (int) $model->id,
            // 'user' => $userTrans->transform($model->user),
            'order_contact' => !empty($model->contact) ? $orderContactTrans->transform($model->contact) : null,
            'vehicle' => $vehicleTrans->transform($model->vehicle),
            'route' => !empty($route) ? $routeTrans->transform($route) : null,
            "routeType" => !empty($route) ? "$route->start to $route->end" : "Full-day booking",
            "payment" => !empty($model->payment) ? $paymentTrans->transform($model->payment) : null,
            "status" => $model->status,
            "price" => $model->price,
            "formatted_price" => format_money($model->price),
            'created_at' => carbon()->parse($model->created_at)->format("Y-m-d h:i:s A"),
            'updated_at' => carbon()->parse($model->updated_at)->format("Y-m-d h:i:s A")
        ];
    }
}
