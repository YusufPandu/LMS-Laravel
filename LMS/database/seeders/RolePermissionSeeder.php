<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Role::where('name', 'admin')->first();
        $admin->permissions()->sync(Permission::all());

        $instructor = Role::where('name', 'instructor')->first();
        $instructor->permissions()->sync(Permission::whereIn('name', [
            'create_course',
            'view_course',
            'manage_modules',
            'create_assignment',
            'grade_assignment',
        ])->get());


        $student = Role::where('name', 'student')->first();
        $student->permissions()->sync(Permission::whereIn('name', [
            'view_course',
            'submit_assignment',
        ])->get());
    }
}
