<?php

DEFINE('DB_PASS', 'parksuser');
DEFINE('DB_USER', 'parks_user');
DEFINE('DB_NAME', 'dbname=parks_db');
DEFINE('DB_HOST', 'mysql:host=127.0.0.1;');

require 'db_connect.php';

echo $dbc->getAttribute(PDO::ATTR_CONNECTION_STATUS) . "\n";

$deleteRecords = 'TRUNCATE national_parks';
$dbc->exec($deleteRecords);



$parks =array(
 array('name'=> 'Acadia', 'location'=>'Maine', 'date_established'=>'1919-03-26', 'area_in_acres'=>47289),
 array('name'=> 'American Samoa', 'location'=>'American Samoa', 'date_established'=>'1988-10-31', 'area_in_acres'=>9000),
 array('name'=> 'Arches', 'location'=>'Utah', 'date_established'=>'1929-04-12', 'area_in_acres'=>76518.98),
 array('name'=> 'Badlands', 'location'=>'South Dakota', 'date_established'=>'1978-11-10', 'area_in_acres'=>242755.94),
 array('name'=> 'Big Bend', 'location'=>'Texas', 'date_established'=>'1944-06-12', 'area_in_acres'=>801163.21),
 array('name'=> 'Biscayne', 'location'=>'Florida', 'date_established'=>'1980-06-28', 'area_in_acres'=>172934.07),
 array('name'=> 'Black Canyon of the Gunnison', 'location'=>'Colorado', 'date_established'=>'1999-10-21', 'area_in_acres'=>32950.03),
 array('name'=> 'Bryce Canyon', 'location'=>'Utah', 'date_established'=>'1928-02-25', 'area_in_acres'=>35835.08),
 array('name'=> 'Canyonlands', 'location'=>'Utah', 'date_established'=>'1964-09-12', 'area_in_acres'=>337597.83),
 array('name'=> 'Capitol Reef', 'location'=>'Utah', 'date_established'=>'1971-12-18', 'area_in_acres'=>241904.26)	

);
foreach ($parks as $park) {
	$query = "INSERT INTO national_parks (name, location, date_established, area_in_acres)
			VALUES ('{$park['name']}', '{$park['location']}', '{$park['date_established']}', {$park['area_in_acres']})";


	$dbc->exec($query);
	echo "Inserted ID: " . $dbc->lastInsertId() . PHP_EOL;
}