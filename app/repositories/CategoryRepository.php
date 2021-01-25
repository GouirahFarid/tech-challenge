<?php


namespace App\repositories;


use App\Http\Resources\CategoryResource;
use App\Models\Category;


class CategoryRepository implements IRepository
{
    protected Category $category;
    public  function __construct(Category $category)
    {
        $this->category=$category;
    }

    public function getAllModels()
    {
        return $this->category::with(['products','parent','children'])->get();
    }

    public function getById($id)
    {
        $model= $this->category::query()->with('products','parent','children')->find($id);
        if ($model)
            return new CategoryResource($model);
        else
            return  response()->json(['errorMessage'=>'Not found'],404);
    }

    public function create($model)
    {
        return $this->category::query()->create($model);
    }

    public function delete($id)
    {
        $model= $this->category::query()->find($id);
        if ($model){
            $model->delete();
            return response()->json(['successMessage'=>'model has been deleted'],201);}
        else{
            return  response()->json(['errorMessage'=>'Not found'],404);
        }

    }

    public function paginate($limit)
    {
        $this->category::query()->paginate($limit);
    }


}
