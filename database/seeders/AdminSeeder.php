<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    public function run()
    {
        DB::table('admins')->insert(
            [
                'first_name' => 'Admin',
                'last_name' => 'Admin',
                'email' => 'admin@admin.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make(1234),
                'remember_token' => Str::random(60),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );
    }
}
