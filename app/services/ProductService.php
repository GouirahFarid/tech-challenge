<?php


namespace App\services;


use App\Http\Resources\ProductResource;
use App\repositories\ProductRepository;

class ProductService implements IService
{
    protected ProductRepository  $productRepository;
    public  function __construct(ProductRepository $productRepository)
    {
        $this->productRepository=$productRepository;
    }

    public function getAllModels()
    {
        return ProductResource::collection($this->productRepository->getAllModels());
    }

    public function getModelById($modelId)
    {
       return  $this->productRepository->getById($modelId);
    }

    public function CreateModel($model)
    {
        $fileName=preg_replace('/\s+/', '', $model->get('name')).'.'.$model->file('image')->extension();
        $product=[
            'name'=>$model->get('name'),
            'description'=>$model->get('description'),
            'price'=>(double)$model->get('price'),
            'image'=>$fileName
        ];
        $product=$this->productRepository->create($product);
        if($product){
            if(!empty($model->get('categoriesId'))){
                $categoriesId=explode(',', $model->get('categoriesId'));
                foreach ($categoriesId as $categoryId){
                    $product->categories()->attach($categoryId);
                }
            }
            $model->file('image')->storeAs('public',$fileName);

        }else
            return response()->json(['message'=>'product not created'],404);
    }

    public function deleteModel($modelId)
    {
        $this->productRepository->delete($modelId);
    }
}
