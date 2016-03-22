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
 array('name'=> 'Acadia', 'location'=>'Maine', 'date_established'=>'1919-03-26', 'area_in_acres'=>47289, 'description'=> 'Covering most of Mount Desert Island and other coastal islands, Acadia features the tallest mountain on the Atlantic coast of the United States, granite peaks, ocean shoreline, woodlands, and lakes. There are freshwater, estuary, forest, and intertidal habitats'),
 
 array('name'=> 'American Samoa', 'location'=>'American Samoa', 'date_established'=>'1988-10-31', 'area_in_acres'=>9000, 'description'=> 'The southernmost national park is on three Samoan islands and protects coral reefs, rainforests, volcanic mountains, and white beaches. The area is also home to flying foxes, brown boobies, sea turtles, and 900 species of fish.'),
 
 array('name'=> 'Arches', 'location'=>'Utah', 'date_established'=>'1929-04-12', 'area_in_acres'=>76518.98, 'description'=> 'This site features more than 2,000 natural sandstone arches, including the famous Delicate Arch. In a desert climate, millions of years of erosion have led to these structures, and the arid ground has life-sustaining soil crust and potholes, which serve as natural water-collecting basins. Other geologic formations are stone columns, spires, fins, and towers.'),
 
 array('name'=> 'Badlands', 'location'=>'South Dakota', 'date_established'=>'1978-11-10', 'area_in_acres'=>242755.94, 'description'=> "The Badlands are a collection of buttes, pinnacles, spires, and grass prairies. It has the world's richest fossil beds from the Oligocene epoch, and the wildlife includes bison, bighorn sheep, black-footed ferrets, and swift foxes"),
 
 array('name'=> 'Big Bend', 'location'=>'Texas', 'date_established'=>'1944-06-12', 'area_in_acres'=>801163.21, 'description'=> 'Named for the prominent bend in the Rio Grande along the US–Mexico border, this park encompasses a large and remote part of the Chihuahuan Desert. Its main attraction is backcountry recreation in the arid Chisos Mountains and in canyons along the river. A wide variety of Cretaceous and Tertiary fossils as well as cultural artifacts of Native Americans also exist within its borders'),
 
 array('name'=> 'Biscayne', 'location'=>'Florida', 'date_established'=>'1980-06-28', 'area_in_acres'=>172934.07, 'description'=> 'Located in Biscayne Bay, this park at the north end of the Florida Keys has four interrelated marine ecosystems: mangrove forest, the Bay, the Keys, and coral reefs. Threatened animals include the West Indian manatee, American crocodile, various sea turtles, and peregrine falcon'),
 
 array('name'=> 'Black Canyon of the Gunnison', 'location'=>'Colorado', 'date_established'=>'1999-10-21', 'area_in_acres'=>32950.03, 'description'=> 'The park protects a quarter of the Gunnison River, which slices sheer canyon walls from dark Precambrian-era rock. The canyon features incredibly steep descents, and is a popular site for river rafting and rock climbing. The deep, narrow canyon, made of gneiss and schist, is often in shadow and therefore appears black'),
 
 array('name'=> 'Bryce Canyon', 'location'=>'Utah', 'date_established'=>'1928-02-25', 'area_in_acres'=>35835.08, 'description'=> 'Bryce Canyon is a giant geological amphitheater on the Paunsaugunt Plateau. The unique area has hundreds of tall sandstone hoodoos formed by erosion. The region was originally settled by Native Americans and later by Mormon pioneers'),
 
 array('name'=> 'Canyonlands', 'location'=>'Utah', 'date_established'=>'1964-09-12', 'area_in_acres'=>337597.83, 'description'=> 'This landscape was eroded into a maze of canyons, buttes, and mesas by the combined efforts of the Colorado River, Green River, and their tributaries, which divide the park into three districts. There are rock pinnacles and other naturally sculpted rock formations, as well as artifacts from Ancient Pueblo peoples.'),
 
 array('name'=> 'Capitol Reef', 'location'=>'Utah', 'date_established'=>'1971-12-18', 'area_in_acres'=>241904.26, 'description'=> "The park's Waterpocket Fold is a 100-mile (160 km) monocline that exhibits the earth''s diverse geologic layers. Other natural features are monoliths, sandstone domes, and cliffs shaped like the United States Capitol.")	

);

foreach ($parks as $park) {
	$query = "INSERT INTO national_parks (name, location, date_established, area_in_acres, description) VALUES (:name, :location, :date_established, :area_in_acres, :description)";
	
	// VALUES ('{$park['name']}', '{$park['location']}', '{$park['date_established']}', {$park['area_in_acres']})";
	
	$stmt = $dbc->prepare($query);
	$stmt->bindValue(':name', $park['name'], PDO::PARAM_STR);
	$stmt->bindValue(':location', $park['location'], PDO::PARAM_STR);
	$stmt->bindValue(':date_established', $park['date_established'], PDO::PARAM_STR);
	$stmt->bindValue(':area_in_acres', $park['area_in_acres'], PDO::PARAM_STR);
	$stmt->bindValue(':description', $park['description'], PDO::PARAM_STR);



	$stmt->execute();
	echo "Inserted ID: " . $dbc->lastInsertId() . PHP_EOL;
}