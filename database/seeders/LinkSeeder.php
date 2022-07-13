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
        $resource = Resource::get();

        foreach($resource as $resource) {
            for($i = 1 ; $i <= 3 ; $i++) {
                Link::create([
                    'url' => 'https://www.google.com/search?q=',
                    'resource_id' => $resource->id,
                ]);
            }
        }
    }
}
