function geocode(query){
      $.ajax({
        url: 'https://api.opencagedata.com/geocode/v1/json',
        method: 'GET',
        data: {
          'key': 'f4ec288466204235a0efedfade826117',
          'q': query,
          'no_annotations': 1
          // see other optional params:
          // https://opencagedata.com/api#forward-opt
        },
        dataType: 'json',
        statusCode: {
          200: function(response){  // success
          	$('#resultJson').append(response.results[0].formatted);
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