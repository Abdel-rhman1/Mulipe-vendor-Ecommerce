<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rule_Ability extends Model
{
    use HasFactory;

    public $table = 'rule_abilities';
    protected $fillable= [
        'role_id' , 'ability' , 'type'
    ];
}
