<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'Admin',
                'email'          => 'admin@admin.com',
                'password'       => '$2y$10$YUmfCns4rLiiqFDKW7bFD.gKqHYQ1s0/VIzyg8lKhJAGZr80Xvkvi',
                'remember_token' => null,
                'first_nmae'     => 'gggg',
                'telephone'      => '023423',
                'fax'            => 'sdfasdas',
                'company'        => 'sdfasdf',
                'companyid'      => '234234',
                
                'address_1'      => '34234234',
                'city'           => 'sdsad',
                'post_code'      => '23423',
                'country'        => 'sdfas',
                'region_state'   => 'sdasdf',
            ],
             [
                'id'             => 2,
                'name'           => 'nico',
                'email'          => 'anton@udistance.com ',
                'password'       => '$2y$10$TQuXlDeiTAQYfn6Z20dKMOpomR8FpUACaZ.9WwRL00VOe3fEXixeq ',
                'remember_token' => null,
                'first_nmae'     => 'gggg',
                'telephone'      => '023423',
                'fax'            => 'sdfasdas',
                'company'        => 'sdfasdf',
                'companyid'      => '234234',
                
                'address_1'      => '34234234',
                'city'           => 'sdsad',
                'post_code'      => '23423',
                'country'        => 'sdfas',
                'region_state'   => 'sdasdf',
            ],
        ];

        User::insert($users);
    }
}
