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
        $statusArray = ["send", "verified", "reject", "accept"];

        Schema::create('postulations', function (Blueprint $table)
        use($statusArray) {
            $table->id();
            $table->foreignId("intership_id")->constrained();
            $table->foreignId("student_id")->constrained();
            $table->enum("status", $statusArray);
            $table->timestamps();

            $table->unique(["intership_id", "student_id"]);
        });
        Schema::create('history_postulations', function (Blueprint $table)
        use($statusArray) {
            $table->id();
            $table->foreignId("postulation_id")->constrained();
            $table->enum("last_status", $statusArray);
            $table->enum("new_status", $statusArray);
            $table->timestamp("time_modify");
            $table->foreignId("user_id")->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('history_postulations');

        Schema::dropIfExists('postulations');
    }
};
