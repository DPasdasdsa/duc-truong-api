<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employees')->truncate();
        $file = file_get_contents(__DIR__ . '/data/employee.json');
        $rawVehicles = json_decode($file);
        $dataInsert = [];
        foreach ($rawVehicles as $vehicle) {
            $dataInsert[] = [
                'name' => $vehicle->name,
                'code' => $vehicle->code,
                'phone' => $vehicle->phone,
                'role' => $vehicle->role,
                'status' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }
        DB::table('employees')->insert($dataInsert);
    }
}
