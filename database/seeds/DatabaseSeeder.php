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
        DB::table('role_users')->truncate();
        DB::table('roles')->truncate();
        DB::table('users')->truncate();
        DB::table('activations')->truncate();
        DB::table('prod_attr')->truncate();
        DB::table('attributes')->truncate();
        DB::table('menu')->truncate();
        DB::table('menu_items')->truncate();


        /*CATEGORIES, PRODUCTS, OTHERRS*/
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

        $model3 = array('name' => 'New model4');

        $category = App\Category::create($category);
        $product = App\Product::create($product);
        $category->products()->save($product);

        $brand = App\Brand::create($brands);
        $brand->product()->save($product);

        $brand2 = App\Brand::create($brands2);
        $brand->brandmodel()->saveMany($models);

        $model = App\BrandModel::create($model3);
       $brand->brandmodel()->save($model);
        $model->product()->save($product);

        //$model->product()-save($product);

        $brand2->brandmodel()->saveMany($models2);

        $attribute = App\Attribute::create($attribute);
        $item = App\Item::create($item);
        $attribute->items()->attach($item->id);


        /*Cabinet ADMIN menu*/
        $cabinetAdminMenu = [
            'name' => 'Admin menu',
            'location' => 'admin'
        ];
        $cabinetMenuItemsAdmin = [
            new App\MenuItems([
                'name' => 'Товары',
                'slug' => 'product.index',
                'order' => 0,
                'hidden' =>false
            ]),
            new App\MenuItems([
                'name' => 'Категории',
                'slug' => 'category.index',
                'order' => 1,
                'hidden' =>false
            ]),
            new App\MenuItems([
                'name' => 'Заказы',
                'slug' => 'orders.index',
                'order' => 2,
                'hidden' =>false
            ]),
            new App\MenuItems([
                'name' => 'Пользователи',
                'slug' => 'users.index',
                'order' => 3,
                'hidden' =>false
            ]),
            new App\MenuItems([
                'name' => 'Настройки',
                'slug' => 'settings',
                'order' => 4,
                'hidden' =>false
            ]),
        ];

        $menu = App\Menu::create($cabinetAdminMenu);
        $menu->menuItems()->saveMany($cabinetMenuItemsAdmin);

        /*Cabinet USER menu*/

        $cabinetUserMenu = [
            'name' => 'User menu',
            'location' => 'cabinet'
        ];
        $cabinetMenuItemsUser = [
            new App\MenuItems([
                'name' => 'Профиль',
                'slug' => 'profile',
                'order' => 0,
                'hidden' =>false
            ]),
            new App\MenuItems([
                'name' => 'Заказы',
                'slug' => 'myorders',
                'order' => 1,
                'hidden' =>false
            ]),

        ];

        $menu = App\Menu::create($cabinetUserMenu);
        $menu->menuItems()->saveMany($cabinetMenuItemsUser);



        /*Main menu*/

        $menu = [
            'name' => 'Main menu',
            'location' => 'header',
        ];

        $mainMenuItems = [
                  new App\MenuItems([
                      'name' => 'Home',
                      'slug' => 'home',
                      'order' => 0,
                      'hidden' =>false
                  ]),
            new App\MenuItems([
                'name' => 'Man',
                'slug' => 'man',
                'order' => 1,
                'hidden' =>false
            ]),
            new App\MenuItems([
                'name' => 'Woman',
                'slug' => 'woman',
                'order' => 2,
                'hidden' =>false
            ]),
            new App\MenuItems([
                'name' => 'Accessories',
                'slug' => 'accessories',
                'order' => 3,
                'hidden' =>false
            ]),
            new App\MenuItems([
                'name' => 'About',
                'slug' => 'about',
                'order' => 4,
                'hidden' =>false
            ]),

        ];

        $menu = App\Menu::create($menu);
        $menu->menuItems()->saveMany($mainMenuItems);

        /*USERS AND ROLES*/
        $user1 = [
            'login' => 'user',
            'password' => '123456',
            'email' => 'user@mail.ru',
            'first_name' => 'User',
            'last_name' => 'User'
        ];

        $user2 = [
            'login' => 'admin',
            'password' => '123456',
            'email' => 'admin@mail.ru',
            'first_name' => 'Admin',
            'last_name' => 'Admin'
        ];

        $role1 = Sentinel::getRoleRepository()->createModel()->create([
            'name' => 'Registered',
            'slug' => 'Registered',
        ]);

        $role1->permissions = [
            'registered' => true,
        ];

        $role1->save();

        $role2 = Sentinel::getRoleRepository()->createModel()->create([
            'name' => 'Administrator',
            'slug' => 'Administrator',
        ]);

        $role2->permissions = [
            'admin' => true,
        ];

        $role2->save();

        $user = Sentinel::registerAndActivate($user1);
        $role1->users()->attach($user);

        $user = Sentinel::registerAndActivate($user2);
        $role2->users()->attach($user);


    }
}
