<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\District;
use App\Township;

class State extends Model
{
    protected $fillable = [
        'name',
        'name_eng'
    ];

    public function districts()
    {
        return $this->hasMany(District::class);
    }

    public function townships()
    {
        return $this->hasManyThrough(
            Township::class,
            District::class
        );
    }
}
