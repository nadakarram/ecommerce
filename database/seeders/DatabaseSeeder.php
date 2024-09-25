<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();


        // $this->call(RolesAndPermationsSeeder::class);
        $admin = User::factory()->create([
            'name' => 'admin2',
            'email' => 'admin1@google.com',
            'age' => 45,
            "phone_number" => "01223458766",
            "address" => "no address",
            "password" => "admin123"


        ]);
        $admin->assignRole("admin");
        // $superadmin = User::factory()->create([
        //     'name' => 'superadmin1',
        //     'email' => 'superadmin@google.com',
        //     'age' => 45,
        //     "phone_number" => "01223458766",
        //     "address" => "no address",
        //     "password" => "superadmin123"


        // ]);
        // $superadmin->assignRole("superadmin");
    }
}
