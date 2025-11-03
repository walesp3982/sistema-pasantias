<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students';

    public $timestamps = true;

    protected $fillable = [
        "first_name",
        "last_name",
        "identity_card",
        "phone_id",
        "location_id",
        "curriculum_vitae_id",
        "user_id"
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function phone() {
        return $this->belongsTo(Phone::class);
    }

    public function location() {
        return $this->belongsTo(Location::class);
    }

    public function curriculum_vitae() {
        return $this->belongsTo(Document::class);
    }

    public function postulations() {
        return $this->hasMany(Postulation::class);
    }

    public function getFullNameAttribute() {
        return $this->first_name." ".$this->last_name;
    }
}
