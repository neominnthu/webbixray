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
                'reward_points' => 0,
                'password' => bcrypt('12345678')

            ]);

            $user2 = User::create([

                'name' => 'heinthiha',
                'email' => 'heinthiha@gmail.com',
                'reward_points' => 0,
                'password' => bcrypt('12345678')

            ]);

            $user3 = User::create([

                'name' => 'yelinthaw',
                'email' => 'yelinthaw@gmail.com',
                'reward_points' => 0,
                'password' => bcrypt('12345678')

            ]);

            $user4 = User::create([

                'name' => 'kyawclara',
                'email' => 'kyawtclara@gmail.com',
                'reward_points' => 0,
                'password' => bcrypt('12345678')

            ]);

            // Create a wallet for the new user
            Wallet::create([
                'user_id' => $user->id,
                'balance' => 100000000.00, // Default balance
            ]);

            Wallet::create([
                'user_id' => $user2->id,
                'balance' => 0, // Default balance
            ]);
            Wallet::create([
                'user_id' => $user3->id,
                'balance' => 0, // Default balance
            ]);
            Wallet::create([
                'user_id' => $user4->id,
                'balance' => 0, // Default balance
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

        }

}
