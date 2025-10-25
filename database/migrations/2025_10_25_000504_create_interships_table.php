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
        Schema::create('interships', function (Blueprint $table) {
            $table->id();
            $table->date("start_date");
            $table->date("end_date");
            $table->foreignId("agreement_id")->constrained();
            $table->timestamps("descriptions");
            $table->enum("status", ["open", "closed", "suspend"]);
            $table->foreignId("location_id")->constrained();
        });
        Schema::create("careers", function(Blueprint $table) {
            $table->id();
            $table->string("name");
        });
        Schema::create("times_interships", function(Blueprint $table) {
            $table->id();
            $table->time("entry_time");
            $table->time("exit_time");
        });
        Schema::create("careers_interships", function(Blueprint $table) {
            $table->id();
            $table->foreignId("career_id")->constrained();
            $table->foreignId("intership_id")->constrained();
            $table->foreignId("time_intership_id")->constrained();
            $table->integer("vacant");
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('careers_interships');
        Schema::dropIfExists('times_interships');
        Schema::dropIfExists('carrers');
        Schema::dropIfExists('interships');
    }
};
