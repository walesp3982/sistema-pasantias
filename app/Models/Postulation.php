<?php

namespace App\Models;

use App\Enums\StatePostulationEnum;
use Illuminate\Database\Eloquent\Model;

class Postulation extends Model
{
    //
    public function student() {
        return $this->belongsTo(Student::class);
    }

    public function intership() {
        return $this->belongsTo(Intership::class);
    }

    protected function casts(): array
    {
        return [
            'status' => StatePostulationEnum::class,
        ];
    }
}
