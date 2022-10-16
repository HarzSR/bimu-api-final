<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Locations extends Model
{
    use HasFactory;

    protected $fillable = [
        'location_name', 'location_latlong', 'begin_date', 'end_date','status', 'created_at', 'updated_at'
    ];
}
