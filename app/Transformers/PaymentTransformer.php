<?php

namespace App\Transformers;

use App\Payment;

/**
 * Class PaymentTransformer.
 *
 * @package namespace App\Transformers;
 */
class PaymentTransformer 
{
    /**
     * Transform the Payment entity.
     *
     * @param \App\Models\Payment $model
     *
     * @return array
     */
    public function transform(Payment $model)
    {
        return [
            'id' => (int) $model->id,
            'reference' => $model->payment_ref_no,
            'price' => $model->price,
            "formatted_price" => format_money($model->price),
            'status' => $model->status,
            'date' => $model->date,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
