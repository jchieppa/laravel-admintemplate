<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create(['name' => 'admin']);
        $permissions = [];
        foreach (Permission::all()->pluck('name') as $permission) {
            $permissions[] = $permission;
        }
        $role->givePermissionTo($permissions);
    }
}
