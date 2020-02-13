<?php

use Illuminate\Database\Seeder;
use App\ProductTag;
class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tag = [
            [
                'id'             => 1,
                'name'           => 'size 1500*700',
                
              
            ],
            [
                'id'             => 2,
                'name'           => 'size 900*500',
                
              
            ],
            [
                'id'             => 3,
                'name'           => 'size 400*300',
            ],
            [
                'id'             => 4,
                'name'           => 'size 5000*4000',
            ],
        ];

        ProductTag::insert($tag);
    }
}
