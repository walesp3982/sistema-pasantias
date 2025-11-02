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
            $table->foreignId('company_id')->constrained()->onDelete('cascade');
            $table->string("title");
            $table->text("description")->nullable();
            $table->date("start_date");
            $table->date("end_date");
        });

        Schema::create("careers", function (Blueprint $table) {
            $table->id();
            $table->string("name")->unique();
        });

        Schema::create('interships', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('agreement_id')->constrained()->onDelete('cascade');
            $table->foreignId("career_id")->constrained()->onDelete('cascade');
            $table->date('start_date');
            $table->date('postulation_limit_date');
            $table->date('end_date');
            $table->time("entry_time");
            $table->time("exit_time");
            $table->integer("vacant");
            $table->string("description")->nullable();
            $table->foreignId('company_location_id')
                ->constrained('company_location');
            $table->enum('status', ["pending", "progress", "finished", "suspend"]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('interships');
        Schema::dropIfExists('careers');
        Schema::dropIfExists('agreements');
    }
};
