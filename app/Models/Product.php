<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Unit;
use Illuminate\Support\Facades\File;
use App\Models\ProductImage;
use App\Models\Category;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'id' , 'name_ar' , 'slug' , 'category_id' , 'unit_id' , 'qty' , 'name_en',
        'price' , 'stor_id'
    ];


    public function category(){
        return $this->hasOne(Category::class , 'id' , 'category_id');
    }

    public function unit(){
        return $this->hasOne(Unit::class , 'id' , 'unit_id');
    }

    public function ProductImages(){
        return $this->belongsToMany(ProductImage::class , 'id' , 'product_id');
    }
    public function uploadImages($request , $productId){
        foreach($request->file('files') as $file){
           
            $fileName = time().'.'.$file->getClientOriginalName() . '';
            $file->move(public_path('images/products') , $fileName);

            ProductImage::create([
                'product_id'=>$productId,
                'status_id'=>1
            ]);
        }
    }
}
