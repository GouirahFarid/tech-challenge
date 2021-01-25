<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    public function toArray($request)
    {
        $categories=$this->whenLoaded('categories');
        return [
            'productId'=>$this->id,
            'productName'=>$this->name,
            'productDescription'=>$this->description,
            'price'=>$this->price,
            'productImage'=>$this->image,
            'productCategories'=>CategoryResource::collection($categories)
        ];
    }
}
