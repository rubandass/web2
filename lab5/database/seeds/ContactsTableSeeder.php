<?php

use Illuminate\Database\Seeder;

class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contacts')->insert([
            ['firstName' => 'Harry' , 'lastName'=> 'Potter' , 'phone'=>'021 678 111'],
            ['firstName' => 'Ron' , 'lastName'=> 'Weasley' , 'phone'=>'021 678 222'],
            ['firstName' => 'Albus' , 'lastName'=> 'Dumledore' , 'phone'=>'021 678 333'],
            ['firstName' => 'Ruban' , 'lastName'=> 'Dass' , 'phone'=>'021 456 852'],
            ['firstName' => 'Sharmila' , 'lastName'=> 'Savarimuthu' , 'phone'=>'021 256 583'],
            ['firstName' => 'robin' , 'lastName'=> 'Richard' , 'phone'=>'021 678 458']
        ]);
    }
}
