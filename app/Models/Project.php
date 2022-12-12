<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['name', 'execution_date', 'is_active', 'created_at', 'updated_at', 'user_id', 'company_id', 'project_id', 'city_id', 'company_id'];  

    use HasFactory;

    protected $table = 'projects';
    protected $primaryKey = 'project_id';
    
    const IS_ACTIVE = 'is_active';
    const PROJECT_ID = 'project_id';

    // NO USAR EL TIMESTAMPS DE LARAVEL 
    // * Aunque no es correcto para el tema de DEBUG del poyecto

    public $timestamps = false;
}
