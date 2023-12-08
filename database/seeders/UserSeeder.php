<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            [
                'first_name' => 'Admin',
                'last_name' => 'User',
                'name' => 'Admin User',
                'user_name' => 'admin',
                'email' => 'admin@exp.com',
                'password' => Hash::make('12345678'),
                'user_type' => 'admin',
                'mls_id' => null,
                'email_verified_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'first_name' => 'John',
                'last_name' => 'Doe',
                'name' => 'John Doe',
                'user_name' => 'john',
                'email' => 'john@exp.com',
                'password' => Hash::make('12345678'),
                'user_type' => 'seller_agent',
                'mls_id' => 'SA1001',
                'email_verified_at' => Carbon::now()->toDateTimeString(),
            ],
        ]);
        /* $user = new User();
        $user->first_name = 'John';
        $user->last_name = 'Doe';
        $user->name = 'John Doe';
        $user->user_name = 'john';
        $user->email = 'john@exp.com';
        $user->password = Hash::make('12345678');
        $user->user_type = 'seller_agent';
        $user->mls_id = 'SA1001';
        $user->email_verified_at = Carbon::now()->toDateTimeString();
        $user->save(); */
    }
}
