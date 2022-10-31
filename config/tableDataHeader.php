<?php 
    return [
        'products'=>[
            "labels"=>[
            'id'=>'id',
            'name_ar'=>'name_ar',
            'name_en'=>'name_en' ,
            'category'=>'category', 
            'Unit'=>'unit',
            'qty'=>'qty',
            'price'=>'price'
            ],
            'values'=>[
                'id' , 'name_ar' , 'name_en' , 'category->name' , 'unit->name' , 'qty' , 'price'
            ]
        ],
        'category'=>[
            "labels"=>[
                'id'=>'id' , 
                'name'=>'name', 
                'Parent_Category_Name'=>'Parent_Category_Name'
            ],
            "values"=>[
                'id'=>'id' , 
                'name'=>'name', 
                'categoryParent->name'=>'categoryParent->name'
            ]
        ]
    ];  