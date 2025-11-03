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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string("first_name");
            $table->string("last_name");
            $table->string("identity_card");
            $table->foreignId("phone_id")->constrained();
            $table->foreignId("location_id")
                ->nullable()
                ->constrained();
            $table->foreignId("curriculum_vitae_id")
                ->nullable()
                ->constrained('documents')
                ->onDelete('cascade');
            $table->foreignId('user_id')
                ->nullable()
                ->constrained()
                ->onDelete('cascade');
            $table->timestamps();

            $table->unique(['first_name', 'last_name']);
        });

        Schema::create("management", function (Blueprint $table) {
            $table->id();
            $table->year("year");
            $table->integer("number");
        });

        Schema::create("shifts", function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->time("entry_time");
            $table->time("exit_time");
        });

        Schema::create("managements_students", function (Blueprint $table) {
            $table->id();
            $table->foreignId("student_id")->constrained()->onDelete('cascade');
            $table->foreignId("management_id")->constrained()->onDelete('cascade');
            $table->foreignId("career_id")->constrained()->onDelete('cascade');
            $table->foreignId("shifts_id")->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('managements_students');
        Schema::dropIfExists('shifts');
        Schema::dropIfExists('management');
        Schema::dropIfExists('students');
    }
};
