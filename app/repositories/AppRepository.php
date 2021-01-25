<?php


namespace App\repositories;


use http\Client\Response;
use Illuminate\Database\Eloquent\Model;

abstract class AppRepository
{
   /* protected $model;
    public  function __construct(Model $model)
    {
        $this->model=$model;
    }

    public function getAll()
    {
        return $this->model::all();
    }

    public function getById($id)
    {
        $model= $this->model::query()->find($id);
        if ($model)
            return $model;
        else
            return  response()->json(['errorMessage'=>'Not found'],404);
    }

    public function create($model)
    {
        $this->model::query()->create($model);
        return response()->json(['successMessage'=>'model has been created'],201);
    }

    public function delete($id)
    {
        $model= $this->model::query()->find($id);
        if ($model){
            $model->delete();
        return response()->json(['successMessage'=>'model has been deleted'],201);}
        else
            return  response()->json(['errorMessage'=>'Not found'],404);
    }

    public function paginate($limit)
    {
        $this->model::query()->paginate($limit);
    }*/
}
