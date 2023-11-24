<?php

namespace Database\Seeders;

use App\Constants\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Constants\UserType;

class UserSeeder extends Seeder
{

    use SeederTrait;

    public function run()
    {

        $this->truncate('users');

        $administrator = User::factory()->create([
            'name' => 'Administrator',
            'email' => 'administrator@mail.com'
        ]);

        $administrator->assignRole(Role::ADMINISTRATOR);

        $customer = User::factory()->create([
            'name' => 'Customer',
            'email' => 'customer@mail.com'
        ]);

        $customer->assignRole(Role::CUSTOMER);
    }
}
