<?php

namespace App\Http\Resources;

use App\Models\Category;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{


    public function toArray($request)
    {
        $products=$this->whenLoaded('products');
        $children=$this->whenLoaded('children');
        $parent=$this->whenLoaded('parent');
       return [
           'categoryId'=>$this->id,
           'categoryName'=>$this->name,
           'categoryParent'=>new CategoryResource($parent),
           'categoryChildren'=>CategoryResource::collection($children),
           'categoryProducts'=>ProductResource::collection($products),
       ];
    }
}
