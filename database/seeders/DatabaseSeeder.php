<?php

namespace Database\Seeders;

use App\Models\Staff;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
    
        Role::create(['name' => 'Admin', 'guard_name' => 'staff']);
        Role::create(['name' => 'Staff', 'guard_name' => 'staff']);

        
        $admin = Staff::create([
            'name' => 'System Admin',
            'email' => 'admin@transexpress.lk',
            'password' => Hash::make('password'), 
            'contact_no' => '0771234567',
            'status' => 'active',
        ]);

        
        $admin->assignRole('Admin');

        
        $staffUser = Staff::create([
            'name' => 'Normal Staff',
            'email' => 'staff@transexpress.lk',
            'password' => Hash::make('password'),
            'contact_no' => '0777654321',
            'status' => 'active',
        ]);

        
        $staffUser->assignRole('Staff');

        $this->command->info('Roles and Staff seeded successfully!');
    }
}