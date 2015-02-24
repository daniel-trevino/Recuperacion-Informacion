<?php

//Obtain TF From Query
function getTotalDocs(){
	$query = "SELECT COUNT(*) AS 'totalDocs' FROM Docs;"; 
	
	$result = mysql_query($query) or die('Query failed: ' . mysql_error());
	return $result;
}


//Obtain TF From Query
function getTF($query){
	$query = "SELECT d.idDocs, i.tf AS 'tfNumber' 
			FROM Docs d, IndiceInv i 
			WHERE i.term = '".$query."' and d.idDocs = i.idDocs
			ORDER BY i.tf DESC;"; 
	
	$result = mysql_query($query) or die('Query failed: ' . mysql_error());
	return $result;
}

//Insert into Consulta
function insertConsulta($term, $tf){
	deleteTable('Consulta');
	for($i=0; $i<count($term); $i++){
		$query = "INSERT INTO Consulta (term,tf) VALUES ('".$term[$i]."', ".$tf[$i].");";
		$result = mysql_query($query) or die('Query failed: ' . mysql_error());
	}
}


function getProductoPunto(){
	$query = "SELECT d.idDocs, d.identifier, d.title, d.description,  SUM(q.tf * t.idf * i.tf * t.idf) AS 'weight'
				FROM Consulta q, temp t, IndiceInv i
				LEFT JOIN Docs d
				ON d.idDocs = i.idDocs
				WHERE q.term = t.term
				AND i.term = t.term
				GROUP BY i.idDocs
				ORDER BY weight DESC;"; 
			
	$result = mysql_query($query) or die('Query failed: ' . mysql_error());
	return $result;
	
}

function insertPesoQ(){
	deleteTable('peso_q');
	$query = "INSERT INTO peso_q
			SELECT SQRT(sum(q.tf * t.idf * q.tf * t.idf )) 
			FROM Consulta q, temp t
			WHERE q.term = t.term"; 
			
	$result = mysql_query($query) or die('Query failed: ' . mysql_error());
	
}

function getCosenoAngulo(){
	$query = "SELECT d.idDocs, d.idOrig, d.title, d.text, sum(q.tf * t.idf * i.tf * t.idf) / (dw.peso * qw.peso) AS 'weight'
				FROM Consulta q, temp t, pesos_docs dw, peso_q qw, IndiceInv i
				LEFT JOIN Docs d
				ON d.idDocs = i.idDocs
				WHERE q.term = t.term 
				AND i.term = t.term 
				AND i.idDocs = dw.idDocs
				GROUP BY i.idDocs, dw.peso, qw.peso 
				ORDER BY weight DESC;"; 
			
	$result = mysql_query($query) or die('Query failed: ' . mysql_error());
	return $result;
}

function getPPAP(){
	$query = "SELECT i.idDocs, (log(q.tf+1)*t.idf)/sum((log(i.tf+1)*t.idf)) as 'weight'
			FROM Consulta q, IndiceInv i, temp t
			WHERE q.term = t.term
			AND i.term = t.term
			GROUP BY i.idDocs
			ORDER BY 2 DESC;"; 
			
	$result = mysql_query($query) or die('Query failed: ' . mysql_error());
	return $result;
}

function deleteTable($table){
	$query = "DELETE FROM ".$table.";"; 
	
	$result = mysql_query($query) or die('Query failed: ' . mysql_error());
	return $result;
}

/*function getRelevantTerms($idDocs){

	$query = "SELECT i.term
	FROM IndiceInv i, Docs d, Terms t
	where i.idDocs = d.idDocs
	and t.term = i.term
	and t.idf > 5
	and t.term = 'sorts'
	and d.idDocs = ".$idDocs.";";

	$result = mysql_query($query) or die('Query failed: ' . mysql_error());
	return $result;
}*/

?>
