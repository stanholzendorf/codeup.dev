<?php

DEFINE('DB_PASS', 'parksuser');
DEFINE('DB_USER', 'parks_user');
DEFINE('DB_NAME', 'dbname=parks_db');
DEFINE('DB_HOST', 'mysql:host=127.0.0.1;');

require 'db_connect.php';

echo $dbc->getAttribute(PDO::ATTR_CONNECTION_STATUS) . "\n";

$droptable = 'DROP TABLE IF EXISTS national_parks';
$dbc->exec($droptable);

$createtable = 'CREATE TABLE national_parks(
				id INT UNSIGNED NOT NULL AUTO_INCREMENT,
				name VARCHAR(100) NOT NULL,
				location VARCHAR(150) NOT NULL,
				date_established DATE NOT NULL,
				area_in_acres FLOAT(8,2) UNSIGNED NOT NULL,
				PRIMARY KEY(id)
				)';
$dbc->exec($createtable);


		