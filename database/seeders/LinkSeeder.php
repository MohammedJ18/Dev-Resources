<?php

namespace Database\Seeders;

use App\Models\Link;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ### id = 1 ###
        Link::create([
            'resource_id' => 1,
            'url' => 'https://laravel.com/docs/7.x',
        ]);
    }
}
