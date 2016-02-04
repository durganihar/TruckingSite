<?php

// This is the database connection configuration.
return array(
	'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
	// uncomment the following lines to use a MySQL database
	//'connectionString' => 'mysql:host=localhost;dbname=trucksite',
	'connectionString' => 'mysql://$OPENSHIFT_MYSQL_DB_HOST:$OPENSHIFT_MYSQL_DB_PORT/;dbname=trucktest',
	'emulatePrepare' => true,
	'username' => 'admin5lwZHga',
	'password' => 'upfRAW_tgjtX',
	'charset' => 'utf8',
	
);