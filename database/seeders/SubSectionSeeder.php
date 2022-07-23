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
                    'image' => 'data:image/jpeg;base64,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',
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
