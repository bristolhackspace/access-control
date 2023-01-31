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
                'title' => 'card_create',
            ],
            [
                'id'    => 18,
                'title' => 'card_edit',
            ],
            [
                'id'    => 19,
                'title' => 'card_show',
            ],
            [
                'id'    => 20,
                'title' => 'card_delete',
            ],
            [
                'id'    => 21,
                'title' => 'card_access',
            ],
            [
                'id'    => 22,
                'title' => 'machine_create',
            ],
            [
                'id'    => 23,
                'title' => 'machine_edit',
            ],
            [
                'id'    => 24,
                'title' => 'machine_show',
            ],
            [
                'id'    => 25,
                'title' => 'machine_delete',
            ],
            [
                'id'    => 26,
                'title' => 'machine_access',
            ],
            [
                'id'    => 27,
                'title' => 'induction_create',
            ],
            [
                'id'    => 28,
                'title' => 'induction_edit',
            ],
            [
                'id'    => 29,
                'title' => 'induction_show',
            ],
            [
                'id'    => 30,
                'title' => 'induction_delete',
            ],
            [
                'id'    => 31,
                'title' => 'induction_access',
            ],
            [
                'id'    => 32,
                'title' => 'login_create',
            ],
            [
                'id'    => 33,
                'title' => 'login_edit',
            ],
            [
                'id'    => 34,
                'title' => 'login_show',
            ],
            [
                'id'    => 35,
                'title' => 'login_delete',
            ],
            [
                'id'    => 36,
                'title' => 'login_access',
            ],
            [
                'id'    => 37,
                'title' => 'question_create',
            ],
            [
                'id'    => 38,
                'title' => 'question_edit',
            ],
            [
                'id'    => 39,
                'title' => 'question_show',
            ],
            [
                'id'    => 40,
                'title' => 'question_delete',
            ],
            [
                'id'    => 41,
                'title' => 'question_access',
            ],
            [
                'id'    => 42,
                'title' => 'answer_create',
            ],
            [
                'id'    => 43,
                'title' => 'answer_edit',
            ],
            [
                'id'    => 44,
                'title' => 'answer_show',
            ],
            [
                'id'    => 45,
                'title' => 'answer_delete',
            ],
            [
                'id'    => 46,
                'title' => 'answer_access',
            ],
            [
                'id'    => 47,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 48,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 49,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
