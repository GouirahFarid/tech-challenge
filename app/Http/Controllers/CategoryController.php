<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use App\services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected CategoryService $categoryService;
    public  function __construct(CategoryService $categoryService)
    {
        $this->categoryService=$categoryService;
    }

    public function index()
    {
        return $this->categoryService->getAllModels();
    }

    public function store(Request $request)
    {
        $this->categoryService->CreateModel($request);
    }


    public function show($category)
    {
        return $this->categoryService->getModelById($category);
    }

    public function destroy( $category)
    {
        $this->categoryService->deleteModel($category);
    }
}
