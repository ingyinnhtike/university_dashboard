<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Township extends Model
{
    protected $fillable = [
        'district_id',
        'name',
        'name_eng'
    ];

    
    public function district()
    {
        return $this->belongsTo(District::class);
    }

   
}
