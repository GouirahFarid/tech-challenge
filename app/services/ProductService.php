<?php


namespace App\services;


use App\repositories\ProductRepository;

class ProductService implements IService
{
    protected ProductRepository  $productRepository;
    public  function __construct(ProductRepository $productRepository)
    {
        $this->productRepository=$productRepository;
    }

    public function getAll()
    {
        return $this->productRepository->getAll();
    }

    public function getModelById($modelId)
    {
        $this->productRepository->getById($modelId);
    }

    public function CreateModel($model)
    {
        $this->productRepository->create($model);
    }

    public function deleteModel($modelId)
    {
        $this->productRepository->delete($modelId);
    }
}
