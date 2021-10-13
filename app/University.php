<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    protected $fillable = ['name_en', 'name_mm', 'phone', 'email', 'image', 'website'];

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public function fields()
    {
        return $this->belongsTo(Field::class);
    }
}
