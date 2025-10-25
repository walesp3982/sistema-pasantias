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
        Schema::create('sector_companies', function (Blueprint $table) {
            $table->id();
            $table->string("name");
        });

        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->enum("type_capital", ["public", "private", "mixted"]);
            $table->enum("type-company",
                ["Sole Proprietorship", "Partnership", "Corporation", "LLC"]);
            $table->string("email");
            $table->foreignId("sector_id")->constrained("sector_companies");

            $table->timestamps();
        });
        Schema::create('logo_companies', function (Blueprint $table) {
            $table->id();
            $table->foreignId("company_id")->constrained();
            $table->foreignId("picture_id")->constrained();
            $table->boolean("active")->default(true);

            $table->index(['company_id', 'picture_id']);

        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('logo_companies');
        Schema::dropIfExists('companies');
        Schema::dropIfExists('sector_companies');

    }
};
