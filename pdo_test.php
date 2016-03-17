<?php

DEFINE('DB_PASS', 'vagrant');
DEFINE('DB_USER', 'vagrant');
DEFINE('DB_NAME', 'dbname=employees');
DEFINE('DB_HOST', 'mysql:host=127.0.0.1;');

require 'db_connect.php';

echo $dbc->getAttribute(PDO::ATTR_CONNECTION_STATUS) . "\n";

$sql =  'CREATE TABLE teams(
		team_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
		name VARCHAR(1000) NOT NULL,
		PRIMARY KEY(team_id)
		)';


$dbc->exec($sql);
echo "team table was created\n";