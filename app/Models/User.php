<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = ['user_id', 'name'];

    use HasFactory;

    protected $table = 'users';

    protected $primaryKey = 'user_id';


    // NO USAR EL TIMESTAMPS DE LARAVEL 
    // * Aunque no es correcto para el tema de DEBUG del poyecto

    public $timestamps = false;
    
}
