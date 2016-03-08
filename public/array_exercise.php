<?php

$numbers = [1, 2, 3, 4, 5];
print_r ($numbers);

echo  "\n" . PHP_EOL;

echo $numbers[3] . "\n" . "\n";



$person1 = ['first' => 'Lisa', 'last' => 'Drummer', 'email' => 'someemail@email.com', 'phone' => '1234567'];
$person2 = ['first' => 'Wendy', 'last' => 'Guitar', 'email' => 'someemail@email.com', 'phone' => '1234567'];
$person3 = ['first' => 'Apollonia', 'last' => 'Harmony', 'email' => 'someemail@email.com', 'phone' => '1234567'];


$test1 = [$person1, $person2, $person3];

$test2 = ['person1' => $person1, 'person2' => $person2, 'person3' => $person3];

print_r ($test1);

echo  "\n" . PHP_EOL;

print_r ($test2);

$book1 = [

'title' => 'XYZ',
'author' => [
	'firstName' => 'Mike',
	'lastName' => 'Benoit',
	],
'pages' => '100',
'genre' => 'SciFi'	

];

