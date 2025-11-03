<?php

namespace App\Repositories;

use App\Models\Document;
use App\Repositories\Interfaces\DocumentRepositoryInterface;

class DocumentRepository implements DocumentRepositoryInterface{
    public function __construct(private readonly Document $model) {

    }
    public function create(array $data):Document {
        $document = $this->model->create();
        return $document;
    }

    public function get(int $id): ?Document {
        $document = $this->model->find($id);
        return $document;
    }

    public function delete(int $id): bool {
        $document = $this->model->find($id);
        return $document->delete();
    }
}
