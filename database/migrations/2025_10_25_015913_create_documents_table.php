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
            $table->uuid();
            $table->string("name");
            $table->string("path");
            $table->string("extension");
            $table->integer("size");
            $table->string("hash")->nullable()->index();
            $table->string("disco");
            $table->foreignId("user_id")->constrained()->cascadeOnDelete();
            $table->foreignId("type_document_id")->constrained();
            $table->timestamps();
            $table->softDeletes();
            $table->boolean("fake");
        });

        Schema::table('students', function (Blueprint $table) {
            $table->foreignId("cv-auto")
                ->constrained("documents")
                ->nullable();
        });

        Schema::table('interships', function (Blueprint $table) {
            $table->foreignId("call")
                ->constrained("documents")
                ->nullable();
        });

        Schema::create('postulations_documents', function(Blueprint $table){
            $table->id();
            $table->foreignId("postulations_id")->constrained();
            $table->foreignId("documents_id")->constrained();
            $table->index(['postulations_id', 'documents_id']);
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('students', function(Blueprint $table) {
            $table->dropForeign(['cv_auto']);
        });
        Schema::table('interships', function(Blueprint $table) {
            $table->dropForeign(['call']);
        });
        Schema::dropIfExists('postulations_documents');

        Schema::dropIfExists('documents');
        Schema::dropIfExists('type_documents');

    }
};
