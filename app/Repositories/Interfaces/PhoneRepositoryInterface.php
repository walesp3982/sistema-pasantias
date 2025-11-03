<?php

namespace App\Repositories\Interfaces;

use App\Models\Phone;
use Illuminate\Database\Eloquent\Collection;

interface PhoneRepositoryInterface {
    public function create($data): Phone;

    public function get(int $id): ?Phone;

    public function findByCountry(int $idCountry): Collection;

    public function search(string $code): Collection;
}
