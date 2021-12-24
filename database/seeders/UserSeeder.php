<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Seeder;
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
        $admin = Role::create([
            'name' => 'admin',
            'display_name' => 'User Administrator'
        ]);

        $pengguna = Role::create([
            'name' => 'pengguna',
            'display_name' => 'User Biasa'
        ]);

        $user = new User();
        $user->name = 'Muhammad azis';
        $user->email = 'azis@gmail.com';
        $user->password = Hash::make('12345678');
        $user->save();

        $pengunjung = new User();
        $pengunjung->name = 'pengguna';
        $pengunjung->email = 'pengguna@gmail.com';
        $pengunjung->password = Hash::make('12345678');
        $pengunjung->save();

        $user->attachRole($admin);
        $pengunjung->attachRole($pengguna);

        $kasir = Role::create([
            'name' => 'kasir',
            'display_name' => 'izin kasir'
        ]);


    }
}
