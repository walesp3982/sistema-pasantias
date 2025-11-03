<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    //
    public $timestamps = true;

    protected $fillable = [
        'uuid',
        'name',
        'extension',
        'path',
        'size',
        'user_id'
    ];
    public function user() {
        return $this->belongsTo(User::class);
    }


}
