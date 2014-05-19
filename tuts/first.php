<!DOCTYPE html>
<html>
<body>

<?php
echo "My first PHP script!";
?>

<br>

Basic PHP Syntax - A PHP script can be placed anywhere in the document. <br>

A PHP script starts with 

The default file extension for PHP file is ".php"
<br>
PHP = HTML tags + PHP CODE

<h2>PHP Variables</h2>
<ul>
	<li>A Variable starts with $</li>
	<li>A Variable must start with letter or underscore</li>
	<li>Variable Name is case sensitive</li>
	</ul>
<?php
$name = "Aayush Tuladhar";

$x=5;
$y=6;

echo $x+$y;
echo "<br>";
echo "My name is : $name";
echo $name;
echo "<br>";
echo "Hello World ", "I am $name";

// print "print command does not take", "multiple constructs";
?>

<h2>Data Types</h2>
<ul>

	<li>PHP String - A string is a sequence of characters, like "Hello World"</li>
	<li>PHP Integers</li>
	<li>PHP Floating Point Numbers</li>
	<li>PHP Boolean</li>
	<li>PHP Arrays</li>
	<li>PHP Objects</li>
	<li>PHP Null Values</li>	
</ul>

<?php
$x="Hello world";
$y="world";
/*
strlen() function
The strpos() function is used to search for a specified character or text within a string.
If a match is found, it will return the character position of the first match. If no match is found, it will return FALSE.
*/

/*
strpos() function
The strpos() function is used to search for a specified character or text within a string.
*/

$_xlen = strlen($x);
$_xstrpos_o = strpos($x,$y);

echo "Length of '$x' : $_xlen";
echo "<br>";
echo "Position of '$y' : $_xstrpos_o";

?>

<h2>PHP Operators</h2>
<h3>Arithmetic Operators</h3>
<ul>
	<li>Addition (+)</li>
	<li>Substraction (-)</li>
	<li>Multiplication (*)</li>
	<li>Division (/)</li>
	<li>Modules (%)<li>
</ul>
<h2> PHP Conditional Statements</h2>
<pre>
if (condition) {
	statement 1
} else {
	statement 2
}

</pre>
<?php
$t = 0;
echo "t : $t";
if ( $t > 0 ) {
	echo "<p>t is greater than 0</p>";
} else {
	echo "<p>t is smaller than 0</p>";
}
?>

<h2>Switch Statement</h2>
<pre>
switch (n) {
  case label1:
    code to be executed if n=label1;
    break;
  case label2:
    code to be executed if n=label2;
    break;
  case label3:
    code to be executed if n=label3;
    break;
  ...
  default:
    code to be executed if n is different from all labels;
} 
</pre>
<?php
$num = 1;

switch ($num) {
	case 1:
	echo "Congratulations!! You got 1 Million Dollars";
	break;

	case 2:
	echo "Congratulations!! You got 2 Million Dollars";
	break;

	default:
	echo "Sorry!! You haven't been selected for lukcy draw";
}
?>

<h3>PHP Loops</h3>
<ul>
	<li><b>while Loop</b> - Loops through a block of code as long as the specified condition is true
	<pre>
	foreach ($array as $value) {
  		code to be executed;
  	}
	</pre>
	<?php
	$x=1;

	while ($x < 10) {
		echo "Looper : $x<br>";
		$x++;
	}

	?>
	</li>
	<li><b>do..while</b> - Loops through a block of code once, and then repeasts the loop as the specified condition is true
	<pre>
	do {

	} while (condition)
	</pre>
	<?php
	$name = "Aayush";
	$i = 0;
	do {
		echo ( "$name[$i] <br>");
		$i++;
	}
	while ($i < strlen($name) );

	?>

	</li>
	<li><b>for</b> - loops through a block od code a specified number of times<br>
	<?php	
	for ($i=0; $i<10; $i++) {
		print "$i";
	}
	?>
	</li>
	<li><b>foreach</b> - loops through a block of code for each element in an array
	<pre>
	foreach ($array as $value) {
  		code to be executed;
  	}
	</pre>
	<?php
	$names = ["Aayush", "Bree", "Sanskriti", "Baadal"];
	$count_names = count($names);
	foreach ($names as $_name) {
		print "$_name is awesome !! <br>";
	}

	echo "There are $count_names awesome people in this world";
	?>
	</li>
</ul>
<h2>Functions</h2>
A function is a block of statements that can be used repeatedly in a program. A function will not execute immediately when a page loads. A function will be executed by a call to the function.

<pre>
function functionname(args) {
	
}
</pre>
<?php sayMyName("Aayush"); ?>
<h2>Arrays</h2>
An array is a special variable, which can hold more than one value at a time.

<br>
In PHP, there are three types of arrays:
<br>
<ul>
<li>Indexed arrays - Arrays with numeric index</li>
<li>Associative arrays - Arrays with named keys</li>
<li>Multidimensional arrays - Arrays containing one or more arrays</li>
</ul>
<h4>Getting Length of an Array</h4>
<h4>Loop Through an Indexed Array</h4>
<h4>PHP Associative Arrays</h4>
Associative arrays are arrays that use named keys that you assign to them.




</body>
<?php

/*
functionn functionName(Arguments){
	....
}
*/

function sayMyName($name) {
	echo "Say My Name..", "Say My Name..", "$name....", "You are god damn right";
}
?>
</html>