<?php

namespace App\Http\Controllers;

use App\services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    protected  ProductService  $productService;
    public  function __construct(ProductService $productService)
    {
        $this->productService=$productService;
    }

    public function index()
    {
        return $this->productService->getAllModels();
    }

    public function store(Request $request)
    {
         $this->productService->CreateModel($request);
    }


    public function show($product)
    {
       return $this->productService->getModelById($product);
    }

    public function destroy($product)
    {
        $this->productService->deleteModel($product);
    }
}
