<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\User::class,5)->create()->each(function ($user){
             $user->products()
                ->create(factory(\App\Product::class)->make()->toArray());
        });
    }
}
