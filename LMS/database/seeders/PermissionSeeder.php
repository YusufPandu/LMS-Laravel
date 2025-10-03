<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \App\Models\Permission::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        $permissions = [
            // Course management
            ['name' => 'create_course', 'display_name' => 'Create Course', 'group' => 'course'],
            ['name' => 'view_course', 'display_name' => 'View Course', 'group' => 'course'],
            ['name' => 'manage_modules', 'display_name' => 'Manage Modules', 'group' => 'course'],

            // Assignment
            ['name' => 'create_assignment', 'display_name' => 'Create Assignment', 'group' => 'assignment'],
            ['name' => 'grade_assignment', 'display_name' => 'Grade Assignment', 'group' => 'assignment'],
            ['name' => 'submit_assignment', 'display_name' => 'Submit Assignment', 'group' => 'assignment'],

            // User & Admin
            ['name' => 'manage_users', 'display_name' => 'Manage Users', 'group' => 'user'],
            ['name' => 'view_reports', 'display_name' => 'View Reports', 'group' => 'report'],
        ];
        foreach ($permissions as $permission) {
            Permission::create($permission);
        }
    }
}
