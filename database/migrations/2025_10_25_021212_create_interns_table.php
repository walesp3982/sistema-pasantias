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
        Schema::create('interns', function (Blueprint $table) {
            $table->id();
            $table->foreignId("postulation_id")->constrained();
            $table->enum("status", ["wait","progress", "finish", "abandoned"]);
            $table->timestamps();
        });

        Schema::create('type_reports', function(Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->enum("status", ["low", "medium", "high"]);
        });
        Schema::create('reports', function(Blueprint $table) {
            $table->id();
            $table->string("description");
            $table->string("autor");
            $table->foreignId("type_report_id")->constrained();
            $table->foreignId("intern_id")->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('report');
        Schema::dropIfExists('type_reports');
        Schema::dropIfExists('interns');
    }
};
