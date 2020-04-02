<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

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
        $permissions = array();
        foreach(Permission::all()->pluck('name') as $permission){
            $permissions[] = $permission;
        }
        $role->givePermissionTo($permissions);
    }
}
