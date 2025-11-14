<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RouteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('routes')->truncate();
        $file = file_get_contents(__DIR__ . '/data/route.json');
        $rawVehicles = json_decode($file);
        $dataInsert = [];
        foreach ($rawVehicles as $vehicle) {
            $dataInsert[] = [
                'name' => $vehicle->name,
                'code' => $vehicle->code,
                'departure_location' => $vehicle->departure_location,
                'arrival_location' => $vehicle->arrival_location,
                'distance_km' => $vehicle->distance_km,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }
        DB::table('routes')->insert($dataInsert);
    }
}
