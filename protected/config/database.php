<?php

// This is the database connection configuration.
return array(
	'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
	// uncomment the following lines to use a MySQL database
	
	'connectionString' => 'mysql:host=localhost;dbname=prozzl',
	'emulatePrepare' => true,
<<<<<<< HEAD
	'username' => 'prozzl',
	'password' => 'prozzl',
=======
<<<<<<< HEAD
	'username' => 'root',
	'password' => 'root',
=======
	'username' => 'prozzl',
	'password' => 'prozzl',
>>>>>>> 04cd8719128306e0ec271146f0a473c8595ca2d4
>>>>>>> fdea41417306bde217045606723e6c8cc4782312
	'charset' => 'utf8',
	
);