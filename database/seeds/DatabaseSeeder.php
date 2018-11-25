<?php

use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(\CategoryTableSeeder::class);

        User::Create([
            'name'=>'Administrator',
            'email'=>'admin@compulse.com',
            'password'=>bcrypt('secret'),
            'email_verified_at'=>now(),
            'is_admin'=>true,
        ]);
    }
}
