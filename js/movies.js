
$(document).ready(function (){

	load();
});

var movieLinks = [];
var myPieChart;

function loadChart(){
	var labels = ["Action","Adventure","Animation","Comedy","Crime","Documentary","Drama","Fantasy","History","Horror","Mystery","Romance","ScienceFiction","Thriller","Western"];
	
	var ctx = document.getElementById('chart');
		myPieChart = new Chart(ctx, {
	    type: 'pie',
	    data: {
	    	labels: labels,
	        datasets: [{
		        label: "Movies with Genre",
		        backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850", "#223344", "#ffa500", "#bebebe" , "#f1c2c2", "#fa7268", "#85a8c2", "#91a490", "#77c8c0", "#cdb0b0", "#7b9e83"],
	        }]	
	    },
	    options: {
	      	title: {
		        display: true,
		        text: 'Genres of top 100 grossing movies',
		        fontSize: 40
	    	},
	    	legend: {
	    		display: false
	    	},
	    	tooltips: {
	    		titleFontSize: 20,
	    		bodyFontSize: 20
	    	}
	    	
	    }

	});
}

function generateLinks(){

	for(i = 1; i <= 5; i++){
		movieLinks.push("https://api.themoviedb.org/3/discover/movie?api_key=fd710eb4aa46d9d9a6a5c6d5192149c4&language=en-US&sort_by=revenue.desc&include_adult=false&include_video=false&page="+i);
	}

}

var amount = [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];

function load() {

	loadChart();
	generateLinks();

	$.each(movieLinks, function(i,item){
	    $.ajax({
	    	url: item,
			dataType: 'json',    
	        success: function(data){
	        	$.each(data.results, function(i){
					var genre_ids = data.results[i].genre_ids;
					for (j in genre_ids){
						switch(genre_ids[j]){
							case 28://Action
								amount[0] += 1;
								break;
							case 12://Adventure
								amount[1] += 1;
								break;
							case 16://Animation
								amount[2] += 1;
								break;
							case 35://Comedy
								amount[3] += 1;
								break;
							case 80://Crime
								amount[4] += 1;
								break;
							case 99://Documentary
								amount[5] += 1;
								break;
							case 18://Drama
								amount[6] += 1;
								break;
							case 14://Fantasy
								amount[7] += 1;
								break;
							case 36://History
								amount[8] += 1;
								break;
							case 27://Horror
								amount[9] += 1;
								break;
							case 9648://Mystery
								amount[10] += 1;
								break;
							case 10749://Romance
								amount[11] += 1;
								break;
							case 878://Science Fiction
								amount[12] += 1;
								break;
							case 53://Thriller
								amount[13] += 1;
								break;
							case 37://Western
								amount[14] += 1;
								break;
						}
					}
					
				});
	        	myPieChart.data.datasets[0].data = amount;
    			myPieChart.update();
	    	},
	    	error: function() {
            var errorText = "Error occured, please reload page or contact systems administrator";
	        document.getElementById("info").innerHTML = errorText;
        	}
        });
    });

}


