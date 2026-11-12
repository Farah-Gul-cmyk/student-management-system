<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            ['role' => 'employee', 'permission' => 'view_students'],
            ['role' => 'employee', 'permission' => 'create_student'],
            ['role' => 'employee', 'permission' => 'edit_student'],
            ['role' => 'employee', 'permission' => 'delete_student'],
        ];

        foreach ($permissions as $p) {
            Permission::firstOrCreate($p);
        }
    }
}