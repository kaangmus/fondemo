<?php

use Illuminate\Database\Seeder;
use App\Slider;
class SliderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'title'    => 'What is Lorem Ipsum?',
                'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has ',
            ],
            [
               'title'    => 'Why do we use it?',
                'description' => 'It is a long established fact that a reader will be distracted by the readable',
            ],
            [
                'title'    => 'Where does it come from?',
                'description' => 'It is a long established fact that a reader will be distracted by the readable content',
            ]
            
        ];

        Slider::insert($data);
    }
}
