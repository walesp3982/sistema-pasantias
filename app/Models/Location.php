<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Nnjeim\World\Models\City;
class Location extends Model
{
    public function city() {
        return $this->hasOne(City::class);
    }

    public function company() {
        return $this->hasMany(Company::class);
    }

}
