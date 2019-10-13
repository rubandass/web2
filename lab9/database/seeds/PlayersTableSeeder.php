<?php

use App\Http\Controllers\PageController;
use Illuminate\Database\Seeder;

class PlayersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pageController = new PageController();
        //decoding json
        $players = json_decode(($pageController->fileReadCSV('public/cricket.csv')),true);

        //looping the players and get values 
        foreach ($players as $player) {
            DB::table('players')->insert([
                [
                    'name' => $player['name'], 
                    'age' => $player['age'], 
                    'role' => $player['role'], 
                    'batting' => $player['batting'], 
                    'bowling' => $player['bowling'],
                    'image' => $player['image'],
                    'odiRuns' => $player['odiRuns'], 
                    'country_id' => $player['country_id']
                ]
            ]);
        }
    }
}
