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
            $table->string('path')->nullable();
            $table->string('path_thumbnail')->nullable();
            $table->string('path_medium')->nullable();
            $table->string('extension');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->integer("height");
            $table->integer("width");
            $table->integer("size");
            $table->morphs('pictureable');
        });

        Schema::create('sectors', function (Blueprint $table) {
            $table->id();
            $table->string("name");
        });

        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string("name")->unique();
            $table->foreignId("sector_id")
                ->constrained()
                ->onDelete('cascade');
            $table->string("email")->unique();
            $table->timestamps();
        });

        Schema::create('phones', function(Blueprint $table) {
            $table->id();
            $table->morphs('phoneable');
            $table->integer("code_number", false)->default(591);
            $table->string("phone_number", 10);
            $table->boolean("notifications");
        });

        Schema::create('municipalities', function(Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->integer("total_district");
        });

        Schema::create('zones', function(Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->integer("district_number");
            $table->foreignId('municipality_id')->constrained()->onDelete('cascade');
        });

        Schema::create('locations', function(Blueprint $table) {
            $table->id();
            $table->foreignId("zone_id")->constrained()->onDelete('cascade');
            $table->string("street");
            $table->morphs('locatable');
            $table->string('reference')->nullable();
            $table->integer("number_door");
        });

        Schema::create('company_location_details', function(Blueprint $table) {
            $table->id();
            $table->foreignId('location_id')->constrained()->onDelete('cascade');
            $table->foreignId('company_id')->constrained()->onDelete('cascade');
            $table->boolean('active')->default(true);
            $table->string("name_administrador");
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
        Schema::dropIfExists('zones');
        Schema::dropIfExists('municipalities');
        Schema::dropIfExists('phones');
        Schema::dropIfExists('companies');
        Schema::dropIfExists('sectors');
        Schema::dropIfExists('pictures');
    }
};
