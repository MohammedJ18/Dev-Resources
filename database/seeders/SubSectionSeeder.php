<?php

namespace Database\Seeders;

use App\Models\SubSection;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // category_id: 1
        ### id = 1 ###
        SubSection::create([
            'category_id' => 1,
            'name' => ' html',
            'image' => 'https://assets.hongkiat.com/uploads/minimalist-dekstop-wallpapers/non-4k/preview/24.jpg?3',
        ]);

        ### id = 2 ###
        SubSection::create([
            'category_id' => 1,
            'name' => ' css',
            'image' => 'https://assets.hongkiat.com/uploads/minimalist-dekstop-wallpapers/non-4k/preview/24.jpg?3',
        ]);

        ### id = 3 ###
        SubSection::create([
            'category_id' => 1,
            'name' => ' javascript',
            'image' => 'https://assets.hongkiat.com/uploads/minimalist-dekstop-wallpapers/non-4k/preview/24.jpg?3',
        ]);

        // category_id: 2
        ### id = 4 ###
        SubSection::create([
            'category_id' => 2,
            'name' => ' php',
            'image' => 'https://assets.hongkiat.com/uploads/minimalist-dekstop-wallpapers/non-4k/preview/24.jpg?3',
        ]);

        ### id = 5 ###
        SubSection::create([
            'category_id' => 2,
            'name' => ' mysql',
            'image' => 'https://assets.hongkiat.com/uploads/minimalist-dekstop-wallpapers/non-4k/preview/24.jpg?3',
        ]);

        ### id = 6 ###
        SubSection::create([
            'category_id' => 2,
            'name' => ' mongo',
            'image' => 'https://assets.hongkiat.com/uploads/minimalist-dekstop-wallpapers/non-4k/preview/24.jpg?3',
        ]);

        // category_id: 3
        ### id = 7 ###
        SubSection::create([
            'category_id' => 3,
            'name' => ' java',
            'image' => 'https://assets.hongkiat.com/uploads/minimalist-dekstop-wallpapers/non-4k/preview/24.jpg?3',
        ]);

        ### id = 8 ###
        SubSection::create([
            'category_id' => 3,
            'name' => ' c#',
            'image' => 'https://assets.hongkiat.com/uploads/minimalist-dekstop-wallpapers/non-4k/preview/24.jpg?3',
        ]);

        ### id = 9 ###
        SubSection::create([
            'category_id' => 3,
            'name' => ' c++',
            'image' => 'https://assets.hongkiat.com/uploads/minimalist-dekstop-wallpapers/non-4k/preview/24.jpg?3',
        ]);
    }
}
