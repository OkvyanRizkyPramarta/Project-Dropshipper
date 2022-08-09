<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

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
                'name' => 'Okvyan Rizky',
                'username' => 'owner',
                'email' => 'owner@email.com',
                'password' => Hash::make('owner123'),
                'role' => 'Owner',
                'id_card_number' => '14102001',
                'phone_number' => '083848876886',
                'whatsapp_number' => '083848876886',
                'created_at' => Carbon::now(),
            ],
        ]);
    }
}
