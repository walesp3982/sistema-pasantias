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
        Schema::create('pictures', function (Blueprint $table) {
            $table->id();
            $table->uuid()->unique();
            $table->string('name');
            $table->string('description');
            $table->string('path');
            $table->string('path_thumbnail');
            $table->string('path_medium');
            $table->string('extension');
            $table->foreignId('user_id')->constrained();
            $table->integer("height");
            $table->integer("width");
            $table->integer("size");
        });

        Schema::create('sectors', function (Blueprint $table) {
            $table->id();
            $table->string("name");
        });

        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string("name")->unique();
            $table->foreignId("sector_id")->constrained();
            $table->string("email")->unique();
            $table->foreignId("logo_id")->constrained("pictures");
            $table->timestamps();
        });

        Schema::create('phones', function(Blueprint $table) {
            $table->id();
            $table->foreignId("country_id")->constrained();
            $table->string("phone_number");
        });

        Schema::create('company_phones', function(Blueprint $table) {
            $table->id();
            $table->foreignId("company_id")->constrained();
            $table->foreignId("phone_id")->constrained();
            $table->string("name_owner")->nullable();
            $table->boolean("active")->default(true);
        });

        Schema::create('channels', function(Blueprint $table) {
            $table->id();
            $table->string("name");
        });

        Schema::create('channels_phones', function(Blueprint $table) {
            $table->id();
            $table->foreignId("phone_id")->constrained();
            $table->foreignId("channel_id")->constrained();
            $table->index(["phone_id", "channel_id"]);
        });

        Schema::create('locations', function(Blueprint $table) {
            $table->id();
            $table->foreignId("city_id")->constrained();
            $table->foreignId("zone")->nullable();
        });

        Schema::create('company_locations', function(Blueprint $table) {
            $table->id();
            $table->foreignId('location_id')->constrained();
            $table->foreignId('company_id')->constrained();
            $table->boolean('active')->default(true);
            $table->foreignId('phone_id')->nullable();
            $table->index(["location_id", "company_id"]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_locations');
        Schema::dropIfExists('locations');
        Schema::dropIfExists('channels_phones');
        Schema::dropIfExists('channels');
        Schema::dropIfExists('company_phones');
        Schema::dropIfExists('phones');
        Schema::dropIfExists('companies');
        Schema::dropIfExists('sectors');
        Schema::dropIfExists('pictures');
    }
};
