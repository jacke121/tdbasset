<?php

return [

	'driver' => 'eloquent',
	'model' => 'App\Model\Member',
	'table' => 'members',
	'password' => [
		'name' => 'name.password',
		'table' => 'password_resets',
		'expire' => 60,
	],

];
