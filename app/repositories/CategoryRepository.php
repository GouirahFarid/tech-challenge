<?php


namespace App\repositories;


use App\Models\Category;

class CategoryRepository implements IRepository
{
    protected  Category  $category;
    public  function __construct( Category $category)
    {
        $this->category=$category;
    }

    public function getAll()
    {
        return $this->category::all();
    }

    public function getById($id)
    {
        return $this->category::query()->findOrFail($id);
    }

    public function create($model)
    {
        return $this->category::query()->create($model);
    }

    public function delete($id)
    {
        $this->category::query()->findOrFail($id)->delete();
        return response()->json(['message'=>'category Has been deleted'],201);
    }
}
