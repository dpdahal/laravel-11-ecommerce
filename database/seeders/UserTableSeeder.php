<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'country_id' => 1,
                'account_type_id' => 1,
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('admin002'),
                'email_verified_at' => now(),

            ],
            [
                'country_id' => 1,
                'account_type_id' => 2,
                'name' => 'vendor',
                'email' => 'vendor@gmail.com',
                'password' => bcrypt('vendor002'),
                'email_verified_at' => now(),
            ],
            [
                'country_id' => 1,
                'account_type_id' => 3,
                'name' => 'customer',
                'email' => 'customer@gmail.com',
                'password' => bcrypt('customer002'),
                'email_verified_at' => now(),
            ],


        ];


        foreach ($userData as $user) {
            $total = User::where('email', $user['email'])->count();
            if ($total == 0) {
                $user = User::create($user);
                if ($user->account_type->name == 'admin') {
                    $role = Role::where('name', 'admin')->first();
                    $permissions = Permission::pluck('id', 'id')->all();
                    $role->syncPermissions($permissions);
                    $user->assignRole([$role->id]);
                }

            }
        }


    }
}
