<?php

namespace Database\Seeders\Core;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $permissions = [
            'register intership',
            'register company',
            'register student',
            'create postulation',
            'verify postulation',
            'accept postulation',
            'register reports',
            'edit profile',
            'publish intership',
            'show stadistics',
            'register agreements company',
            'register career',
            'register members career',
            'register members agreement',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Crear roles
        $student = Role::create(['name' => 'student']);
        $student->givePermissionTo(['create postulation', 'edit profile']);

        $careerDept = Role::create(['name' => 'careerDepartment']);
        $careerDept->givePermissionTo([
            'register student',
            'publish intership',
            'verify postulation',
            'accept postulation',
            'register reports',
            'show stadistics'
        ]);

        $agreementsDept = Role::create(['name' => 'agreementsDeparment']);
        $agreementsDept->givePermissionTo([
            'register company',
            'register agreements company',
            'register intership',
            'show stadistics'
        ]);

        $admin = Role::create(['name' => 'admin']);
        $admin->givePermissionTo([
            'register career',
            'register members career',
            'register members agreement'
        ]);

        $superAdmin = Role::create(['name' => 'Super-Admin']);
        $superAdmin->givePermissionTo(Permission::all());

    }
}
