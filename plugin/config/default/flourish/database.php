<?php

	return Affinity\Config::create([
		'connections' => [
			'default' => [
				'driver'   => NULL, // mssql, mysql, postgresql
				'database' => $app->getEnvironment('DB_NAME', NULL),
				'username' => $app->getEnvironment('DB_USER', NULL),
				'password' => $app->getEnvironment('DB_PASS', NULL),
				'host'     => $app->getEnvironment('DB_HOST', 'localhost')
			]
		]
	]);
