<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    protected $fillable = ['name_en', 'name_mm'];

    public function universities()
    {
        return $this->hasMany(University::class);
    }

    public function student()
    {
        return $this->belongsToMany(Student::class);
    }
}
