<?php


namespace App\services;


use App\Http\Resources\CategoryResource;
use App\repositories\CategoryRepository;

class CategoryService implements IService
{
    protected CategoryRepository $categoryRepository;
    public  function __construct( CategoryRepository $categoryRepository)
    {
        $this->categoryRepository=$categoryRepository;
    }

    public function getAllModels()
    {
        return CategoryResource::collection($this->categoryRepository->getAllModels());
    }

    public function getModelById($modelId)
    {
        return $this->categoryRepository->getById($modelId);
    }

    public function CreateModel($model)
    {
        $cat=[
            'name'=>$model->get('name'),
        ];
        $category=$this->categoryRepository->create($cat);
        if ($category && !empty($model->get('categoryId'))){
            dump($model->get('categoryId'));
            $category->parent()->associate((integer)$model->get('categoryId'));
            $category->save();
        }
    }

    public function deleteModel($modelId)
    {
        $this->categoryRepository->delete($modelId);
    }
}
