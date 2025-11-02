<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //
    public function locations() {
        return $this->hasMany(Location::class);
    }

    public function logo() {
        return $this->hasOne(Picture::class);
    }

    public function agreements() {
        return $this->hasMany(Agreement::class);
    }


}
