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
            'status' => $model->status(),
            'date' => $model->date,
            'created_at' => carbon()->parse($model->created_at)->format("Y-m-d h:i:s A"),
            'updated_at' => carbon()->parse($model->updated_at)->format("Y-m-d h:i:s A")
        ];
    }
}
