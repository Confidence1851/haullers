<?php

namespace App\Traits;

use App\Route;
use App\Vehicle;

class RoutePrice
{

    public static function calc(Vehicle $vehicle, Route $route = null)
    {
        $weight = $vehicle->capacity;
        $unit = $vehicle->unit;
        $type = "Full-day";

        if (!empty($route->id)) {
            $price = $route->price;

            if (strtolower($unit) == strtolower("Tonne(s)")) {
                $price = $price * $weight;
            }
            if (strtolower($unit) == strtolower("Kg")) {
                $price = ($price / 1000) * $weight;
            }
            $type = "Route";
        } else {
            $price = $vehicle->price;
        }

        $data = [
            "price" => $price,
            "formatted_price" => format_money($price),
            "weight" => $weight,
            "unit" => $unit,
            "type" => $type
        ];
        return $data;
    }
}
