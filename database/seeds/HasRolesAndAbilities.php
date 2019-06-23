<?php

use App\Models\Customers\Customer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Silber\Bouncer\BouncerFacade as Bouncer;


class HasRolesAndAbilities extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Bouncer::allow('admin')->toManage(\App\User::class);
        Bouncer::allow('user-manage')->to('update', \App\User::class);
        Bouncer::allow('shop-manager')->to('update', \App\User::class);

        $admin = factory(App\User::class)->create([
            'email' => 'admin@example.com',
            'password' => Hash::make('123456789')
        ]);

        $admin->assign('admin');

        $editor = factory(App\User::class)->create([
            'email' => 'showmanager@example.com',
            'password' => Hash::make('123456789')
        ]);

        $editor->assign('shop-manager');

       $manger = factory(App\User::class)->create([
            'email' => 'user@example.com',
            'password' => Hash::make('123456789')

        ]);

        $manger->assign('user-manager');

    }
}
