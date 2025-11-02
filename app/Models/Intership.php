<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Intership extends Model
{
    //
    public function agreement() {
        return $this->belongsTo(Agreement::class);
    }

    public function career() {
        return $this->hasOne(Career::class);
    }

    public function location() {
        return $this->hasMany(Postulation::class);
    }
}
