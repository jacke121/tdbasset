<?php

return [
'multi-auth' => [
    'member' => [
        'driver' => 'eloquent',
        'model'  => App\Model\Member::class,
        'email' => 'emails.users.password'
    ],
    'user' => [
        'driver' => 'eloquent',
        'model'  => App\Model\User::class,
        'email' => 'emails.users.password'
    ]
]
];
