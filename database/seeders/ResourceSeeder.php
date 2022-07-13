<?php

namespace Database\Seeders;

use App\Models\Resource;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class ResourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cate = Category::get();
        foreach ($cate as $item ) {
            for($i = 1 ; $i <= 2 ; $i++)
                Resource::create([
                    'name' => 'Resource '.$i,
                    'description' => 'Description '.$i,
                    'icon' => 'Icon '.$i,
                    'screenShot' => 'ScreenShot '.$i,
                    'category_id' => $item->id,
                ]);
        }
    }
}
