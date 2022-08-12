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

        $categories1 = ['html' , 'css' , 'javascript' ];
        $categories2 = ['php' , 'mysql' , 'sql'];
        $categories3 = ['dart' , 'flutter' , 'react'];

            for($i = 1 ; $i <= 3 ; $i++) {
                SubSection::create([
                    'category_id' => 1,
                    'name' => $categories1[$i-1],
                    'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS-IEklJcEwa5s7uOP0MJ44MAzwh7xMt9WKPA&usqp=CAU',
                ]);
            }

            for($i = 1 ; $i <= 3 ; $i++) {
                SubSection::create([
                    'category_id' => 2,
                    'name' => $categories2[$i-1],
                    'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQLIZCy7NfVUCpn4ViHcYImFR_cytfxd9c-ow&usqp=CAU',
                ]);
            }

            for($i = 1 ; $i <= 3 ; $i++) {
                SubSection::create([
                    'category_id' => 3,
                    'name' => $categories3[$i-1],
                    'image' => 'https://www.seguetech.com/wp-content/uploads/2015/08/segue-blog-mobileapp-planning.png',
                ]);
            }


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
