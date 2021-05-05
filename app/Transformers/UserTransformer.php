<?php

namespace App\Transformers;

use App\User;

/**
 * Class UserTransformer.
 *
 * @package namespace App\Transformers;
 */
class UserTransformer 
{
    /**
     * Transform the User entity.
     *
     * @param \App\Models\User $model
     *
     * @return array
     */
    public function transform(User $model)
    {
        return [
            'id' => (int) $model->id,
            'name' => $model->name,
            'email' => $model->email,
            'phone' => $model->phone,
            'phone2' => $model->phone2,
            'role' => $model->role,            
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
