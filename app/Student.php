<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
                        'applied_year', 'major', 'role_no', 
                        'name_mm', 'name_en', 'blood_type', 'email', 
                        'permanent_phone', 'permanent_address', 'current_phone', 'current_address',
                        'dob', 'student_birth_township', 'student_birth_district', 'student_birth_state', 
                        'student_nrc', 'student_race', 'student_religion', 'student_gender',
                        'father_name_mm', 'father_name_en', 'father_birth_township', 'father_birth_district',
                        'father_birth_state', 'father_nrc', 'father_race', 'father_religion', 'father_status',
                        'father_is_guardian', 'father_work', 'father_email', 'father_phone', 'father_address',
                        'mother_name_mm', 'mother_name_en', 'mother_birth_township', 'mother_birth_district',
                        'mother_birth_state', 'mother_nrc', 'mother_race', 'mother_religion', 'mother_status',
                        'mother_is_guardian', 'mother_work', 'mother_email', 'mother_phone', 'mother_address',
                        'other_guardian_name_mm', 'other_guardian_name_en', 'other_guardian_birth_township',
                        'other_birth_district', 'other_guardian_birth_state', 'other_guardian_nrc', 'other_guardian_race',
                        'other_guardian_religion', 'other_guardian_relation_to_user', 'other_guardian_work', 
                        'other_guardian_email', 'other_guardian_phone', 'other_guardian_address', 'high_school_roll_no',
                        'high_school_examRecord_location', 'high_school_pass_year', 'high_school_total_mark', 
                        'high_school_distinctions', 'scholar_name', 'scholar_organization', 'scholar_amount',
                        'university_id'

                        ];


    public function major()
    {
        return $this->belongsToMany(Major::class);
    }

    public function field()
    {
        return $this->belongsTo(Field::class);
    }

    // public function setGenderCountAttribute($value)
    // {
    //     $this->attributes['gender_count'] = strtolower($value);
    // }
}
