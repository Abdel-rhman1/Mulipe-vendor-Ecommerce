<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Rule_Ability;
class Rule extends Model
{
    use HasFactory;

    protected $table = 'rules';
    protected $fillable = [
        'name' , 'stor_id'
    ];


    public function abilities(){
        return  $this->hasMany(Rule_Ability::class , 'role_id' , 'id');
    }
}
