<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Robot extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'model_name',
        'nickname',
        'purpose',
        'height',
        'weight',
        'cost',
    ];

    public function creator(){return $this->belongsTo(User::class);}
    public function keyComponent(){return $this->belongsTo(KeyComponent::class);}

}
