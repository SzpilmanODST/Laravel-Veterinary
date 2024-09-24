<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Users
        Permission::create(['name' => 'create-user']);
        Permission::create(['name' => 'read-user']);
        Permission::create(['name' => 'update-user']);
        Permission::create(['name' => 'delete-user']);

        // Appointments
        Permission::create(['name' => 'create-appointment']);
        Permission::create(['name' => 'read-appointment']);
        Permission::create(['name' => 'update-appointment']);
        Permission::create(['name' => 'delete-appointment']);

        // Pets
        Permission::create(['name' => 'create-pet']);
        Permission::create(['name' => 'read-pet']);
        Permission::create(['name' => 'update-pet']);
        Permission::create(['name' => 'delete-pet']);

        // PetOwners
        Permission::create(['name' => 'create-petOwner']);
        Permission::create(['name' => 'read-petOwner']);
        Permission::create(['name' => 'update-petOwner']);
        Permission::create(['name' => 'delete-petOwner']);

        // Prescriptions
        Permission::create(['name' => 'read-prescription']);
        Permission::create(['name' => 'update-prescription']);


        // Roles
        $adminRole = Role::create(['name' => 'admin']);
        $doctorRole = Role::create(['name' => 'doctor']);
        $secretaryRole = Role::create(['name' => 'secretary']);


        // Roles and Permissions
        $adminRole->givePermissionTo([
            'create-user',
            'read-user',
            'update-user',
            'delete-user',
            'create-appointment',
            'read-appointment',
            'update-appointment',
            'delete-appointment',
            'create-pet',
            'read-pet',
            'update-pet',
            'delete-pet',
            'create-petOwner',
            'read-petOwner',
            'update-petOwner',
            'delete-petOwner',
            'read-prescription',
            'update-prescription'
        ]);

        $doctorRole->givePermissionTo([
            'read-user',
            'create-appointment',
            'read-appointment',
            'update-appointment',
            'delete-appointment',
            'create-pet',
            'read-pet',
            'update-pet',
            'delete-pet',
            'create-petOwner',
            'read-petOwner',
            'update-petOwner',
            'delete-petOwner',
            'read-prescription',
            'update-prescription'
        ]);

        $secretaryRole->givePermissionTo([
            'create-appointment',
            'read-appointment',
            'update-appointment',
            'delete-appointment',
            'create-petOwner',
            'read-petOwner',
            'update-petOwner',
            'delete-petOwner',
        ]);

    }
}
