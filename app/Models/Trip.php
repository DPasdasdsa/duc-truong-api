<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    protected $table = 'trips';
    protected $fillable = [
        'name', 'code', 'route_id','date','departure_time', 'estimated_arrival_time', 'status'
    ];
}
