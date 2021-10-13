<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
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
            $table->string('applied_year');
            $table->string('major');
            $table->string('role_no');
            $table->string('name_mm');
            $table->string('name_en');
            $table->string('blood_type');
            $table->string('email');
            $table->string('permanent_phone');
            $table->text('permanent_address');
            $table->string('current_phone');
            $table->text('current_address');
            $table->string('dob');
            $table->string('student_birth_township');
            $table->string('student_birth_district');
            $table->string('student_birth_state');
            $table->string('student_nrc');
            $table->string('student_race');
            $table->string('student_religion');
            $table->string('student_gender');
            $table->string('father_name_mm');
            $table->string('father_name_en');
            $table->string('father_birth_township');
            $table->string('father_birth_district');
            $table->string('father_birth_state');
            $table->string('father_nrc');
            $table->string('father_race');
            $table->string('father_religion');
            $table->string('father_status');
            $table->string('father_is_guardian');
            $table->string('father_work');
            $table->string('father_email');
            $table->string('father_phone');
            $table->text('father_address');
            $table->string('mother_name_mm');
            $table->string('mother_name_en');
            $table->string('mother_birth_township');
            $table->string('mother_birth_district');
            $table->string('mother_birth_state');
            $table->string('mother_nrc');
            $table->string('mother_race');
            $table->string('mother_religion');
            $table->string('mother_status');
            $table->string('mother_is_guardian');
            $table->string('mother_work');
            $table->string('mother_email');
            $table->string('mother_phone');
            $table->text('mother_address');
            $table->string('other_guardian_name_mm');
            $table->string('other_guardian_name_en');
            $table->string('other_guardian_birth_township');
            $table->string('other_birth_district');
            $table->string('other_guardian_birth_state');
            $table->string('other_guardian_nrc');
            $table->string('other_guardian_race');
            $table->string('other_guardian_religion');
            $table->string('other_guardian_relation_to_user');
            $table->string('other_guardian_work');
            $table->string('other_guardian_email');
            $table->string('other_guardian_phone');
            $table->text('other_guardian_address');
            $table->string('high_school_roll_no');
            $table->string('high_school_examRecord_location');
            $table->string('high_school_pass_year');
            $table->string('high_school_total_mark');
            $table->string('high_school_distinctions');
            $table->string('scholar_name');
            $table->string('scholar_organization');
            $table->string('scholar_amount');
            $table->unsignedBigInteger('university_id');
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
}
