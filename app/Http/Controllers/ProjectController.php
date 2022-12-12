<?php

namespace App\Http\Controllers;

use App\Post;
use Exception;
use Carbon\Carbon;
use App\Models\City;
use App\Models\User;
use App\Models\Company;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ProjectController extends Controller
{
    public function getAllProjects(){
        $projects = Project::all();

        return $projects;
    }

    public function getTenProjects()
    {
        $projects = Project::latest()
        ->take(5)
        ->get();

        return $projects;
    }

    public function getChunkProjects()
    {

        //* Chunk para poder manipular los datos.
        // Project::chunk(200, function($projects){

        //     foreach ($projects as $key => $value) {
        //         dd($value);
        //         //return $value->name;
        //         $data[] = $value;
        //     }
        // });

        // return $data;

        $projects = Project::all()->chunk(200);



        return $projects;
    }

    public function getFirstorFailProject()
    {
        try {
            $projects = Project::where(Project::IS_ACTIVE, '=', 2)->firstOrFail();

            return $projects;
        } catch (ModelNotFoundException $e) {
            return $e->getMessage();
        }
    }

    public function storeProject()
    {
        try {

            foreach (range(1, 31) as $range) {
                User::create([
                    'user_id'  => $range,
                    'name'     => $range . 'name',
                ]);
                
                City::create([
                    'city_id'  => $range,
                    'name'     => $range . 'name',
                ]);
                Company::create([
                    'company_id'    => $range,
                    'name'          => $range . 'name',
                ]);

                Project::create([
                    'project_id'    => $range,
                    'city_id'       => $range,
                    'company_id'    => $range,
                    'user_id'       => $range,
                    'name'          => $range . 'jhona',
                    'execution_date'=> Carbon::now(),
                    'is_active'     => 1,
                    'created_at'    => Carbon::now(),
                    'updated_at'    => Carbon::now(),
                ]);
            }

            return 'Guardado exitosamente';

        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function updateProject($id)
    {
        try {

            //* Para actualizar un registro
            // $project = Project::where(Project::PROJECT_ID, '=', $id)->firstOrFail();

            // $project->name = 'Este es prueba 1';
            // $project->save();


            //* Para actualizar todo registro inactivo
            $projects = Project::all();
            $count = 0;
            foreach ($projects as $project) {
                if($project->is_active != 1){
                    $project->is_active = 1;
                    $project->save();
                    $count += 1;
                }
            }

            if($count > 0){
                $response = [
                    'mensaje'   => 'Se actualizo exitosamente',
                    'count'     => 'Se actualizaron ' . $count . ' registros',
                ];
            }else{
                $response = [
                    'mensaje'   => 'No hubo actualizaciones',
                ];
            }
            return $response;

        } catch (ModelNotFoundException $e) {
            return $e->getMessage();
        }
    }

    public function destroyProject($id)
    {
        try {

            //*Eliminar proyecto
            //$project =  Project::where(Project::PROJECT_ID, '=', $id)->firstOrFail();
            //$project->delete();

            //*Eliminar proyectos
            $project = Project::latest()
            ->take(10)
            ->delete();
            
            $response = [
                'mensaje'   => 'Se elimino el proyecto',
            ];
            return $response;

        } catch (ModelNotFoundException $e) {
            return $e->getMessage();
        }
    }
}
