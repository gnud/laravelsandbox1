<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use App\User;

class Article extends Model
{
    /**
     * How NOT to get the user!
     */
    public function getPosterUsername() {
        return User::where('id', $this->user_id)->first()->name;
    }

    /**
     * Notes:
     * - in the tutorial says use 'User', but in the 5.2 documentation belongsTo has namespace path as well
     * without it fails
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user() {
        return $this->belongsTo('App\User');
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
    protected $morphClass = 'Article';
}
