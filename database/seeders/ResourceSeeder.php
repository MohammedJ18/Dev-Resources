<?php

namespace Database\Seeders;

use App\Models\Resource;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ResourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ### id = 1 ###
        Resource::create([
            'user_id' => 1,
            'category_id' => 1,
            'name' => ' html',
            'description'=>'html resource',
            'icon' => "html ",
            'screenShot' => "html ",
            'state' => true,

        ]);
    }
}
