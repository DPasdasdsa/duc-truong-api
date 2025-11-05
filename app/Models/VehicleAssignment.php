<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleAssignment extends Model
{
    protected $table = 'vehicle_assignments';
    protected $fillable = [
      'trip_id', 'vehicle_id', 'driver_id', 'assistant_id', 'status'
    ];
}
