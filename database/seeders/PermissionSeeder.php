<?php

namespace Database\Seeders;

use App\Constants\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('permissions')->truncate();
        DB::table('role_has_permissions')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $permissions = $this->getPermissions();
        $permissions->each(fn ($roles, $index) => $this->savePermission($index, $roles));
    }

    private function getPermissions(): Collection
    {
        return collect([
            'history' => [Role::ADMINISTRATOR],
            'history-get-data' => [Role::ADMINISTRATOR],
            
            
            'data-mesin' => [Role::ADMINISTRATOR],
            'data-mesin-customer' => [Role::CUSTOMER],
        ]);
    }

    /**
     * @param $index
     * @param $roles
     */
    private function savePermission($index, $roles): void
    {
        $permission = Permission::firstOrCreate(['name' => $index]);

        collect($roles)->each(fn ($role) => $this->givePermissionToRole($role, $permission));
    }

    /**
     * @param $role
     * @param $permission
     */
    private function givePermissionToRole($role, $permission): void
    {
        $role = \Spatie\Permission\Models\Role::firstOrCreate(['name' => $role]);
        $role->givePermissionTo($permission->name);
    }
}
