<?php

namespace App\Services\Vehicule;

use App\Models\Vehicle;
use App\helper\HttpClient;
use Exception;

class VehiculesServices implements VehiculesServicesInt
{
 /**
    *@return Vehicle
    *@param String $vin
     */
    public function getVehiculeByVin(String $vin):Vehicle{
        $vehicule = Vehicle::where('vin',$vin)->first();
        if($vehicule){
            return $vehicule;
        }
        $url= env("BASE_API_URL") . "vehicles/decodevinvaluesextended/".$vin;
            $options = [
                'data'=>['format'=>'json'],
                'headers'=>[
                    'Content-Type'=>'application/json'
                ]
            ];
            $rest = HttpClient::get($url,$options);
            if($rest){
                $rest=(array)$rest['Results'][0];
                return Vehicle::create([
                     'vin'=>$vin,
                     'make'=>$rest['Make'],
                     'model'=>$rest['Model'],
                     'model_year'=>$rest['ModelYear'],
                     'trim'=>$rest['Trim'],
                     'body_class'=>$rest['BodyClass'],
                     'vehicle_type'=>$rest['VehicleType'],
                     'drive_type'=>$rest['DriveType'],
                     'fuel_type_primary'=>$rest['FuelTypePrimary'],
                 ]);
            }else{
                return new Exception("Voiture introuvable !!!");
            }

    }
}
