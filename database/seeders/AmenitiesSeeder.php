<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class AmenitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('amenities')->insert([
            [
                'name' => 'attic'
            ],
            [
                'name' => 'gas heat',
            ],
            [
                'name' => 'ocean view',
            ],
            [
                'name' => 'wine cellar',
            ],
            [
                'name' => 'basketball court',
            ],
            [
                'name' => 'pound',
            ],
            [
                'name' => 'fireplace',
            ],
            [
                'name' => 'gym',
            ],
            [
                'name' => 'lake view',
            ],
            [
                'name' => 'pool',
            ],
            [
                'name' => 'back yard',
            ],
            [
                'name' => 'frontend yard',
            ],
            [
                'name' => 'fenced yard',
            ],
            [
                'name' => 'sprinklers',
            ],
            [
                'name' => 'washer and dryer',
            ],
            [
                'name' => 'deck',
            ],
            [
                'name' => 'balcony',
            ],
            [
                'name' => 'laundry',
            ],
            [
                'name' => 'concierge',
            ],
            [
                'name' => 'doorman',
            ],
            [
                'name' => 'private space',
            ],
            [
                'name' => 'storage',
            ],
            [
                'name' => 'recreation',
            ],
            [
                'name' => 'Roof Deck',
            ]
        ]);
    }
}
