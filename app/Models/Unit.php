<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    protected $fillable = [
        'id' , 'name' , 'parent_unit_id' , 'equality' , 'stor_id'
    ];


    public function parentUnit(){
        return $this->hasOne(Unit::class , 'id' , 'parent_unit_id');
    }
}
