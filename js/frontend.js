function generate() {
	//Obtain te values of the documents and the Search info
	var q = document.getElementById('q').value;
	var array = splitArray(q);
	var arrayUnique = splitArray(q);
	arrayUnique = uniqBy(arrayUnique, JSON.stringify);
	var term = getFrecuencia(array, arrayUnique);
	
	$("#myForm").submit(function(event) {
	  
		event.preventDefault();
	   
		$("#result").html('');
	   
		var values = $(this).serialize();
	   
		$.ajax({
			url: "display.php",
			type: "post",
			data: values,
			success: function(){
				//alert("success");
				$("#field").html('Submitted successfully');
			},
			error:function(){
				//alert("failure");
				$("#field").html('There is error while submit');
			}
		});
	});
	window.location.href = "display.php?query=" + q +"&arrayUnique=" + arrayUnique +"&term=" + term;

}


function splitArray(string){
	var res = string.split(" ");
	return res;
}

function uniqBy(a, key) {
    var seen = {};
    return a.filter(function(item) {
        var k = key(item);
        return seen.hasOwnProperty(k) ? false : (seen[k] = true);
    })
}

function getFrecuencia(array, arrayUnique){
	term = [];
	for (x=0; x < arrayUnique.length; x++){
		term[x] = 0;
	}	
	
	for (i=0; i < arrayUnique.length; i++){
		for (j=0; j < array.length; j++){
			if (arrayUnique[i] == array[j]){
				if (term[i] != 0){
					term[i] = parseInt(term[i]) + 1;
				}
				else{
					term[i] = 1;
				}
			}
		}
	}
	return term;
}

