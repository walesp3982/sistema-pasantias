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
    }
};
