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
            $table->foreignId("country_id")->constrained();
            $table->string("phone_code");
            $table->string("cargo");
            $table->string("owner_name");
            $table->foreignId("company_id")->constrained();
            $table->timestamp("created_in");
            $table->boolean("active")->default(true);
        });
        Schema::create('channels', function (Blueprint $table) {
            $table->id();
            $table->string("name");
        });
        Schema::create('channels_phones', function (Blueprint $table) {
            $table->foreignId("phone_id")->constrained("phones_companies")->cascadeOnDelete();
            $table->foreignId("channel_id")->constrained()->cascadeOnDelete();
            $table->index(["phone_id", "channel_id"]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('channels_phones');
        Schema::dropIfExists('channels');
        Schema::dropIfExists('phones_companies');
    }
};
