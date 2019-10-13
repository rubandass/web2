<?php

use Illuminate\Database\Seeder;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('courses')->insert([
            ['code' => 'IN501' , 'name' => 'Professional Practice'],
            ['code' => 'IN610' , 'name' => 'Java'],
            ['code' => 'IN612' , 'name' => 'Web2'],
            ['code' => 'IN614' , 'name' => 'Multi-Media']
        ]);
    }
}
