<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $fillable = ['city_id', 'name'];

    protected $table = 'cities';
    protected $primaryKey = 'city_id';

    // NO USAR EL TIMESTAMPS DE LARAVEL 
    // * AUnque no es correcto para el tema de DEBUG del poyecto

    public $timestamps = false;
}
