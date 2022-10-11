<?php

return [
    'role_structure' => [
        'superadministrator' => [
            'users' => 'c,r,u,d',
            'category' => 'c,r,u,d',
            'products' => 'c,r,u,d',
            'orders' => 'r,u',
            'messages' => 'r,u',
            'profile' => 'r,u'
        ],
        'user' => [
            'profile' => 'r,u',
            'orders' => 'r,u'
        ],
    ],
    'permission_structure' => [
        'cru_user' => [
            'profile' => 'c,r,u'
        ],
    ],
    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
