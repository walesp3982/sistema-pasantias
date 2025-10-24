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
        Schema::create('phones_companies', function (Blueprint $table) {
            $table->id();
            $table->string("regional_code");
            $table->string("phone_code");
            $table->string("cargo");
            $table->string("owner_name");
            $table->foreignId("company_id")->constrained();
            $table->timestamp("created_in");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phones_companies');
    }
};
