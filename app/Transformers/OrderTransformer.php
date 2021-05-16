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

        return [
            'id' => (int) $model->id,
            // 'user' => $userTrans->transform($model->user),
            'order_contact' => $orderContactTrans->transform($model->contact),
            'vehicle' => $vehicleTrans->transform($model->vehicle),
            'route' => !empty($model->route) ? $routeTrans->transform($model->route) : null,
            "payment" => !empty($model->payment) ? $paymentTrans->transform($model->payment) : null,
            "status" => $model->status,
            "price" => $model->price,
            "formatted_price" => format_money($model->price),
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
