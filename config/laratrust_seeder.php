<?php

return [
    'role_structure' => [
        'super_admin' => [
            'users' => 'c,r,u,d',
            'awards'=>'c,r,u,d',
            'categories'=>'c,r,u,d',
            'products'=>'c,r,u,d',
            'clients'=>'c,r,u,d',
            'orders'=>'c,r,u,d',
            'profiles'=>'c,r,u,d',
            'settings'=>'c,r,u,d',
            'infos'=>'c,r,u,d',
            'locations'=>'c,r,u,d',
        ],
        'admin' => []
    ],
  


    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
