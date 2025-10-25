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
        Schema::create('pictures', function (Blueprint $table) {
            $table->id();
            $table->uuid("uuid")->unique()->index();
            $table->string("name");
            $table->string("path");
            $table->string("path_thumbnail")->nullable();
            $table->string("path_medium");
            $table->string("extension");
            $table->integer("height");
            $table->integer("width");
            $table->integer("size");
            $table->string("hash")->nullable()->index();
            $table->string("disco")->default("public");
            $table->foreignId("user_id")->constrained()->cascadeOnDelete();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pictures');
    }
};
