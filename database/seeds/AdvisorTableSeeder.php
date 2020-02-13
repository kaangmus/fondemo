<?php
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use App\Advisor;
class AdvisorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $advisor=[
            [
                'name'=>Str::random(10),
                'level'=>Str::random(20),
                'description'=>Str::random(50),
                'status'=>'advisor',

            ],
                        [
                'name'=>Str::random(10),
                'level'=>Str::random(20),
                'description'=>Str::random(50),
                'status'=>'advisor',

            ],
                        [
                'name'=>Str::random(10),
                'level'=>Str::random(20),
                'description'=>Str::random(50),
                'status'=>'advisor',

            ],
                        [
                'name'=>Str::random(10),
                'level'=>Str::random(20),
                'description'=>Str::random(50),
                'status'=>'advisor',

            ],
                        [
                'name'=>Str::random(10),
                'level'=>Str::random(20),
                'description'=>Str::random(50),
                'status'=>'advisor',

            ],
                        [
                'name'=>Str::random(10),
                'level'=>Str::random(20),
                'description'=>Str::random(50),
                'status'=>'advisor',

            ],
                        [
                'name'=>Str::random(10),
                'level'=>Str::random(20),
                'description'=>Str::random(50),
                'status'=>'advisor',

            ],
            [
                'name'=>Str::random(10),
                'level'=>Str::random(20),
                'description'=>Str::random(50),
                'status'=>'whoweare',

            ],
            [
                'name'=>Str::random(10),
                'level'=>Str::random(20),
                'description'=>Str::random(50),
                'status'=>'whoweare',

            ],
            [
                'name'=>Str::random(10),
                'level'=>Str::random(20),
                'description'=>Str::random(50),
                'status'=>'whoweare',

            ],
            [
                'name'=>Str::random(10),
                'level'=>Str::random(20),
                'description'=>Str::random(50),
                'status'=>'whoweare',

            ],
            [
                'name'=>Str::random(10),
                'level'=>Str::random(20),
                'description'=>Str::random(50),
                'status'=>'whoweare',

            ],
            [
                'name'=>Str::random(10),
                'level'=>Str::random(20),
                'description'=>Str::random(50),
                'status'=>'whoweare',

            ],
            [
                'name'=>Str::random(10),
                'level'=>Str::random(20),
                'description'=>Str::random(50),
                'status'=>'whoweare',

            ],
        ];
    Advisor::insert($advisor);
    }
}
