<?php

namespace App\Transformers;

use App\OrderContact;
use App\User;

/**
 * Class OrderContactTransformer.
 *
 * @package namespace App\Transformers;
 */
class OrderContactTransformer 
{
    /**
     * Transform the OrderContact entity.
     *
     * @param \App\Models\OrderContact $model
     *
     * @return array
     */
    public function transform(OrderContact $model)
    {
        return [
            'id' => (int) $model->id,
            'name' => $model->name,
            'email' => $model->email,
            'phone' => $model->phone,
            'phone2' => $model->phone2,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}