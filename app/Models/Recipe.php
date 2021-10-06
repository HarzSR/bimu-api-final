<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function device()
    {
        return $this->belongsTo('App\Models\Device','device_mac','mac_address');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id','id');
    }
}
