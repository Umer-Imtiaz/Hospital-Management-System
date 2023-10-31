<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'=>'Admin',
            'email'=>'admin@test.com',
            'address'=>'lahore',
            'password'=>Hash::make('123456789'),
            'userType'=>'1',
            'phone'=>'03331234566'
        ]);
        User::create([
            'name'=>'Umer',
            'email'=>'umer@test.com',
            'address'=>'lahore',
            'password'=>Hash::make('123456789'),
            'userType'=>'0',
            'phone'=>'03331234544'
        ]);
    }
}
