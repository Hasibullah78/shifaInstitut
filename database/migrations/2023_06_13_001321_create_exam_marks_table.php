<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_marks', function (Blueprint $table) {
            $table->id();
            $table->integer('mideterm_exam_marks')->nullable();
            $table->integer('final_exam_marks')->nullable();
            $table->integer('attendence_marks')->nullable();
            $table->integer('class_talent_marks')->nullable();
            $table->integer('totale_marks')->nullable();
            $table->string('passing_state')->nullable();
            $table->string('semester')->nullable();
            $table->foreignId('student_id')->constrained('students');
            $table->foreignId('subject_id')->constrained('subjects');
            $table->foreignId('exam_chance_id')->constrained('exam_chances')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exam_marks');
    }
};
