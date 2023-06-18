<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name' => 'admin',
                'username' => 'admin',
                'kelas' => NULL,
                'password' => bcrypt('12345'),
                'level' => 'admin',
                'foto' => NULL,
            ],
            [
                'name' => 'bendahara',
                'username' => 'bendahara',
                'kelas' => 'TIGA TRAINING',
                'password' => bcrypt('12345'),
                'level' => 'bendahara',
                'foto' => NULL,
            ]
        ];

        foreach($user as $key => $value) {
            User::create($value);
        }
    }
}