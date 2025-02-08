<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\Wallet;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    /*
     *
     * Run the database seeds.
     *
     * @return void
     */


            $user = User::create([

                'name' => 'neominnthu',
                'email' => 'neominnthu@gmail.com',

                'password' => bcrypt('12345678')

            ]);

            $user2 = User::create([

                'name' => 'heinthiha',
                'email' => 'heinthiha@gmail.com',
                'referred_by' => 1,
                'password' => bcrypt('12345678')

            ]);

            $user3 = User::create([

                'name' => 'yelinthaw',
                'email' => 'yelinthaw@gmail.com',
                'referred_by' => 1,
                'password' => bcrypt('12345678')

            ]);

            $user4 = User::create([

                'name' => 'kyawclara',
                'email' => 'kyawtclara@gmail.com',
                'referred_by' => 1,
                'password' => bcrypt('12345678')

            ]);


            app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
            $role = Role::create(['name' => 'Super-Admin']);
            $role2 = Role::create(['name' => 'Admin']);
            $role3 = Role::create(['name' => 'Investor']);
            $role4 = Role::create(['name' => 'Customer']);
            app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
            $permissions = Permission::pluck('id','id')->all();

            $role->givePermissionTo($permissions);
            $role2->givePermissionTo($permissions);
            $role3->givePermissionTo($permissions);
            $role4->givePermissionTo($permissions);
            $user->assignRole([$role->id]);
            $user2->assignRole([$role2->id]);
            $user3->assignRole([$role3->id]);
            $user4->assignRole([$role4->id]);

            $wallet1 = Wallet::create([ 'user_id'=> 1]);
            $wallet1->balance += 100000000;
            $wallet1->reward_points += 1000;
            $wallet1->level = 3;
            $wallet1->save();
        }

}
