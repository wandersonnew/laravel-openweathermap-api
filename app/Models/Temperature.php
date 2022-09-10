<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Temperature extends Model
{
    use HasFactory;
    protected $table = 'temperatures';
    protected $fillable = ['status_sky', 'description', 'temp', 'temp_min', 'temp_max', 'country', 'icon', 'city'];
}
