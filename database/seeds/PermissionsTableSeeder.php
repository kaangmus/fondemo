<?php

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'title' => 'user_management_access',
            ],
            [
                'title' => 'permission_create',
            ],
            [
                'title' => 'permission_edit',
            ],
            [
                'title' => 'permission_show',
            ],
            [
                'title' => 'permission_delete',
            ],
            [
                'title' => 'permission_access',
            ],
            [
                'title' => 'role_create',
            ],
            [
                'title' => 'role_edit',
            ],
            [
                'title' => 'role_show',
            ],
            [
                'title' => 'role_delete',
            ],
            [
                'title' => 'role_access',
            ],
            [
                'title' => 'user_create',
            ],
            [
                'title' => 'user_edit',
            ],
            [
                'title' => 'user_show',
            ],
            [
                'title' => 'user_delete',
            ],
            [
                'title' => 'user_access',
            ],
            [
                'title' => 'content_management_access',
            ],
            [
                'title' => 'content_category_create',
            ],
            [
                'title' => 'content_category_edit',
            ],
            [
                'title' => 'content_category_show',
            ],
            [
                'title' => 'content_category_delete',
            ],
            [
                'title' => 'content_category_access',
            ],
            [
                'title' => 'content_tag_create',
            ],
            [
                'title' => 'content_tag_edit',
            ],
            [
                'title' => 'content_tag_show',
            ],
            [
                'title' => 'content_tag_delete',
            ],
            [
                'title' => 'content_tag_access',
            ],
            [
                'title' => 'content_page_create',
            ],
            [
                'title' => 'content_page_edit',
            ],
            [
                'title' => 'content_page_show',
            ],
            [
                'title' => 'content_page_delete',
            ],
            [
                'title' => 'content_page_access',
            ],
            [
                'title' => 'grand_access',
            ],
            [
                'title' => 'ngocompany_create',
            ],
            [
                'title' => 'ngocompany_edit',
            ],
            [
                'title' => 'ngocompany_show',
            ],
            [
                'title' => 'ngocompany_delete',
            ],
            [
                'title' => 'ngocompany_access',
            ],
            [
                'title' => 'animal_create',
            ],
            [
                'title' => 'animal_edit',
            ],
            [
                'title' => 'animal_show',
            ],
            [
                'title' => 'animal_delete',
            ],
            [
                'title' => 'animal_access',
            ],
             [
                'title' => 'exhibitation_access',
            ],
            [
                'title' => 'exhibation_category_create',
            ],
            [
                'title' => 'exhibation_category_edit',
            ],
            [
                'title' => 'exhibation_category_show',
            ],
            [
                'title' => 'exhibation_category_delete',
            ],
            [
                'title' => 'exhibation_category_access',
            ],
            [
                'title' => 'exhibition_post_create',
            ],
            [
                'title' => 'exhibition_post_edit',
            ],
            [
                'title' => 'exhibition_post_show',
            ],
            [
                'title' => 'exhibition_post_delete',
            ],
            [
                'title' => 'exhibition_post_access',
            ],
            [
                'title' => 'exhibition_gallery_create',
            ],
            [
                'title' => 'exhibition_gallery_edit',
            ],
            [
                'title' => 'exhibition_gallery_show',
            ],
            [
                'title' => 'exhibition_gallery_delete',
            ],
            [
                'title' => 'exhibition_gallery_access',
            ],
        ];

        Permission::insert($permissions);
    }
}
