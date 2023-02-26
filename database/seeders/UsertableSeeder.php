<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsertableSeeder extends Seeder
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
                'name' => 'iqbal alief noerdiansyah',
                'username' => 'admin',
                'nik' => '3203060050002103',
                'email' => 'sundagamers1933@gmail.com',
                'password' => bcrypt('12345'),
                'telp' => '0814567890123',
                'level'=>1,
            ],
            [
                'name' => 'iqbal alief',
                'username' => 'pekerja',
                'nik' => '3203060050002104',
                'email' => 'iqbalaliefnoerdiansyah@gmail.com',
                'telp' => '0814567890124',
                'password' => bcrypt('1234'),
                'level'=>2,
            ],
            [
                'name' => 'iqbal',
                'username' => 'masyarakat',
                'nik' => '3203060050002105',
                'email' => 'iqbalalief@gmail.com',
                'telp' => '0814567890143',
                'password' => bcrypt('123'),
                'level'=>3,
            ],
        ];

        foreach($user as $key => $value){
            User::create($value);
        }
    }
}
