<?php 
    return [
        "Products"=>[
            'name'=>'Products',
            'role'=>'products.view',
            'icon'=>'',
            'route'=>'products.index',
        ],
        "categories"=>[
            'name'=>'Categories',
            'role'=>'categories.view',
            'icon'=>'',
            'route'=>'category.index',
        ],
        "Orders"=>[
            'name'=>'Orders',
            'role'=>'orders.view',
            'icon'=>'',
            'route'=>'category.index',
        ],
        "units"=>[
            'name'=>'Units',
            'role'=>'units.view',
            'icon'=>'',
            'route'=>'unit.index',
        ],
        "Roles"=>[
            'name'=>'roles',
            'role'=>'roles.view',
            'icon'=>'',
            'route'=>'role.index',
            'route'=>'role.index',
        ],

        'currencies'=>[
            'name'=>'currencies',
            'role'=>'role.index',
            'route'=>'currency.index',

        ],

        'customers'=>[
            'name'=>'Customers',
            'role'=>'cutomer.index',
            'route'=>'role.index'
        ]
    ]

?>