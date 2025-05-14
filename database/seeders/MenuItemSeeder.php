<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $admin_menu_items = array(
            array(
                "id" => 1,
                "label" => "Home",
                "link" => "/",
                "parent_id" => 0,
                "sort" => 0,
                "class" => NULL,
                "menu_id" => 1,
                "depth" => 0,
                "created_at" => "2025-05-14 22:10:29",
                "updated_at" => "2025-05-14 22:10:49",
            ),
            array(
                "id" => 2,
                "label" => "Companies",
                "link" => "/companies",
                "parent_id" => 0,
                "sort" => 1,
                "class" => NULL,
                "menu_id" => 1,
                "depth" => 0,
                "created_at" => "2025-05-14 22:10:49",
                "updated_at" => "2025-05-14 22:10:57",
            ),
            array(
                "id" => 3,
                "label" => "Candidates",
                "link" => "/candidates",
                "parent_id" => 0,
                "sort" => 2,
                "class" => NULL,
                "menu_id" => 1,
                "depth" => 0,
                "created_at" => "2025-05-14 22:10:57",
                "updated_at" => "2025-05-14 22:11:09",
            ),
            array(
                "id" => 4,
                "label" => "Pricing",
                "link" => "/pricing",
                "parent_id" => 0,
                "sort" => 3,
                "class" => NULL,
                "menu_id" => 1,
                "depth" => 0,
                "created_at" => "2025-05-14 22:11:09",
                "updated_at" => "2025-05-14 22:11:20",
            ),
            array(
                "id" => 5,
                "label" => "Find a Job",
                "link" => "/jobs",
                "parent_id" => 0,
                "sort" => 4,
                "class" => NULL,
                "menu_id" => 1,
                "depth" => 0,
                "created_at" => "2025-05-14 22:11:20",
                "updated_at" => "2025-05-14 22:11:31",
            ),
            array(
                "id" => 6,
                "label" => "Blogs",
                "link" => "/blogs",
                "parent_id" => 0,
                "sort" => 5,
                "class" => NULL,
                "menu_id" => 1,
                "depth" => 0,
                "created_at" => "2025-05-14 22:11:30",
                "updated_at" => "2025-05-14 22:11:38",
            ),
            array(
                "id" => 7,
                "label" => "About Us",
                "link" => "/about-us",
                "parent_id" => 9,
                "sort" => 7,
                "class" => NULL,
                "menu_id" => 1,
                "depth" => 1,
                "created_at" => "2025-05-14 22:11:38",
                "updated_at" => "2025-05-14 22:12:20",
            ),
            array(
                "id" => 8,
                "label" => "Contact Us",
                "link" => "/contact-us",
                "parent_id" => 9,
                "sort" => 8,
                "class" => NULL,
                "menu_id" => 1,
                "depth" => 1,
                "created_at" => "2025-05-14 22:11:52",
                "updated_at" => "2025-05-14 22:12:27",
            ),
            array(
                "id" => 9,
                "label" => "More",
                "link" => "#",
                "parent_id" => 0,
                "sort" => 6,
                "class" => NULL,
                "menu_id" => 1,
                "depth" => 0,
                "created_at" => "2025-05-14 22:12:08",
                "updated_at" => "2025-05-14 22:12:15",
            ),
        );
        \DB::table('admin_menu_items')->insert($admin_menu_items);
    }
}
