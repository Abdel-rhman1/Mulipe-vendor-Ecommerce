<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name' , 'parent_category_id' , 'stor_id'
    ];

    public function categoryParent(){
        return $this->hasOne(Category::class , 'id' , 'parent_category_id');
    }
}
