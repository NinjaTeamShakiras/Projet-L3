<?php

// This is the database connection configuration.
return array(
	'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
	// uncomment the following lines to use a MySQL database
	
	'connectionString' => 'mysql:host=localhost;dbname=prozzl',
	'emulatePrepare' => true,
<<<<<<< HEAD
	'username' => 'root',
	'password' => 'root',
=======
	'username' => 'prozzl',
	'password' => 'prozzl',
>>>>>>> 04cd8719128306e0ec271146f0a473c8595ca2d4
	'charset' => 'utf8',
	
);