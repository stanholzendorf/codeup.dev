<?php

DEFINE('DB_PASS', 'parksuser');
DEFINE('DB_USER', 'parks_user');
DEFINE('DB_NAME', 'dbname=parks_db');
DEFINE('DB_HOST', 'mysql:host=127.0.0.1;');

require 'db_connect.php';

echo $dbc->getAttribute(PDO::ATTR_CONNECTION_STATUS) . "\n";

$deleteRecords = 'TRUNCATE national_parks';
$dbc->exec($deleteRecords);




$addContent = 'INSERT INTO national_parks (name, location, date_established, area_in_acres)
			   VALUES ("Acadia", "Maine", "1919-03-26", 47389),
			   		  ("American Samoa", "American Samoa", "1988-10-31", 9000),
			   		  ("Arches", "Utah", "1929-04-12", 76518.98),
			   		  ("Badlands", "South Dakota", "1978-11-10", 242755.94),
			   		  ("Big Bend", "Texas", "1944-06-12", 801163.21),
			   		  ("Biscayne", "Florida", "1980-06-28", 172934.07),
			   		  ("Black Canyon of the Gunnison", "Colorado", "1999-10-21", 32950.03),
			   		  ("Bryce Canyon", "Utah", "1928-02-25", 35835.08),
			   		  ("Canyonlands", "Utah", "1964-09-12", 337597.83 ),
			   		  ("Capitol Reef", "Utah", "1971-12-18", 241904.26 )';	






$dbc->exec($addContent);