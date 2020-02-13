<?php

use Illuminate\Database\Seeder;
use App\Species;
class SpeciesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
                $species = [
            [
               'id'=>1,
               'name'           => 'WHALES AND DOLPHINS',
               'type'          => 'MARINE',

            ],
            [
               'id'=>2,
               'name'           => 'OCEANS',
               'type'          => 'MARINE',

            ],
             [
               'id'=>3,
               'name'           => 'MANTA RAYS',
               'type'          => 'MARINE',

            ],
             [
               'id'=>4,
               'name'           => 'SHARKS',
               'type'          => 'MARINE',

            ],
             [
               'id'=>5,
               'name'           => 'TURTLES',
               'type'          => 'MARINE',

            ],
             [
               'id'=>6,
               'name'           => 'RAINFORESTS',
               'type'          => 'TERRESTRIAL',

            ],
              [
               'id'=>7,
               'name'           => 'GREAT APES',
               'type'          => 'TERRESTRIAL',

            ],
              [
               'id'=>8,
               'name'           => 'ELEPHANTS',
               'type'          => 'TERRESTRIAL',

            ],
              [
               'id'=>9,
               'name'           => 'RHINOCEROS',
               'type'          => 'TERRESTRIAL',

            ],
              [
               'id'=>10,
               'name'           => 'LEOPARDS',
               'type'          => 'TERRESTRIAL',

            ],
              [
               'id'=>11,
               'name'           => 'WOLVES',
               'type'          => 'TERRESTRIAL',

            ],
              [
               'id'=>12,
               'name'           => 'TORTOISES',
               'type'          => 'TERRESTRIAL',

            ],
              [
               'id'=>13,
               'name'           => 'HABITAT & BIODIVERSITY',
               'type'          => 'TERRESTRIAL',

            ],
              [
               'id'=>14,
               'name'           => 'ANIMAL CARE & CRUELTY',
               'type'          => 'TERRESTRIAL',

            ],
        ];

        Species::insert($species);
    }
}
