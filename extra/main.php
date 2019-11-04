<?php
/***
	Console application for extra task
	Takes input of 2 numerical strings, calculates their sum, outputs it
***/

/*
	Get numerical string from input
*/
function getNumber(){
	$valid = false;
	while( !$valid ){
		echo("Enter number: ");
		$input = trim( fgets( STDIN ) );
		$valid = ( is_numeric( $input ) );
	}
	// Remove all zeroes from the beginning of the number, if present
	while( $input[0] == '0' && mb_strlen($input) > 0 ){
		$input = mb_substr( $input, 1 );
	}
	
	return $input;
}

/*
	Get sum of 2 numerical strings
	Since we only feed it valid strings, no need for extra validation
*/
function getSum( $num1, $num2 ){
	// Reverse incoming strings so that character order becomes digit order
	$num1 = strrev($num1);
	$num2 = strrev($num2);
	// Save string lengths to avoid casting functions every time
	$len1 = mb_strlen($num1);
	$len2 = mb_strlen($num2);
	$len = max( $len1, $len2 );
	$num = "";
	$n = 0;
	for( $i = 0; $i < $len; $i++ ){
		// Get sum of two numbers's digits of current rank, add it to sum
		if( $i < $len1 ){
			$n += $num1[$i];
		}
		if( $i < $len2 ){
			$n += $num2[$i];
		}
		$num .= ( $n % 10 );
		$n = floor( $n / 10 );
	}
	if( $n > 0 ){
		$num .= $n;
	}
	// Reverse the sum number for proper display
	return strrev($num);
}

/*
	Output calculation in formatted way
*/
function outputSum( $num1, $num2 ){
	$sum = getSum( $num1, $num2 );
	echo( PHP_EOL );
	echo( str_repeat( " ", mb_strlen($sum) - mb_strlen($num1) ).$num1." + ".PHP_EOL );
	echo( str_repeat( " ", mb_strlen($sum) - mb_strlen($num2) ).$num2." = ".PHP_EOL );
	echo( $sum.PHP_EOL.PHP_EOL );
}

$time = date("G");
if( $time < 6 ){
	$time = "nacht";
} elseif( $time < 12 ){
	$time = "morgen";
} elseif( $time < 18 ){
	$time = "tag";
} else {
	$time = "abend";
}
echo( "Guten ".$time."!".PHP_EOL );
echo( "Type two numbers and the program will calculate their sum.".PHP_EOL );
// Keep going as long as user doesn't object (or terminate application)
while( true ){
	outputSum( getNumber(), getNumber() );
	echo("Another round? ");
	$input = mb_strtolower( trim( fgets( STDIN ) ) );
	// If answer doesn't start with 'y' ("y", "yes", "yep", etc.) or '+', exit
	if( $input[0] != 'y' && $input[0] != '+' ){
		break;
	}
}
echo("Au revoir!");
?>