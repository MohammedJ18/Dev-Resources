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
        $subsection1 = 'HTML Resources';
        $subsection2 = 'CSS Resources';
        $subsection3 = 'JavaScript Resources';
        $subsection4 = 'PHP Resources';
        $subsection5 = 'MySQL Resources';
        $subsection6 = 'SQL Resources';
        $subsection7 = 'DART Resources';
        $subsection8 = 'Flutter Resources';
        $subsection9 = 'React Resources';
        
        //HTML
        for($i = 1 ; $i <= 3 ; $i++) {
            Resource::create([
                'category_id' => 1,
                'sub_section_id' => 1,
                'name' =>  $subsection1 . ' ' . $i,
                'description' => 'HTML is the standard markup language for documents designed to be displayed in a web browser.' ,
                'image' => 'https://play-lh.googleusercontent.com/85WnuKkqDY4gf6tndeL4_Ng5vgRk7PTfmpI4vHMIosyq6XQ7ZGDXNtYG2s0b09kJMw',
                'state' => true ,
            ]);
        }
        //css
        for($i = 1 ; $i <= 3 ; $i++) {
            Resource::create([
                'category_id' => 1,
                'sub_section_id' => 2,
                'name' =>  $subsection2 . ' ' . $i,
                'description' => '(CSS) is a style sheet language used for describing the presentation of a document written in a markup language such as HTML or XML (including XML dialects such as SVG, MathML or XHTML)' ,
                'image' => 'https://play-lh.googleusercontent.com/RTAZb9E639F4JBcuBRTPEk9_92I-kaKgBMw4LFxTGhdCQeqWukXh74rTngbQpBVGxqo',
                'state' => true ,
            ]);
        }
        //javascript
        for($i = 1 ; $i <= 3 ; $i++) {
            Resource::create([
                'category_id' => 1,
                'sub_section_id' => 3,
                'name' =>  $subsection3 . ' ' . $i,
                'description' => ' JS, is a programming language that is one of the core technologies of the World Wide Web, alongside HTML and CSS' ,
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/99/Unofficial_JavaScript_logo_2.svg/1200px-Unofficial_JavaScript_logo_2.svg.png',
                'state' => true ,
            ]);
        }
        //php
        for($i = 1 ; $i <= 3 ; $i++) {
            Resource::create([
                'category_id' => 2,
                'sub_section_id' => 1,
                'name' =>  $subsection4 . ' ' . $i,
                'description' => 'PHP is a general-purpose scripting language geared toward web development.[7] It was originally created by Danish-Canadian programmer Rasmus Lerdorf in 1994.' ,
                'image' => 'https://www.php.net/images/meta-image.png',
                'state' => true ,
            ]);
        }
        //mysql
        for($i = 1 ; $i <= 3 ; $i++) {
            Resource::create([
                'category_id' => 2,
                'sub_section_id' => 2,
                'name' =>  $subsection5 . ' ' . $i,
                'description' => 'is an open-source relational database management system (RDBMS).[5][6] Its name is a combination of "My", the name of co-founder Michael Wideniuss daughter,[7] and "SQL", the abbreviation for Structured Query Language.' ,
                'image' => 'https://pbs.twimg.com/profile_images/1255113654049128448/J5Yt92WW_400x400.png',
                'state' => true ,
            ]);
        }
        //sql
        for($i = 1 ; $i <= 3 ; $i++) {
            Resource::create([
                'category_id' => 2,
                'sub_section_id' => 3,
                'name' =>  $subsection6 . ' ' . $i,
                'description' => 'sequel"; Structured Query Language)[5] is a domain-specific language used in programming and designed for managing data held in a relational database management system (RDBMS), or for stream processing in a relational data stream management system (RDSMS).' ,
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQc26BF2WGCkYzUYRZ3DKvRlq2Rpob-nxe9ng&usqp=CAU',
                'state' => true ,
            ]);
        }
        //dart
        for($i = 1 ; $i <= 3 ; $i++) {
            Resource::create([
                'category_id' => 3,
                'sub_section_id' => 1,
                'name' =>  $subsection7 . ' ' . $i,
                'description' => 'Dart is a programming language designed for client development,[8][9] such as for the web and mobile apps. It is developed by Google and can also be used to build server and desktop applications.' ,
                'image' => 'https://www.kindpng.com/picc/m/176-1766554_dart-programming-language-logo-hd-png-download.png',
                'state' => true ,
            ]);
        }
        //flutter
        for($i = 1 ; $i <= 3 ; $i++) {
            Resource::create([
                'category_id' => 3,
                'sub_section_id' => 2,
                'name' =>  $subsection8 . ' ' . $i,
                'description' => 'Flutter is an open-source UI software development kit created by Google. It is used to develop cross platform applications for Android, iOS, Linux, macOS, Windows, Google Fuchsia,[3] and the web from a single codebase.' ,
                'image' => 'https://play-lh.googleusercontent.com/5e7z5YCt7fplN4qndpYzpJjYmuzM2WSrfs35KxnEw-Ku1sClHRWHoIDSw3a3YS5WpGcI',
                'state' => true ,
            ]);
        }
        //react
        for($i = 1 ; $i <= 3 ; $i++) {
            Resource::create([
                'category_id' => 3,
                'sub_section_id' => 3,
                'name' =>  $subsection9 . ' ' . $i,
                'description' => 'React (also known as React.js or ReactJS) is a free and open-source front-end JavaScript library[3] for building user interfaces based on UI components.' ,
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/a7/React-icon.svg/640px-React-icon.svg.png',
                'state' => true ,
            ]);
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
