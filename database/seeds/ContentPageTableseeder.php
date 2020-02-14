<?php

use Illuminate\Database\Seeder;
use App\ContentPage;
use Illuminate\Support\Str;
class ContentPageTableseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $content = [
            [
               
                'title'           => Str::random(10),
                'excerpt'       => Str::random(10),
                
            ],
                        [
               
                'title'           => Str::random(10),
                'excerpt'       => Str::random(10),
                
            ],
                        [
               
                'title'           => Str::random(10),
                'excerpt'       => Str::random(10),
                
            ],
                        [
               
                'title'           => Str::random(10),
                'excerpt'       => Str::random(10),
                
            ],
                        [
               
                'title'           => Str::random(10),
                'excerpt'       => Str::random(10),
                
            ],
                        [
               
                'title'           => Str::random(10),
                'excerpt'       => Str::random(10),
                
            ],
                        [
               
                'title'           => Str::random(10),
                'excerpt'       => Str::random(10),
                
            ],
                        [
               
                'title'           => Str::random(10),
                'excerpt'       => Str::random(10),
                
            ],
                        [
               
                'title'           => Str::random(10),
                'excerpt'       => Str::random(10),
                
            ],
         
        ];

        ContentPage::insert($content);
    }
}
