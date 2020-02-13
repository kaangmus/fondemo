<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Year;
class YearTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $year = [
          
            [
                
                'year'           => '2009',
              
            ],
            [
                
                'year'           => '2010',
              
            ],
            [
                
                'year'           => '2011',
              
            ],
              [
                
                'year'           => '2012',
              
            ],
              [
                
                'year'           => '2013',
              
            ],
              [
                
                'year'           => '2014',
              
            ],
              [
                
                'year'           => '2015',
              
            ],
              [
                
                'year'           => '2016',
              
            ],
              [
                
                'year'           => '2017',
              
            ],
              [
                
                'year'           => '2018',
              
            ],
              [
                
                'year'           => '2019',
              
            ],
        ];

        Year::insert($year);
    }
        
    
}
