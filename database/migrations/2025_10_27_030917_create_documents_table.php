<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('type_documents', function(Blueprint $table) {
            $table->id();
            $table->string("name");
        });

        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->uuid()->unique();
            $table->string('name');
            $table->string('extension');
            $table->string('path');
            $table->integer('size');
            $table->foreignId('user_id')->constrained();
            $table->foreignId('type_document_id')->constrained();
            $table->timestamps();
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents');
        Schema::dropIfExists('type_documents');
    }
};
