<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends \Spatie\Permission\Models\Role
{
    protected $fillable = [];

    /**
     * Filter roles to show filter depending of the permissions
     *
     * @param Builder $query
     * @param \User $user
     * @return Builder
     */
    public function scopeFilterByUserPermissions($query, User $user)
    {
        if ($user->hasRole('admin')) {
            return $query;
        }

        return $query->whereNotIn('name', ['admin']);
    }

    public function canSeeAdmin(User $user)
    {
        if ($user->hasRole('admin')) {
            return true;
        }

        return false;
    }


}
