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
			console.log(data);
			if(data.results[0].components.hasOwnProperty('country')){
				$('#resultJson').append("Continent: " + data.results[0].components.continent + "<br>");
				$('#resultJson').append("Country: " + data.results[0].components.country + "<br>");
				$('#resultJson').append("State: " + data.results[0].components.state + "<br>");
				$('#resultJson').append("Postcode: " + data.results[0].components.postcode + "<br>");
				$('#resultJson').append("Timezone: " + data.results[0].annotations.timezone.name + " (" + data.results[0].annotations.timezone.short_name + ")" + "<br><br>");
				$('#resultJson').append("Currency: " + data.results[0].annotations.currency.name + "<br>");
				$('#resultJson').append("Symbol: " + data.results[0].annotations.currency.symbol + "<br>");     
			}
			else{
				$('#resultJson').append("Region is not in a country. " + "<br>");
			}


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