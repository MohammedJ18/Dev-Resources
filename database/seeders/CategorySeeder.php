<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

            for($i = 1 ; $i <= 3 ; $i++) {
                Category::create([
                    'name' => 'Category '.$i,
                    'image' => 'https://www.ubertheme.com/wp-content/uploads/sites/3/edd/2014/06/jm-category.png',

                ]);
            }

    }
}
