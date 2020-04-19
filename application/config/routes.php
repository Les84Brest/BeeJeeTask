<?php

/*routes */
return [
	'' => [
		'controller' => 'main',
		'action' => 'index'
	],

	'sort/author' => [
		'controller' => 'main',
		'action' => 'sortauthor'
	],

	'sort/authordesc' => [
		'controller' => 'main',
		'action' => 'sortauthordesc'
	],

	'sort/email' => [
		'controller' => 'main',
		'action' => 'sortemail'
	],

	'sort/emaildesc' => [
		'controller' => 'main',
		'action' => 'sortemaildesc'
	],

	'sort/done' => [
		'controller' => 'main',
		'action' => 'sortdone'
	],

	'sort/donedesc' => [
		'controller' => 'main',
		'action' => 'sortdonedesc'
	],

	'task/list' => [
		'controller' => 'task',
		'action' => 'list'
	],
	'task/add' => [
		'controller' => 'task',
		'action' => 'add'
	],
	'task/addingtask' => [
		'controller' => 'task',
		'action' => 'addingtask'
	],

	'task/edit' => [
		'controller' => 'task',
		'action' => 'edit'
	],

	'task/editingtask' => [
		'controller' => 'task',
		'action' => 'editingtask'
	],

	'task/delete' => [
		'controller' => 'task',
		'action' => 'delete'
	],

	'account/login' => [
		'controller' => 'account',
		'action' => 'login'
	],

	'account/checkuser' => [
		'controller' => 'account',
		'action' => 'checkuser'
	],
	'account/logout' => [
		'controller' => 'account',
		'action' => 'logout'
	]


] ;