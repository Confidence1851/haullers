<?php

namespace App\Transformers;

use App\Vehicle;

/**
 * Class VehicleTransformer.
 *
 * @package namespace App\Transformers;
 */
class VehicleTransformer 
{
    public function __construct($withCategory = false)
    {
        $this->withCategory = $withCategory;
    }

    /**
     * Transform the Vehicle entity.
     *
     * @param \App\Models\Vehicle $model
     *
     * @return array
     */
    public function transform(Vehicle $model)
    {
        if($this->withCategory){
            $vehicleCatTrans = new VehicleCategoryTransformer(false);
            $vehicleCat = $vehicleCatTrans->transform($model->vehicleCategory , false);
        }
        $routeCatTrans = new RouteCategoryTransformer;
        $routeCat = $routeCatTrans->transform($model->routeCategory);
        $otherImages = [
            $model->image , $model->image1 , $model->image2 , $model->image3 , $model->image4
        ];
        $processedImages = [];
        foreach ($otherImages as $image) {
            if(!empty(trim($image))){
                $processedImages[] = my_asset('images/backend_images/products/medium/'.$image);
            }
        }
        return [
            'id' => (int) $model->id,
            "category" => $vehicleCat ?? null,
            'name' => $model->vehicle_name,
            'model' => $model->vehicle_model,
            'status' => $model->vehicle_status,
            'description' => $model->vehicle_description,
            'price' => $model->price,
            "formatted_price" => format_money($model->price),
            'available' => $model->quantity_available,
            'use_count' => $model->use_count,
            'plate_number' => $model->plate_number,
            'capacity' => $model->capacity,
            'unit' => $model->unit,
            "unitCapacity" => "$model->capacity $model->unit", 
            'route' => $routeCat,
            "main_image" => my_asset('images/backend_images/products/medium/'.$model->image),
            "images" => $processedImages,
            'created_at' => carbon()->parse($model->created_at)->format("Y-m-d h:i:s A"),
            'updated_at' => carbon()->parse($model->updated_at)->format("Y-m-d h:i:s A")
        ];
    }


    public function collect($collection)
    {
        return collect($collection)->map(function ($model) {
            return $this->transform($model);
        });
    }
}
