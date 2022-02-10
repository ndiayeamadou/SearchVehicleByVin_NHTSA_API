<?php

namespace App\Services\Vehicule;

use App\Models\Vehicle;

interface VehiculesServicesInt 
{
    /**
    *@return Vehicle
    *@param String $vin 
     */
    public function getVehiculeByVin(String $vin):Vehicle;
}