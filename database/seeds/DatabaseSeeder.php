<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('categories')->delete();
        DB::table('products')->truncate();
        DB::table('items')->delete();
        DB::table('brands')->delete();
        DB::table('brand_models')->truncate();
        DB::table('item_attr')->truncate();
        DB::table('prod_attr')->truncate();
        DB::table('attributes')->truncate();


        $category = [
           'name' => 'Main',
            'description' => 'Our main category for all products',
            'slug' => 'main',
            'hidden' => 0
        ];

        $item = [
            'hidden' =>false,
            'qty' => 0,
            'price' => 10,
            'slug' => 'main'
        ];

        $product = [
            'hidden' => false,
            'slug' => 'product'
        ];

        $attribute = [
            'key' => 'key',
            'value' => 'value'
        ];

        $brands = ['name' => 'New brand1'];
        $brands2 = ['name' => 'New brand1'];

        $models = array(
            new App\BrandModel(array('name' => 'New model1')),
            new App\BrandModel(array('name' => 'New model2')),
            new App\BrandModel(array('name' => 'New model3')),
        );

        $models2 = array(
            new App\BrandModel(array('name' => 'New model4')),
            new App\BrandModel(array('name' => 'New model5')),
            new App\BrandModel(array('name' => 'New model6')),
        );

        $category = App\Category::create($category);
        $product = App\Product::create($product);
        $category->products()->save($product);

        $brand = App\Brand::create($brands);
        $brand2 = App\Brand::create($brands2);
        $brand->brandmodel()->saveMany($models);
        $brand2->brandmodel()->saveMany($models2);





        $attribute = App\Attribute::create($attribute);
        $item = App\Item::create($item);
        $attribute->items()->attach($item->id);

    }
}
