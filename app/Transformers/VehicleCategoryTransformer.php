<?php

namespace App\Transformers;

use App\Vehicle;
use App\VehicleCategory;

/**
 * Class VehicleCategoryTransformer.
 *
 * @package namespace App\Transformers;
 */
class VehicleCategoryTransformer 
{
    public function __construct($withVehicles = true)
    {
        $this->withVehicles = $withVehicles;
    }
    /**
     * Transform the VehicleCategory entity.
     *
     * @param \App\Models\VehicleCategory $model
     *
     * @return array
     */
    public function transform(VehicleCategory $model)
    {
        if($this->withVehicles){
            $vehicleTrans = new VehicleTransformer;
            $vehicles = $vehicleTrans->collect($model->vehicles);
        }

        return [
            'id' => (int) $model->id,
            'name' => $model->name,
            'vehicles' => $vehicles ?? null,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
    

    public function collect($collection)
    {
        return collect($collection)->map(function ($model) {
            return $this->transform($model);
        });
    }


    public function index(VehicleCategory $model)
    {
        $vehicleTrans = new VehicleTransformer;
        $vehicles = Vehicle::where("vehicle_cat_id" , $model->id)->inRandomOrder()->limit(5)->get();
        $vehicles = $vehicleTrans->collect($vehicles);

        return [
            'id' => (int) $model->id,
            'name' => $model->name,
            'vehicles' => $vehicles,
            'created_at' => carbon()->parse($model->created_at)->format("Y-m-d h:i:s A"),
            'updated_at' => carbon()->parse($model->updated_at)->format("Y-m-d h:i:s A")
        ];
    }
}
