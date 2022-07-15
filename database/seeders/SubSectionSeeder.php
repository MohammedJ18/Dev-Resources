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
        ]);

        ### id = 2 ###
        SubSection::create([
            'category_id' => 1,
            'name' => ' css',
        ]);

        ### id = 3 ###  
        SubSection::create([
            'category_id' => 1,
            'name' => ' javascript',
        ]);

        // category_id: 2
        ### id = 4 ###
        SubSection::create([
            'category_id' => 2,
            'name' => ' php',
        ]);

        ### id = 5 ###  
        SubSection::create([
            'category_id' => 2,
            'name' => ' mysql',
        ]);

        ### id = 6 ###
        SubSection::create([
            'category_id' => 2,
            'name' => ' mongo',
        ]);

        // category_id: 3
        ### id = 7 ###
        SubSection::create([
            'category_id' => 3,
            'name' => ' java',
        ]);

        ### id = 8 ###
        SubSection::create([
            'category_id' => 3,
            'name' => ' c#',
        ]);

        ### id = 9 ###
        SubSection::create([
            'category_id' => 3,
            'name' => ' c++',
        ]);


    
    }
}
