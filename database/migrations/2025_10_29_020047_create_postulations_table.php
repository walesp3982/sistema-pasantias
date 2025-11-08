<?php

use App\Enums\StatePostulationEnum;
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
        $status_postulation = StatePostulationEnum::cases();

        Schema::create('type_document_postulations', function(Blueprint $table) {
            $table->id();
            $table->string("name")->unique();
        });

        Schema::create('postulations', function (Blueprint $table)
        use ($status_postulation) {
            $table->id();
            $table->foreignId('student_id')->constrained()->onDelete('cascade');
            $table->foreignId('intership_id')->constrained()->onDelete('cascade');
            $table->enum('status', $status_postulation)
                ->default(StatePostulationEnum::CREATED);
            $table->timestamps();
        });

        Schema::create('document_postulations', function(Blueprint $table) {
            $table->id();
            $table->foreignId('postulation_id')->constrained();
            $table->foreignId('type_document_postulation_id')->constrained();
            $table->unique(['postulation_id', 'type_document_postulation_id'], 'postulation_id_type_doc_unique');
            $table->boolean('verify')->default(false);
        });

        // ! Trabajamos con esta tabla???
        // Schema::create('history_postulations', function (Blueprint $table)
        // use ($status_postulation) {
        //     $table->id();
        //     $table->foreignId("postulation_id")->constrained()->onDelete('cascade');
        //     $table->enum('last_status', $status_postulation);
        //     $table->enum('new_status', $status_postulation);
        //     $table->foreignId('user_id')->constrained()->onDelete('cascade');
        //     $table->timestamp('time_modify');
        // });

        Schema::create('interns', function(Blueprint $table) {
            $table->id();
            $table->foreignId('postulation_id')->constrained()->onDelete('cascade');
            $table->enum('status', ['wait', 'active', 'finished', 'abandoned']);
        });

        Schema::create('type_reports', function(Blueprint $table) {
            $table->id();
            $table->string("name")->unique();
            $table->enum('class', ['good', 'bad']);
        });

        Schema::create('reports', function(Blueprint $table) {
            $table->id();
            $table->string("descripcion");
            $table->string("autor");
            $table->foreignId('type_report_id')->constrained()->onDelete('cascade');
            $table->date('date_create');
            $table->foreignId('intern_id')->constrained()->onDelete('cascade');
            $table->foreignId('document_id')->constrained()->onDelete('cascade');
            $table->boolean('verify')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
        Schema::dropIfExists('type_reports');
        Schema::dropIfExists('interns');
        // Schema::dropIfExists('history_postulations');
        Schema::dropIfExists('document_postulations');
        Schema::dropIfExists('postulations');
        Schema::dropIfExists('type_document_postulations');
        Schema::dropIfExists('intership_show_students');

    }
};
