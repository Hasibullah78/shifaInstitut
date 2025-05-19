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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('std_name');
            $table->string('std_e_name');
            $table->string('std_f_name');
            $table->string('std_f_e_name');
            $table->string('std_g_f_name');
            $table->string('o_province');
            $table->string('o_district');
            $table->string('o_vallage');
            $table->string('c_province');
            $table->string('c_district');
            $table->string('c_vallage');
            $table->char('nic');
            $table->string('school');
            $table->char('phone');
            $table->string('g_date');
            $table->string('r_date');
            $table->date('dob');
            $table->string('gender');
            $table->string('m_state');
            $table->integer('reg_fees');
            $table->string('image');
            $table->string('email');
            $table->string('serial_number');
            $table->string('exam_id');
            $table->date('exam_date');
            $table->string('semester');
            $table->string('blood_group');
            $table->string('passing_state');
            $table->integer('marks')->nullable(true);
            $table->foreignId('department_id')->constrained('departments');
            $table->foreignId('session_id')->constrained('sessions');


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
        Schema::dropIfExists('students');
    }
};
