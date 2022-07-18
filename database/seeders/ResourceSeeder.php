<?php

namespace Database\Seeders;

use App\Models\Resource;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
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
        // category_id: 1 & subsection_id: 1
        ### id = 1 ###
        Resource::create([
            'category_id' => 1,
            'subsection_id' => 1,
            'name' => ' html',
            'description' => 'html is a markup language for creating web pages and web applications.',
            'screenShot' => 'resources/image/tUfE0yztR6.jpg',
            'state' => true,
        ]);

        ### id = 2 ###
        Resource::create([
            'category_id' => 1,
            'subsection_id' => 1,
            'name' => ' css',
            'description' => 'css is a style sheet language used for describing the presentation of a document written in a markup language.',
            'screenShot' => 'images\img\1.jpg',
            'state' => true,
        ]);

        // category_id: 1 & subsection_id: 2
        ### id = 3 ###
        Resource::create([
            'category_id' => 1,
            'subsection_id' => 2,
            'name' => ' javascript',
            'description' => 'javascript is a high-level, dynamic, untyped, and interpreted programming language.',
            'screenShot' => 'images\img\1.jpg',
            'state' => true,
        ]);

        // category_id: 2 & subsection_id: 1
        ### id = 4 ###
        Resource::create([
            'category_id' => 2,
            'subsection_id' => 1,
            'name' => ' php',
            'description' => 'php is a server-side scripting language designed for web development.',
            'screenShot' => 'images\img\1.jpg',
            'state' => true,
        ]);

        ### id = 5 ###
        Resource::create([
            'category_id' => 2,
            'subsection_id' => 1,
            'name' => ' mysql',
            'description' => 'mysql is a relational database management system (RDBMS).',
            'screenShot' => 'mysql.png',
            'state' => true,
        ]);

        //category_id: 2 & subsection_id: 2
        ### id = 6 ###
        Resource::create([
            'category_id' => 2,
            'subsection_id' => 2,
            'name' => ' mongo',
            'description' => 'mongo is a document-oriented database.',
            'screenShot' => 'mongo.png',
            'state' => true,
        ]);

        // category_id: 2 & subsection_id: 3
        ### id = 7 ###
        Resource::create([
            'category_id' => 2,
            'subsection_id' => 3,
            'name' => ' java',
            'description' => 'java is a general-purpose computer programming language that is concurrent, class-based, object-oriented, and specifically designed to have as few implementation dependencies as possible.',
            'screenShot' => 'java.png',
            'state' => true,
        ]);

        // category_id: 3 & subsection_id: 1
        ### id = 8 ###
        Resource::create([
            'category_id' => 3,
            'subsection_id' => 1,
            'name' => ' c#',
            'description' => 'c# is a multi-paradigm programming language encompassing strong typing, imperative, declarative, functional, generic, object-oriented, and component-oriented programming disciplines.',
            'screenShot' => 'c#.png',
            'state' => true,
        ]);

        ### id = 9 ###
        Resource::create([
            'category_id' => 3,
            'subsection_id' => 1,
            'name' => ' c++',
            'description' => 'c++ is a general-purpose programming language. It has imperative, object-oriented and generic programming features, while also providing many software engineering features.',
            'screenShot' => 'c++.png',
            'state' => true,
        ]);

        // category_id: 3 & subsection_id: 2
        ### id = 10 ###
        Resource::create([
            'category_id' => 3,
            'subsection_id' => 2,
            'name' => ' javaScript',
            'description' => 'javaScript is a high-level, dynamic, untyped, and interpreted programming language.',
            'screenShot' => 'javaScript.png',
            'state' => true,
        ]);

        // category_id: 3 & subsection_id: 3
        ### id = 11 ###
        Resource::create([
            'category_id' => 3,
            'subsection_id' => 3,
            'name' => ' python',
            'description' => 'python is an interpreted, object-oriented, high-level programming language with dynamic semantics.',
            'screenShot' => 'python.png',
            'state' => true,
        ]);

        ### id = 12 ###
        Resource::create([
            'category_id' => 3,
            'subsection_id' => 3,
            'name' => ' ruby',
            'description' => 'ruby is a dynamic, object-oriented, high-level programming language with a syntax reminiscent of Perl.',
            'screenShot' => 'ruby.png',
            'state' => true,
        ]);


        // attach tags to resources
        $resources = Resource::all();
        $tags = Tag::all();
        foreach ($resources as $resource) {
            $resource->tags()->attach($tags->random(rand(1, 2)));
        }

    }
}
