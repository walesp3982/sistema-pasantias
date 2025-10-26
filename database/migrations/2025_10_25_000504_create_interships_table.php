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
            $table->timestamps();
            $table->enum("status", ["open", "closed", "suspend"]);
        });
        Schema::create("careers", function(Blueprint $table) {
            $table->id();
            $table->string("name");
        });
        Schema::create("requirements_interships", function(Blueprint $table) {
            $table->id();
            $table->foreignId("career_id")->constrained();
            $table->foreignId("intership_id")->constrained();
            $table->foreignId("location_id")->constrained();
            $table->foreignId("entry_time")->nullable();
            $table->foreignId("exit_time")->nullable();
            $table->timestamps();
            $table->integer("vacant");
            $table->index(["career_id", "intership_id", "location_id"], "car_inter_loc_time_index");
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requirements_interships');
        Schema::dropIfExists('careers');
        Schema::dropIfExists('interships');
    }
};
