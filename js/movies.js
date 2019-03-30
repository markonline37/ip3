
$(document).ready(function (){
	document.getElementById("data").innerHTML = "test";
	load();

});


function load() {

	$.ajax({
		url: "script/movies-load.php",
		dataType: 'json',    
        success: function(data){
        	var genres = {};
        	$.each(data, function(i){
				var genre_ids = data.results[i].genre_ids;
				for (j in genre_ids){
					switch(genre_ids[j]){
						case 28:
							genres.Action += 1;
							break;
						case 12:
							genres.Adventure += 1;
							break;
						case 16:
							genres.Animation += 1;
							break;
						case 35:
							genres.Comedy += 1;
							break;
						case 80:
							genres.Crime += 1;
							break;
						case 99:
							genres.Documentary += 1;
							break;
						case 18:
							genres.Drama += 1;
							break;
						case 14:
							genres.Fantasy += 1;
							break;
						case 36:
							genres.History += 1;
							break;
						case 27:
							genres.Horror += 1;
							break;
						case 9648:
							genres.Mystery += 1;
							break;
						case 10749:
							genres.Romance += 1;
							break;
						case 878:
							genres.ScienceFiction += 1;
							break;
						case 53:
							genres.Thriller += 1;
							break;
						case 37:
							genres.Western += 1;
							break;
					}
				}
			}
			//document.getElementById("data").innerHTML = JSON.stringify(genres);

        },
        error: function() {
            errorText = "Error occured, please reload page or contact systems administrator";
	        document.getElementById("info").innerHTML = errorText;
        }
	});
}
