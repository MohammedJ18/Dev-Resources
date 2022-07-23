<?php

namespace Database\Seeders;

use App\Models\SubSection;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class SubSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //3 subsections for each category
        $categories = Category::get();
        foreach($categories as $category) {
            for($i = 1 ; $i <= 3 ; $i++) {
                SubSection::create([
                    'category_id' => $category->id,
                    'name' => 'SubSection '.$i,
                    'image' => 'https://t3.ftcdn.net/jpg/03/59/09/04/360_F_359090423_7kA3WC9HnDEf1I9dx4ccGFhhO90vmzhk.jpg',
                ]);
            }
        }

        // $categories = Category::get();
        // for ($i = 1; $i <= 3; $i++) {
        //     SubSection::create([
        //         'category_id' => $categories->random()->id,
        //         'name' => 'SubSection ' . $i,
        //         'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQDttUldMhvUdmfNai-4itlsclMIvHUkCn0pQ&usqp=CAU',
        //     ]);
        // }



        // // category_id: 1
        // ### id = 1 ###
        // SubSection::create([
        //     'category_id' => 1,
        //     'name' => ' html',
        //     'image' => 'https://assets.hongkiat.com/uploads/minimalist-dekstop-wallpapers/non-4k/preview/24.jpg?3',
        // ]);

    //     ### id = 2 ###
    //     SubSection::create([
    //         'category_id' => 1,
    //         'name' => ' css',
    //         'image' => 'https://assets.hongkiat.com/uploads/minimalist-dekstop-wallpapers/non-4k/preview/24.jpg?3',
    //     ]);

    //     ### id = 3 ###
    //     SubSection::create([
    //         'category_id' => 1,
    //         'name' => ' javascript',
    //         'image' => 'https://assets.hongkiat.com/uploads/minimalist-dekstop-wallpapers/non-4k/preview/24.jpg?3',
    //     ]);

    //     // category_id: 2
    //     ### id = 4 ###
    //     SubSection::create([
    //         'category_id' => 2,
    //         'name' => ' php',
    //         'image' => 'https://assets.hongkiat.com/uploads/minimalist-dekstop-wallpapers/non-4k/preview/24.jpg?3',
    //     ]);

    //     ### id = 5 ###
    //     SubSection::create([
    //         'category_id' => 2,
    //         'name' => ' mysql',
    //         'image' => 'https://assets.hongkiat.com/uploads/minimalist-dekstop-wallpapers/non-4k/preview/24.jpg?3',
    //     ]);

    //     ### id = 6 ###
    //     SubSection::create([
    //         'category_id' => 2,
    //         'name' => ' mongo',
    //         'image' => 'https://assets.hongkiat.com/uploads/minimalist-dekstop-wallpapers/non-4k/preview/24.jpg?3',
    //     ]);

    //     // category_id: 3
    //     ### id = 7 ###
    //     SubSection::create([
    //         'category_id' => 3,
    //         'name' => ' java',
    //         'image' => 'https://assets.hongkiat.com/uploads/minimalist-dekstop-wallpapers/non-4k/preview/24.jpg?3',
    //     ]);

    //     ### id = 8 ###
    //     SubSection::create([
    //         'category_id' => 3,
    //         'name' => ' c#',
    //         'image' => 'https://assets.hongkiat.com/uploads/minimalist-dekstop-wallpapers/non-4k/preview/24.jpg?3',
    //     ]);

    //     ### id = 9 ###
    //     SubSection::create([
    //         'category_id' => 3,
    //         'name' => ' c++',
    //         'image' => 'https://assets.hongkiat.com/uploads/minimalist-dekstop-wallpapers/non-4k/preview/24.jpg?3',
    //     ]);
     }
}
