<?php

namespace Database\Seeders;

use App\Models\Resource;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\SubSection;
use App\Models\Tag;

class ResourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $subsections =SubSection::get();
        foreach($subsections as $subsection) {
            for($i = 1 ; $i <= 2 ; $i++) {
                Resource::create([
                    'category_id' => $subsection->category_id,
                    'sub_section_id' => $subsection->id,
                    'name' => 'Resource '.$i,
                    'image' => 'https://cdn.dribbble.com/userupload/3148355/file/original-fcdbed01338262fd284b4a0699108432.png?compress=1&resize=1024x768',
                    'description' => 'This is a description of Resource '.$i,
                    'state' => true ,
                ]);
            }
        }

// category_id: 1 & sub_section_id: 1
        ### id = 1 ###
        // Resource::create([
        //     'category_id' => 1,
        //     'sub_section_id' => 1,
        //     'name' => ' html',
        //     'description' => 'html is a markup language for creating web pages and web applications.',
        //     'image' => 'https://cdn.dribbble.com/userupload/3148355/file/original-fcdbed01338262fd284b4a0699108432.png?compress=1&resize=1024x768',
        //     'state' => true,
        // ]);


        $resources = Resource::all();
        $tags = Tag::all();
        foreach ($resources as $resource) {
            $resource->tags()->attach($tags->random(rand(1, 2)));
        }

    }
}
