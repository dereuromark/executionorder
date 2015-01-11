<?php
$config = [
	'debug' => false,

	'Security' => [
		'salt' => '0ebcb009bb3f8ebe43a4addc3fc1c1f310c50520',
	],

	'Datasources' => [
		'default' => [
			'host' => 'localhost',
			'username' => 'root',
			'password' => '',
			'database' => '', // Set in app_local.php
			'quoteIdentifiers' => true,
		],

		/**
		 * The test connection is used during the test suite.
		 */
		'test' => [
			'host' => 'localhost',
			'username' => 'root',
			'password' => '',
			'database' => '', // Set in app_local.php
			'quoteIdentifiers' => true,
		],
	],

	'FormConfig' => array(
		'novalidate' => true,
		'templates' => array(
			'dateWidget' => '{{day}}{{month}}{{year}}{{hour}}{{minute}}{{second}}{{meridian}}',
		)
	)

];
