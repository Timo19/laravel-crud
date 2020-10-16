<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Player;
use Faker;

class PlayerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('players')->truncate();

        $sports = ['Tennis', 'Korfbal', 'Voetbal', 'Hockey', 'Wielrennen', 'Tafeltennis', 'Schaatsen'];

        foreach (range(1, 500) as $r) {

            // Use this to randomly generate male or female player names.
            $name = rand(1, 2);

            Player::create([
                'name' => ($name == 1 ? Faker\Provider\nl_NL\Person::firstNameMale() : Faker\Provider\nl_NL\Person::firstNameFemale()),
                'age' => rand(18, 65),
                'country' => 'Nederland',
                'sports' => $sports[array_rand($sports)],
            ]);
        }
    }
}
