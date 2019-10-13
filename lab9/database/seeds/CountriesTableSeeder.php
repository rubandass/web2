<?php

use App\Http\Controllers\PageController;
use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    /*public function run()
    {
        DB::table('countries')->insert([
            ['id'=>'1','name'=>'New Zealand', 'flag'=>'NewZealandFlag']
        ]);
    }*/

    public function run()
    {
        $pageController = new PageController();
        //decoding json
        $countries = json_decode(($pageController->fileReadCSV('public/flags.csv')),true);

        //looping the countries and get values 
        foreach ($countries as $country) {
            DB::table('countries')->insert([
                [
                    'name' => $country['name'], 
                    'flag' => $country['flag']
                ]
            ]);
        }
    }
}
