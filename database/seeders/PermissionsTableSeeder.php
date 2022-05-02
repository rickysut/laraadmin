<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 18,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 19,
                'title' => 'app_connection_access',
            ],
            [
                'id'    => 20,
                'title' => 'banpem_access',
            ],
            [
                'id'    => 21,
                'title' => 'pagu_access',
            ],
            [
                'id'    => 22,
                'title' => 'master_data_access',
            ],
            [
                'id'    => 23,
                'title' => 'backdate_banpem_create',
            ],
            [
                'id'    => 24,
                'title' => 'backdate_banpem_edit',
            ],
            [
                'id'    => 25,
                'title' => 'backdate_banpem_show',
            ],
            [
                'id'    => 26,
                'title' => 'backdate_banpem_delete',
            ],
            [
                'id'    => 27,
                'title' => 'backdate_banpem_access',
            ],
            [
                'id'    => 28,
                'title' => 'akun_create',
            ],
            [
                'id'    => 29,
                'title' => 'akun_edit',
            ],
            [
                'id'    => 30,
                'title' => 'akun_show',
            ],
            [
                'id'    => 31,
                'title' => 'akun_delete',
            ],
            [
                'id'    => 32,
                'title' => 'akun_access',
            ],
            [
                'id'    => 33,
                'title' => 'provinsi_create',
            ],
            [
                'id'    => 34,
                'title' => 'provinsi_edit',
            ],
            [
                'id'    => 35,
                'title' => 'provinsi_show',
            ],
            [
                'id'    => 36,
                'title' => 'provinsi_delete',
            ],
            [
                'id'    => 37,
                'title' => 'provinsi_access',
            ],
            [
                'id'    => 38,
                'title' => 'kabupaten_create',
            ],
            [
                'id'    => 39,
                'title' => 'kabupaten_edit',
            ],
            [
                'id'    => 40,
                'title' => 'kabupaten_show',
            ],
            [
                'id'    => 41,
                'title' => 'kabupaten_delete',
            ],
            [
                'id'    => 42,
                'title' => 'kabupaten_access',
            ],
            [
                'id'    => 43,
                'title' => 'kecamatan_create',
            ],
            [
                'id'    => 44,
                'title' => 'kecamatan_edit',
            ],
            [
                'id'    => 45,
                'title' => 'kecamatan_show',
            ],
            [
                'id'    => 46,
                'title' => 'kecamatan_delete',
            ],
            [
                'id'    => 47,
                'title' => 'kecamatan_access',
            ],
            [
                'id'    => 48,
                'title' => 'desa_create',
            ],
            [
                'id'    => 49,
                'title' => 'desa_edit',
            ],
            [
                'id'    => 50,
                'title' => 'desa_show',
            ],
            [
                'id'    => 51,
                'title' => 'desa_delete',
            ],
            [
                'id'    => 52,
                'title' => 'desa_access',
            ],
            [
                'id'    => 53,
                'title' => 'belanja_create',
            ],
            [
                'id'    => 54,
                'title' => 'belanja_edit',
            ],
            [
                'id'    => 55,
                'title' => 'belanja_show',
            ],
            [
                'id'    => 56,
                'title' => 'belanja_delete',
            ],
            [
                'id'    => 57,
                'title' => 'belanja_access',
            ],
            [
                'id'    => 58,
                'title' => 'profile_password_edit',
            ],
            [
                'id'    => 58,
                'title' => 'satker_create',
            ],
            [
                'id'    => 59,
                'title' => 'satker_edit',
            ],
            [
                'id'    => 60,
                'title' => 'satker_show',
            ],
            [
                'id'    => 61,
                'title' => 'satker_delete',
            ],
            [
                'id'    => 62,
                'title' => 'satker_access',
            ],
            
        ];

        Permission::insert($permissions);
    }
}
