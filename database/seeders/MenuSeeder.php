<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $admin_menus = array(
            array(
                "id" => 1,
                "name" => "Navigation Menu",
                "created_at" => NULL,
                "updated_at" => NULL,
            ),
            array(
                "id" => 2,
                "name" => "Footer Menu One",
                "created_at" => "2025-05-08 12:31:09",
                "updated_at" => "2025-05-08 12:31:09",
            ),
        );

        \DB::table('admin_menus')->insert($admin_menus);
    }
}
