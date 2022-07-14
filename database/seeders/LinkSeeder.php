<?php

namespace Database\Seeders;

use App\Models\Link;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Resource;


class LinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //resource_id: 1
        ### id = 1 ###
        Link::create([
            'resource_id' => 1,
            'url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
        ]);
        ### id = 2 ###
        Link::create([
            'resource_id' => 1,
            'url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
        ]);

        //resource_id: 2
        ### id = 3 ###
        Link::create([
            'resource_id' => 2,
            'url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
        ]);
        ### id = 4 ###
        Link::create([
            'resource_id' => 2,
            'url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
        ]);

        //resource_id: 3
        ### id = 5 ###
        Link::create([
            'resource_id' => 3,
            'url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
        ]);
        ### id = 6 ###
        Link::create([
            'resource_id' => 3,
            'url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
        ]);

        //resource_id: 4
        ### id = 7 ###
        Link::create([
            'resource_id' => 4,
            'url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
        ]);

        //resource_id: 5
        ### id = 8 ###
        Link::create([
            'resource_id' => 5,
            'url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
        ]);

        //resource_id: 6
        ### id = 9 ###
        Link::create([
            'resource_id' => 6,
            'url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
        ]);
        ### id = 10 ###
        Link::create([
            'resource_id' => 6,
            'url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
        ]);
        
        //resource_id: 7
        ### id = 11 ###
        Link::create([
            'resource_id' => 7,
            'url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
        ]);


    }
}
