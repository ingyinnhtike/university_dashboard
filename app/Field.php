<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\University;

class Field extends Model
{
    protected $fillable = ['name_en', 'name_mm'];


    public function universities()
    {
        return $this->hasMany(University::class);
    }

}
