<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role_name', 'role_alias', 'is_active',
    ];

    /**
     * @return Inverse Relationship
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
