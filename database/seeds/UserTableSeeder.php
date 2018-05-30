<?php

use Illuminate\Database\Seeder;

use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superadmin = factory(User::class)->make();
        $superadmin->save();
        $superadmin->assignRole('superadmin');

        $admin = factory(User::class)->make();
        $admin->save();
        $admin->assignRole('admin');

        $user = factory(User::class)->make();
        $user->save();
        $user->assignRole('user');
    }
}
