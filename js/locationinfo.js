var errorText = "";
function geocode(input1, input2){
	console.log(input1);
	console.log(input2);
	$.ajax({
		type: "POST",
		url: "script/locationinfo-load.php",
		data: {
			phplat: input1,
			phplon: input2
		},
		success: function(response){  // success
			var data = $.parseJSON(response);
			console.log(data);/*
			$('#resultJson').append("Continent: " + response.results[0].components.continent + "<br>");
			$('#resultJson').append("Country: " + response.results[0].components.country + "<br>");
			$('#resultJson').append("State: " + response.results[0].components.state + "<br>");
			$('#resultJson').append("Currency: " + response.results[0].annotations.currency.name + "<br>");
			$('#resultJson').append("Symbol: " + response.results[0].annotations.currency.symbol + "<br>");          	

			//response.results[1].confidence*/
		},
		error: function(){
			errorText = "Error occured, please reload page or contact systems administrator";
			document.getElementById("info").innerHTML = errorText;
		}
	});
}

$(document).ready(function(){
	geocode(lat, long);
});