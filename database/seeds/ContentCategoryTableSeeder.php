<?php

use Illuminate\Database\Seeder;
use App\ContentCategory;
class contentCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ContentCategory = [

            [
                
                'name' => 'Focused Articles',
            ],
            [
                
                'name' => 'Emergency funds',
            ],

        ];

        ContentCategory::insert($ContentCategory);
    }
    
}
