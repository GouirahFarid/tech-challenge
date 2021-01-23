<?php


namespace App\repositories;


use App\Models\Product;

class ProductRepository implements IRepository
{

    protected  Product $product;
    public  function  __construct(Product $product)
    {
        $this->product=$product;
    }

    public function getAll()
    {
       return $this->product::all();
    }

    public function getById($id)
    {
       return $this->product::query()->findOrFail($id);
    }

    public function create($model)
    {
        $this->product::query()->create($model);
        return response()->json([
            'message'=>'Product  has been created'
        ],201);
    }

    public function delete($id)
    {
        $this->product::query()->findOrFail($id)->delete();
        return response()->json(['message'=>'Product Has been deleted'],201);
    }
}
