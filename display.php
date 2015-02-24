<!DOCTYPE html>
<html lang="en">
<head>
	<title> Dr. Alfred </title>
	<meta charset="utf-8" />
	<meta name="viewport" content="initial scale=1, width=device-width, minimum-scale=1, maximum-scale=1" /> <!-- Tell the browser it's gonna be responsive (and allow no zoom) --> 

	<link rel="stylesheet" href="css/style.css" type="text/css" />
	<link rel="stylesheet" href="css/search.css" type="text/css" />	
	<link href='http://fonts.googleapis.com/css?family=Istok+Web:400,700,400italic,700italic&subset=latin,cyrillic-ext,latin-ext,cyrillic' rel='stylesheet' type='text/css'>
	
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
	<script type="text/javascript" src="js/frontend.js"></script>
	<?php include 'includes/db.php';
   		  include 'includes/methods.php';
		  include 'includes/querys.php';?>
	
	</head>

<body class="body">

<?php	
	
	$totalDocs = getTotalDocs();
	$arrayUnique = $_GET['arrayUnique'];
	$terms = $_GET['term'];
	
	$uniqueArray = explode(",", $arrayUnique); 
	$termsArray = explode(",", $terms);

	insertConsulta($uniqueArray, $termsArray);
	$query = $_GET['query'];
	$tf = getTF($query);
	$pp = getProductoPunto();
?>



<h1> 
<label for = "search_input" class = "logo">
            <span class = "blue">D</span><span class = "red">r</span><span class = "yellow">. </span><span class = "blue">A</span><span class = "red">l</span><span class = "yellow">f</span><span class = "blue">r</span><span class = "green">e</span><span class = "red">d</span></label>: <?php echo $query ?></h1>


<table>
	
		<?php
			
			while ($row = mysql_fetch_object($pp)) {
				echo('<tr>
				<td><a href="'  .$row->identifier. '" class="title">'  .$row->title. '</a><br>
					<p class="url">'  .$row->identifier. '</a><br>
					<p class="description">
				' .reduceString($row->description,$row->identifier). '</p></td></tr>'); //ReduceString makes the string no longer than 400 characters
			}
		?>	
			
</table>

</body>
</html>