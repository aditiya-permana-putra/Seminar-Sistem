<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define permissions
        $permissions = [
            'management-access',
            'master-data',
            'table-user',
            'ubah-user',
            'tambah-user',
            'hapus-user',
            'table-role',
            'ubah-role',
            'tambah-role',
            'tambah-permission-role',
            'hapus-role',
            'table-permission',
            'ubah-permission',
            'tambah-permission',
            'hapus-permission',
            'table-permintaan',
            'tambah-permintaan',
            'ubah-permintaan',
            'detail-permintaan',
            'hapus-permintaan',
            'permintaan',
            'approve-manager-klinik',
            'approve-manager-umum',
            'approve-kepala-bidang',
            'cetak-surat',
        ];

        // Create permissions
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Assign permissions to roles
        $roles = [
            'Admin',
            'Unit',
            'Manager Klinik',
            'Manager Operasional & Umum',
            'Kepala Bidang Operasional & Umum',
        ];


        foreach ($roles as $roleName) {
            $role = Role::create(['name' => $roleName]);

            if ($roleName == 'Admin') {
                $role->givePermissionTo([
                    'management-access',
                    'master-data',
                    'table-user',
                    'ubah-user',
                    'tambah-user',
                    'hapus-user',
                    'table-role',
                    'ubah-role',
                    'tambah-role',
                    'tambah-permission-role',
                    'hapus-role',
                    'table-permission',
                    'ubah-permission',
                    'tambah-permission',
                    'hapus-permission',
                    'cetak-surat',
                ]);
            } elseif ($roleName == 'Unit') {
                $role->givePermissionTo([
                    'table-permintaan',
                    'tambah-permintaan',
                    'ubah-permintaan',
                    'detail-permintaan',
                    'hapus-permintaan',
                    'permintaan',
                ]);
            } elseif ($roleName == 'Manager Klinik') {
                $role->givePermissionTo([
                    'table-permintaan',
                    'tambah-permintaan',
                    'ubah-permintaan',
                    'detail-permintaan',
                    'hapus-permintaan',
                    'approve-manager-klinik',
                ]);
            } elseif ($roleName == 'Manager Operasional & Umum') {
                $role->givePermissionTo([
                    'table-permintaan',
                    'tambah-permintaan',
                    'ubah-permintaan',
                    'detail-permintaan',
                    'hapus-permintaan',
                    'approve-manager-umum',
                ]);
            } elseif ($roleName == 'Kepala Bidang Operasional & Umum') {
                $role->givePermissionTo([
                    'table-permintaan',
                    'tambah-permintaan',
                    'ubah-permintaan',
                    'detail-permintaan',
                    'hapus-permintaan',
                    'approve-kepala-bidang',
                ]);
            }
        }
    }
}
