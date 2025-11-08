<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agreement extends Model
{
    //

    public function company() {
        return $this->belongsTo(Company::class);
    }

    public function interships() {
        return $this->hasMany(Intership::class);
    }
}
