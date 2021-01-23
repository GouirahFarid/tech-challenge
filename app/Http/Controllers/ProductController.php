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
        return $this->productService->getAll();
    }

    public function store(Request $request)
    {
        dump($request);
       /* $filename=$request->get('name').''.$request->file('image')->extension();
        dump($filename);*/
        return response()->json('message','hello vue');

    }


    public function show($product)
    {
        $this->productService->getModelById($product);
    }

    /*public function update(Request $request, Product $product)
    {
        //
    }*/
    public function destroy($product)
    {
        $this->productService->deleteModel($product);
    }
}
