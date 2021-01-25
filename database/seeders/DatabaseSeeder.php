<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

     /* $product=Product::query()->create([
          'name'=>'product12',
          'description'=>'badhbasghdggasydyagsd',
          'image'=>'152/sddhsd'
      ]);
      $child=Category::query()->create([
          'name'=>'catChild'
      ]);*/
      $category=new Category();
      $category->name='babies';
      $category->save();
      /*$category->products()->attach($product->id);
      $category->children()->save($child);*/
    }
}
