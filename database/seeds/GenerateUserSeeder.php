<?php

use Illuminate\Database\Seeder;

use App\User;

class GenerateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(App\User::class, 50)->make()->each(function ($u) {
        //     $u->save();
        //     $u->assignRole('user');
        // });

        for($i=1;$i<=9999999;$i++){
            $user = factory(User::class)->make();
            $user->save();
            $user->assignRole('user');
        }
    }
}
