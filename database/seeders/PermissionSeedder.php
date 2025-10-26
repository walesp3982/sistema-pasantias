<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionSeedder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        app()[PermissionRegistrar::class]->forgetCachedPermission();

        Permission::create(['name' => 'register intership']);
        Permission::create(['name' => 'register company']);
        Permission::create(['name' => 'register student']);
        Permission::create(['name' => 'register intership']);
        Permission::create(['name' => 'submit postulation']);
        Permission::create(['name' => 'verify postulation']);
        Permission::create(['name' => 'accept postulation']);
        Permission::create(['name' => 'register reports']);
        Permission::create(['name' => 'edit profile']);
        Permission::create(['name' => 'publish intership']);
        Permission::create(['name' => 'show stadistics']);

        // Permission for admin
        Permission::create(['name' => 'register career']);
        Permission::create(['name' => 'register members career']);
        Permission::create(['name' => 'register members agreement']);

        // Permission for Student
        $role1 = Role::create(['name' => 'student']);
        $role1->givePermissionTo('submit postulation');
        $role1->givePermissionTo('edit profile');

        $role2 = Role::create(['name' => 'careerDepartment']);
        $role2->givePermissionTo('register student');
        $role2->givePermissionTo('publish intership');
        $role2->givePermissionTo('verify postulation');
        $role2->givePermissionTo('accept postulation');
        $role2->givePermissionTo('register reports');
        $role2->givePermissionTo('show stadistics');

        $role3 = Role::create(['name' => 'agreementsDeparment']);
        $role3->givePermissionTo('register company');
        $role3->givePermissionTo('register agreements company');
        $role3->givePermissionTo('register intership');
        $role3->givePermissionTo('show stadistics');

        $role3 = Role::create(['name' => 'admin']);
        $role3->givePermissionTo('register career');
        $role3->givePermissionTo('register members career');
        $role3->givePermissionTo('register members agreement');

        $role4 = Role::create(['name' => 'Super-Admin']);

    }
}
