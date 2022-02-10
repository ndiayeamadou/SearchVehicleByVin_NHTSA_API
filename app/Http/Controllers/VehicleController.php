<?php

namespace App\Http\Controllers;

use App\helper\HttpClient;
use App\Models\Vehicle;
use App\Services\Vehicule\VehiculesServices;
use App\Services\Vehicule\VehiculesServicesInt;
use Exception;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    /**
        *@return Vehicle
        *@param String $vin
    */
    public function getVehicleByVin(String $vin) {
        $vehicule = Vehicle::where('vin',$vin)->first();
        if($vehicule){
            //return $vehicule;
            return response()->json([
                'error' => 'Ce véhicule existe déjà dans la BDD.',
                'data'  => $vehicule
            ]);
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

            return response()->json(
                []
            );

    }

}
