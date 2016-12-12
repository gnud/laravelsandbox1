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
}
