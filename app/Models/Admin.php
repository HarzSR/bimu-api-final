<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;
    use Notifiable;

    protected $guard = 'admin';
    protected $fillable = [
        'user_name', 'user_type', 'user_location', 'user_card_id', 'user_phone', 'email', 'password', 'begin_date', 'end_date', 'barcode', 'image', 'status', 'created_at', 'updated_at'
    ];
    protected $hidden = [
        'password', 'remember_token'
    ];
}
