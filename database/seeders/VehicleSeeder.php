<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $file = file_get_contents(__DIR__ . '/data/vehicle.json');
        $rawVehicles = json_decode($file);
        $dataInsert = [];
        foreach ($rawVehicles as $vehicle) {
            $dataInsert[] = [
                'license_plate' => $vehicle->license_plate,
                'type' => $vehicle->type . ' chỗ',
                'brand' => 'Honda',
                'status' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }
        DB::table('vehicles')->insert($dataInsert);
    }
}
