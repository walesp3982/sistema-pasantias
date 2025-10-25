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
        Schema::create('management', function(Blueprint $table) {
            $table->id();
            $table->year("year");
            $table->integer("period");
            // Garantizamos que sea YYYY-1 o YYYY-2
        });
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string("names");
            $table->string("last names");
            $table->boolean("active")->defaut(true);
            $table->integer("ci");
            $table->string("department_ci");
            $table->foreignId("user_id")->constrained();
            $table->foreignId("avatar_id")->constrained("pictures");

            $table->timestamps();
        });

        Schema::create('managements_students', function(Blueprint $table) {
            $table->id();
            $table->foreignId("student_id")->constrained();
            $table->foreignId("management_id")->constrained();
            $table->foreignId("career_id")->constrained();
            $table->integer("semester");

            $table->enum("status",["finish", "active", "abandoned"]);
            $table->timestamps();

            $table->index(["student_id", "management_id", "career_id", "semester"], "std_mng_car_sem_index");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('managements_students');
        Schema::dropIfExists('students');
        Schema::dropIfExists('management');
    }
};
