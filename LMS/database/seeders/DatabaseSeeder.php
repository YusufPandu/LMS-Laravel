<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            CourseSeeder::class,
            ModuleSeeder::class,
            AssignmentSeeder::class,
            SubmissionSeeder::class,
            ProgressSeeder::class,
            DiscussionSeeder::class,
            CertificateSeeder::class,
        ]);

    }
}
