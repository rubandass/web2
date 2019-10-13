<?php

use Illuminate\Database\Seeder;

class DogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dogs')->insert([
            ['name'=>'Jasper' , 'date_of_birth'=>'2010-01-20', 'breed_id'=> 1],
            ['name'=>'Wag' , 'date_of_birth'=>'1980-01-20', 'breed_id'=> 7],
            ['name'=>'Winston' , 'date_of_birth'=>'2007-01-22', 'breed_id'=> 6],
            ['name'=>'Teddy' , 'date_of_birth'=>'2018-01-22', 'breed_id'=> 8],
            ['name'=>'Scout' , 'date_of_birth'=>'2017-01-20', 'breed_id'=> 3],
            ['name'=>'Sophie' , 'date_of_birth'=>'2005-07-13', 'breed_id'=> 5],
            ['name'=>'Honey' , 'date_of_birth'=>'2009-01-02', 'breed_id'=> 1],
            ['name'=>'Boris' , 'date_of_birth'=>'2005-08-02', 'breed_id'=> 2],
            ['name'=>'Cooper' , 'date_of_birth'=>'2015-07-23', 'breed_id'=> 4],
            ['name'=>'Danny' , 'date_of_birth'=>'1986-10-03', 'breed_id'=> 6],
            ['name'=>'Missy' , 'date_of_birth'=>'2006-02-12', 'breed_id'=> 2],
            ['name'=>'Lucy' , 'date_of_birth'=>'2019-02-12', 'breed_id'=> 5],
            ['name'=>'Gizmo' , 'date_of_birth'=>'2016-05-04', 'breed_id'=> 4],
            ['name'=>'Dixie' , 'date_of_birth'=>'2006-02-08', 'breed_id'=> 2]
        ]);
    }
    
}
