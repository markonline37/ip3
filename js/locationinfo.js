function geocode(query){
      $.ajax({
        url: 'https://api.opencagedata.com/geocode/v1/json',
        method: 'GET',
        data: {
          'key': 'f4ec288466204235a0efedfade826117',
          'q': query
        },
        dataType: 'json',
        statusCode: {
          200: function(response){  // success
          	$('#resultJson').append(JSON.stringify("Continent: " + response.results[0].components.continent));
          	$('#resultJson').append(JSON.stringify("Country: " + response.results[0].components.country));
          	$('#resultJson').append(JSON.stringify("State: " + response.results[0].components.state));
          	$('#resultJson').append(JSON.stringify("Currency: " + response.results[0].annotations.currency.name));
          	$('#resultJson').append(JSON.stringify("Symbol: " + response.results[0].annotations.currency.symbol));          	

          	//response.results[1].confidence
          },
          402: function(){
            alert('hit free-trial daily limit');
          }
        }
      });
}

$(document).ready(function(){
	geocode(lat + "," + long);

});