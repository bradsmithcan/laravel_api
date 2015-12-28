<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
//    protected $table = 'roles';
    protected $fillable = ['role'];
    public $timestamps = false;

    /**
     * Role has many Users.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function user()
    {
        return $this->hasMany('App\User');
    }
}
