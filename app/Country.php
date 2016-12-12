<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    /**
     * Notes:
     * - in the tutorial says use 'Article' and 'User', but in the 5.2 documentation belongsTo has namespace path as well
     * without it fails
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function articles() {
        return $this->hasManyThrough('App\Article', 'App\User', 'country_id', 'user_id');
    }
}
