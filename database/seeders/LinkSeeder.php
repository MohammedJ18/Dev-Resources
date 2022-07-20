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
        $resources = Resource::get();
            $url = [
                'https://www.youtube.com/',
                'https://www.google.com/',
            ];

            foreach($resources as $resource) {
                for($i = 1 ; $i <= 2 ; $i++) {
                    Link::create([
                        'resource_id' => $resource->id,
                        'url' =>  $url[array_rand($url)],
                    ]);
            }
        }

        }}
