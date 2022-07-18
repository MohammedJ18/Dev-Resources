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
                    'image' => 'https://assets.hongkiat.com/uploads/minimalist-dekstop-wallpapers/non-4k/preview/24.jpg?3',

                ]);
            }

    }
}
