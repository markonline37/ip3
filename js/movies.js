
$(document).ready(function (){

	load();

});


function load() {

	$.ajax({
		url: "https://api.themoviedb.org/3/discover/movie?api_key=fd710eb4aa46d9d9a6a5c6d5192149c4&language=en-US&sort_by=revenue.desc&include_adult=false&include_video=false&page=1",
		dataType: 'json',    
        success: function(data){
        	var genres = {Action:0,Adventure:0,Animation:0,Comedy:0,Crime:0,Documentary:0,Drama:0,Fantasy:0,History:0,Horror:0,Mystery:0,Romance:0,ScienceFiction:0,Thriller:0,Western:0};
        	$.each(data.results, function(i){
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
			});
			//document.getElementById("data").innerHTML = JSON.stringify(genres);
			var values = [genres.Action,genres.Adventure,genres.Animation,genres.Comedy,genres.Crime,genres.Documentary,genres.Drama,genres.Fantasy,genres.History,genres.Horror,genres.Mystery,genres.Romance,genres.ScienceFiction,genres.Thriller,genres.Western];
			var labels = ["Action","Adventure","Animation","Comedy","Crime","Documentary","Drama","Fantasy","History","Horror","Mystery","Romance","ScienceFiction","Thriller","Western"];
        	
        	var ctx = document.getElementById('chart');
        	var myPieChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			    	labels: labels,
			        datasets: [{
				        label: "Games with Genre",
				        backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850", "#223344", "#ffa500", "#bebebe" , "#f1c2c2", "#fa7268", "#85a8c2", "#91a490", "#77c8c0", "#cdb0b0", "#7b9e83"],
				        data: values
			        }]	
			    },
			    options: {
			      	title: {
				        display: true,
				        text: 'Genres of 20 top grossing movies'
			    	}
			    }
    
			});
        },
        error: function() {
            var errorText = "Error occured, please reload page or contact systems administrator";
	        document.getElementById("info").innerHTML = errorText;
        }
	});
}
