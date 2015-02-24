<!DOCTYPE html>
<html lang="en">
<head>
	<title> Daniel Treviño / Eloisa Rojas</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="initial scale=1, width=device-width, minimum-scale=1, maximum-scale=1" /> <!-- Tell the browser it's gonna be responsive (and allow no zoom) --> 

	<link rel="stylesheet" href="css/style.css" type="text/css" />
	<link rel="stylesheet" href="css/search.css" type="text/css" />
	<link href='http://fonts.googleapis.com/css?family=Istok+Web:400,700,400italic,700italic&subset=latin,cyrillic-ext,latin-ext,cyrillic' rel='stylesheet' type='text/css'>
	
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
	<script src="http://malsup.github.com/jquery.form.js"></script> 
	<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="js/frontend.js"></script>
	<script type="text/javascript" src="js/initial.js"></script>
	<script type="text/javascript" src="js/require.js"></script>
	<?php include 'includes/db.php';?>
</head>

<body class="body">


	<form id="myForm" action="display.php" method="post">
		<fieldset>
          <legend>Search Google Now</legend>
          <label for = "search_input" class = "logo">
            <span class = "blue">D</span><span class = "red">r</span><span class = "yellow">. </span><span class = "blue">A</span><span class = "red">l</span><span class = "yellow">f</span><span class = "blue">r</span><span class = "green">e</span><span class = "red">d</span></label>
					<input type = "search" name = "search_input" id = "q" name="q" placeholder = "What are you looking for?" required x-webkit-speech results = "10" autosave = "search_input" title = "Search Google" role = "search" autofocus autocomplete = "true" tab-index = "1"/>
					</fieldset>
        <footer>
          <button type="submit" id="search" onclick="generate();" name="search_google" title="View search results" aria-label = "Google Search">Dr. Alfred Search</button>
          <button title = "Generate random search" aria-label = "I'm Feeling Lucky">I'm Feeling Lucky</button>
        </footer>
	</form>
</div> <!--End Wrapper-->

</body>
</html>