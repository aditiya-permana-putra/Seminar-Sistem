<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'Arinda Hani',
            'email' => 'admin',
            'password' => Hash::make('asdasdasd'),
            'remember_token' => null,
            'jabatan' => 'Koordinator',
            'foto' => null,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $admin->assignRole('Admin');

        $unit1 = User::create([
            'name' => 'dr. A.A Eko Basuki',
            'email' => 'nlmku',
            'password' => Hash::make('asdasdasd'),
            'remember_token' => null,
            'jabatan' => 'Kepala Klinik Utama Nusa Lima',
            'foto' => null,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $unit1->assignRole('Unit');

        $unit2 = User::create([
            'name' => 'dr. Hafizur Rahman',
            'email' => 'nlmkpn',
            'password' => Hash::make('asdasdasd'),
            'remember_token' => null,
            'jabatan' => 'Kepala Klinik Pratama Nusalima Pekanbaru',
            'foto' => null,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $unit2->assignRole('Unit');

        $unit3 = User::create([
            'name' => 'dr. Vita Aulia',
            'email' => 'nlmsgh',
            'password' => Hash::make('asdasdasd'),
            'remember_token' => null,
            'jabatan' => 'Kepala Klinik Pratama Emplasment Sei Galuh',
            'foto' => null,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $unit3->assignRole('Unit');

        $unit4 = User::create([
            'name' => 'dr. Dwi Kusuma Ferridawati',
            'email' => 'nlmsli',
            'password' => Hash::make('asdasdasd'),
            'remember_token' => null,
            'jabatan' => 'Kepala Klinik Pratama Emplasment Sei Lindai',
            'foto' => null,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $unit4->assignRole('Unit');

        $unit5 = User::create([
            'name' => 'dr. M.Iqbal Nusa',
            'email' => 'nlmlda',
            'password' => Hash::make('asdasdasd'),
            'remember_token' => null,
            'jabatan' => 'Kepala Klinik Pratama Emplasment Lubuk Dalam',
            'foto' => null,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $unit5->assignRole('Unit');

        $unit6 = User::create([
            'name' => 'dr. M. Reski Hakim',
            'email' => 'nlmtrt',
            'password' => Hash::make('asdasdasd'),
            'remember_token' => null,
            'jabatan' => 'Kepala Klinik Pratama Emplasment Terantam',
            'foto' => null,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $unit6->assignRole('Unit');

        $unit7 = User::create([
            'name' => 'dr. Rizki Mulia Abidin',
            'email' => 'nlmksk',
            'password' => Hash::make('asdasdasd'),
            'remember_token' => null,
            'jabatan' => 'Kepala Klinik Pratama Emplasment Terantam',
            'foto' => null,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $unit7->assignRole('Unit');

        $unit8 = User::create([
            'name' => 'dr. Putri Arianti',
            'email' => 'nlmsro',
            'password' => Hash::make('asdasdasd'),
            'remember_token' => null,
            'jabatan' => 'Kepala Klinik Pratama Emplasment Sri Rokan',
            'foto' => null,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $unit8->assignRole('Unit');

        $unit9 = User::create([
            'name' => 'dr. Garo',
            'email' => 'nlmgaro',
            'password' => Hash::make('asdasdasd'),
            'remember_token' => null,
            'jabatan' => 'Kepala Klinik Pratama Emplasment Garo',
            'foto' => null,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $unit9->assignRole('Unit');

        $managerklinik = User::create([
            'name' => 'dr. Tommy Kirana',
            'email' => 'managerklinik',
            'password' => Hash::make('asdasdasd'),
            'remember_token' => null,
            'jabatan' => 'Manager Klinik',
            'foto' => null,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $managerklinik->assignRole('Manager Klinik');

        $kabid = User::create([
            'name' => 'Debie Herani Monica, SE',
            'email' => 'kabid',
            'password' => Hash::make('asdasdasd'),
            'remember_token' => null,
            'jabatan' => 'Kepala Bidang Operasional & Umum',
            'foto' => null,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $kabid->assignRole('Kepala Bidang Operasional & Umum');

        $managerumum = User::create([
            'name' => 'Rini Yulianti, Ssi,Apt',
            'email' => 'managerumum',
            'password' => Hash::make('asdasdasd'),
            'remember_token' => null,
            'jabatan' => 'Manager Operasional & Umum',
            'foto' => null,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $managerumum->assignRole('Manager Operasional & Umum');
    }
}
