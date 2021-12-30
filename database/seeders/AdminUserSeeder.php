<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'first_name' => 'ahmed',
            'last_name' => 'mahfouz',
            'email' => 'ahmed@admin.com',
            'password' => bcrypt('ahmed12345'),
            'type' => 'super_admin'
        ]);
        
    }
}
