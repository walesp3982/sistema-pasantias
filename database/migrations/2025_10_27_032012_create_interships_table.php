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
        Schema::create('agreements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained();
            $table->string("title");
            $table->string("description")->nullable();
            $table->date("start_date");
            $table->date("end_date");
        });
        Schema::create('interships', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('agreement_id')->constrained();
            $table->date('start_date');
            $table->date('postulation_limit_date');
            $table->date('end_date');
            $table->enum('status', ["pending", "progress", "finished", "suspend"]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agreements');
        Schema::dropIfExists('interships');
    }
};
