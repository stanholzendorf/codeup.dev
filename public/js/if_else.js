"use strict"; 
// ignore these lines for now
// just know that the variable 'color' will end up with a random value from the colors array
var colors = ['red', 'orange', 'yellow', 'green', 'blue', 'indigo', 'violet'];
var color = colors[Math.floor(Math.random()*colors.length)];

var favorite = 'green'; // TODO: change this to your favorite color from the list

// TODO: Create a block of if/else statements to check for every color except indigo and violet.


if (color == "red") {
	console.log("This is red like blood");

} else if (color == "orange") {
	console.log("This is orange like an orange");

} else if (color == "yellow") {
	console.log("This is yellow like the sun");

} else if (color == "green") {
	console.log("grass is " + color);

} else if (color == "blue") {
	console.log("This is blue like the ocean");
} else {
	console.log("Color not available");
}

console.log((favorite == color)? color + " is my favorite color!" : color + " is not my favorite color")


// TODO: When a color is encountered log a message that tells the color, and an object of that color.
//       Example: Blue is the color of the sky.

// TODO: Have a final else that will catch indigo and violet.
// TODO: In the else, log: I do not know anything by that color.

// TODO: Using the ternary operator, conditionally log a statement that
//       says whether the random color matches your favorite color.
