<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_Ability extends Model
{
    use HasFactory;

    protected $table = 'rule_abilities';
    protected $fillable = [
        'id' , 'user_id' , 'role_id'
    ];


}
