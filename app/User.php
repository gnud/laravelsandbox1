<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    /**
     * Notes:
     * - in the tutorial says use 'Article', but in the 5.2 documentation belongsTo has namespace path as well
     * without it fails
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function articles() {
        return $this->hasMany('App\Article');
    }

    public function country() {
        return $this->belongsTo('App\Country');
    }

    public function roles() {
        // This one if we got custom table naming
//        return $this->belongsToMany('App\Role', 'roles_user');
        return $this->belongsToMany('App\Role');
    }

    public function comments() {
        return $this->morphMany('App\Comment', 'commentable');
    }

    /**
     * NOTE: stupid Laravel sends the namespace to the commentable_type
     * as seen in the query:
     * select * from `comments` where `comments`.`commentable_id` = 1 and `comments`.`commentable_id` is not null and
     * `comments`.`commentable_type` = 'App\Article'
     * This fixes that problem.
     */
    protected $morphClass = 'User';
}
