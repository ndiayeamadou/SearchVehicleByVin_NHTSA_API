<?php

namespace Tests\Feature;

use App\Models\Vehicle;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class VehicleTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_a_vehicle_can_be_stored_to_the_database()
    {
        $response = $this->post('api/vehicles', [
            'vin'   =>  '1D7HA18N44S587566',
            'make'   =>  'HONDA',
            'model'   =>  'CR-V',
            'model_year'   =>  '2013',
            'trim'   =>  '1500',
            'body_class'   =>  'Sport Utility Vehicle (SUV)/Multi-Purpose Vehicle (MPV)',
            'vehicle_type'   =>  'MULTIPURPOSE PASSENGER VEHICLE (MPV)',
            'drive_type'   =>  'AWD/All-Wheel Drive',
            'fuel_type_primary'   =>  'Gasoline',
        ]);

        $response->assertOk();
        $this->assertCount(1, Vehicle::all());
    }
}
