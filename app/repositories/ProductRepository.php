<?php


namespace App\repositories;



use App\Http\Resources\ProductResource;
use App\Models\Product;

class ProductRepository implements IRepository
{
    protected Product $product;
    public  function __construct(Product $product)
    {
        $this->product=$product;
    }

    public function getAllModels()
    {
        return $this->product::with('categories')->get();
    }

    public function getById($id)
    {
        $model= $this->product::query()->with('categories')->find($id);
        if ($model){
            return new ProductResource($model);
        }
        else
            return  response()->json(['errorMessage'=>'Not found'],404);
    }

    public function create($model)
    {
        return $this->product::query()->create($model);
    }

    public function delete($id)
    {
        $model= $this->product::query()->find($id);
        if ($model){
            $model->delete();
            return response()->json(['successMessage'=>'model has been deleted'],201);}
        else{
            return  response()->json(['errorMessage'=>'Not found'],404);
        }
    }

    public function paginate($limit)
    {
        $this->product::query()->paginate($limit);
    }
}
