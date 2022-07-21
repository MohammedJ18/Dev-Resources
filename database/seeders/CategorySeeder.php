<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

            for($i = 1 ; $i <= 12 ; $i++) {
                Category::create([
                    'name' => 'Category '.$i,
                    'image' => 'https://t3.ftcdn.net/jpg/03/59/09/04/360_F_359090423_7kA3WC9HnDEf1I9dx4ccGFhhO90vmzhk.jpg',
                ]);
            }

    }
}
