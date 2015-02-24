<?php

function reduceString($value,$link){
	$string = strip_tags($value);
	
	if (strlen($string) > 400) {			
	    // truncate string
	    $stringCut = substr($string, 0, 400);
	
	    // make sure it ends in a word so assassinate doesn't become ass...
	    $string = substr($stringCut, 0, strrpos($stringCut, ' ')).'... <a href="'.$link.'">Read More</a>'; 
	}
	else{
		$string = $value;
	}
	return $string;
}
?>
