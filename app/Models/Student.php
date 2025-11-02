<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students';

    public $timestamps = true;

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function phone() {
        return $this->hasOne(Phone::class);
    }

    public function location() {
        return $this->hasOne(Location::class);
    }

    public function curriculum_vitae() {
        return $this->hasOne(Document::class);
    }

    public function postulations() {
        return $this->hasMany(Postulation::class);
    }
}
