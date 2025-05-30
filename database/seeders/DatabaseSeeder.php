<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            // AdminSeeder::class,
            CountrySeeder::class,
            StateSeeder::class,
            CitySeeder::class,
            ExperienceSeeder::class,
            IndustryTypeSeeder::class,
            JobCategorySeeder::class,
            JobEducationSeeder::class,
            JobExperienceSeeder::class,
            JobRoleSeeder::class,
            JobSalaryTypeSeeder::class,
            JobTagSeeder::class,
            JobTypeSeeder::class,
            LanguageSeeder::class,
            OrganizationTypeSeeder::class,
            ProfessionSeeder::class,
            SkillSeeder::class,
            SocialPlatformsSeeder::class,
            TeamSizeSeeder::class,
        ]);

    }
}
