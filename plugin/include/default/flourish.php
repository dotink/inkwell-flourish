<?php

	return Affinity\Action::create(['core'], function($app, $broker) {

		$connections = $app['engine']->fetch('flourish/database', 'connections', array());

		foreach($connections as $name => $data) {
			if (!$data['driver']) {
				continue;
			}

			$database = new fDatabase(
				$data['driver'],
				$data['database'],
				$data['username'],
				$data['password'],
				$data['host']
			);

			fORMDatabase::attach($database, $name);
		}
	});
