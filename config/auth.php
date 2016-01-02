<?php

return [
'multi-auth' => [
    'member' => [
        'driver' => 'eloquent',
        'model'  => 'App\Model\Member'
    ],
    'user' => [
        'driver' => 'eloquent',
        'model'  => 'App\Model\User'
    ]
]
];
