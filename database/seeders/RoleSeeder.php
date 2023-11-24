<?php

namespace Database\Seeders;

use App\Constants\Role as ConstantsRole;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('roles')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        collect(ConstantsRole::all())->each(fn ($name, $key) => $this->saveRole($key));
    }

    private function saveRole(string $name): void
    {
        $r = new Role();
        $r->name = $name;
        $r->save();
    }
}
