<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            PermissionsTableSeeder::class,
            RolesTableSeeder::class,
            PermissionRoleTableSeeder::class,
            UsersTableSeeder::class,
            RoleUserTableSeeder::class,
            ContentPageTableseeder::Class,
            contentCategoryTableSeeder::class,
            SliderTableSeeder::class,
            PageCategoryTableseeder::class,
            MediaTableSeeder::class,

            SpeciesTableSeeder::class,
            YearTableSeeder::class,

            
            TagTableSeeder::class,
            AdvisorTableSeeder::class,
            EspecesTableSeeder::class,
            PlacesTableSeeder::class,

        ]);
    }
}
