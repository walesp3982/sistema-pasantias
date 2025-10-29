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
        // Tabla que sirve para que los usuario de dirección de carreras puede
        // mostrar solo ciertas pasantía a los estudiantes
        Schema::create('interships_students', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained();
            $table->foreignId('intership_id')->constrained();
            $table->timestamps();
            $table->unique(["student_id", "intership_id"]);
        });

        $status_postulation = ['send', 'verified', 'redo', 'reject', 'accept'];

        Schema::create('postulations', function (Blueprint $table)
        use ($status_postulation) {
            $table->id();
            $table->foreignId('student_id')->constrained();
            $table->foreignId('intership_id')->constrained();
            $table->enum('status', $status_postulation);
            $table->timestamps();
        });

        Schema::create('history_postulations', function (Blueprint $table)
        use ($status_postulation) {
            $table->id();
            $table->foreignId("postulation_id")->constrained();
            $table->enum('last_status', $status_postulation);
            $table->enum('new_status', $status_postulation);
            $table->foreignId('user_id')->constrained();
            $table->timestamp('time_modify');
        });

        Schema::create('interns', function(Blueprint $table) {
            $table->id();
            $table->foreignId('postulation_id')->constrained();
            $table->enum('status', ['wait', 'active', 'finished', 'abandoned']);
        });

        Schema::create('type_reports', function(Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->boolean('generated');
            $table->enum('class', ['good', 'bad']);
        });

        Schema::create('reports', function(Blueprint $table) {
            $table->id();
            $table->string("descripcion");
            $table->string("autor");
            $table->foreignId('type_report_id')->constrained();
            $table->date('date_create');
            $table->foreignId('intern_id')->constrained();
            $table->foreignId('document_id')->constrained();
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
        Schema::dropIfExists('history_postulations');
        Schema::dropIfExists('postulations');
        Schema::dropIfExists('interships_students');

    }
};
