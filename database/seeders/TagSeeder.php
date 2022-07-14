<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // resource_id: 1
        ### id = 1 ###
        Tag::create([
            'resource_id' => 1,
            'name' => ' html',
        ]);

        ### id = 2 ###
        Tag::create([
            'resource_id' => 1,
            'name' => ' css',
        ]);

        // resource_id: 2
        ### id = 3 ###
        Tag::create([
            'resource_id' => 2,
            'name' => ' javascript',
        ]);

        // resource_id: 3
        ### id = 4 ###
        Tag::create([
            'resource_id' => 3,
            'name' => ' php',
        ]);

        // resource_id: 4
        ### id = 5 ###
        Tag::create([
            'resource_id' => 4,
            'name' => ' mysql',
        ]);

        // resource_id: 5

        ### id = 6 ###  
        Tag::create([
            'resource_id' => 5,
            'name' => ' mongo',
        ]);

        // resource_id: 6
        ### id = 7 ###
        Tag::create([
            'resource_id' => 6,
            'name' => ' html',
        ]);

        // resource_id: 7
        ### id = 8 ###
        Tag::create([
            'resource_id' => 7,
            'name' => ' css',
        ]);
    }
}
