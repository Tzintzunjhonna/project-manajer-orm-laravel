<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = ['company_id', 'name'];

    use HasFactory;
    protected $table = 'companies';
    protected $primaryKey = 'company_id';

    // NO USAR EL TIMESTAMPS DE LARAVEL 
    // * AUnque no es correcto para el tema de DEBUG del poyecto

    public $timestamps = false;
}
