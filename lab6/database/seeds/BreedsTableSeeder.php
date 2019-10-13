<?php

use Illuminate\Database\Seeder;

class BreedsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('breeds')->insert([
            ['name'=>'Labrador Retriever'],
            ['name'=>'German Shepard'],
            ['name'=>'Golden Retriever'],
            ['name'=>'French Bulldog'],
            ['name'=>'Beagle'],
            ['name'=>'Poodle'],
            ['name'=>'Rottweiler'],
            ['name'=>'Yorkshire Terrier']
        ]);
    }
}
