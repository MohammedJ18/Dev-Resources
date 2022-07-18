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

        for  ($i = 1; $i <= 13; $i++) {
            $tag = Tag::create([
                'name' => 'Tag ' . $i,
            ]);
        }
    }
}

