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
        Schema::create('fichiers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_student');
            $table->string('titre');
            $table->text('description');
            $table->string('metier');
            $table->string('pdf');
            $table->Foreign('id_student')->references('id')->on('Students');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fichiers');
    }
};
