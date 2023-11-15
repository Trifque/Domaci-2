<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeyComponent extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'component_name',
        'purpose',
        'size',
        'number_of_moving_parts',
        'manufacturer_id'
    ];

    public function manufacturer(){return $this->belongsTo(User::class);}
    public function isUsedFor(){return $this->hasMany(Robot::class);}

}
