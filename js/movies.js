
$(document).ready(function (){

	load();
});

var movieLinks = [];
var years = [];
var myChart;

window.chartColors = {
  red: 'rgb(255, 99, 132)',
  orange: 'rgb(255, 159, 64)',
  yellow: 'rgb(255, 205, 86)',
  green: 'rgb(75, 192, 192)',
  blue: 'rgb(54, 162, 235)',
  purple: 'rgb(153, 102, 255)',
  grey: 'rgb(201, 203, 207)'
};

 $(document).ajaxStop(function () {
      console.log(myChart.data.datasets[0].data);
      console.log(myChart.data.datasets[5].data);
 });

function loadChart(){
	var ctx = document.getElementById('chart');
		myChart = new Chart(ctx, {
		type: 'line',
	    data: {
	    	labels: years,
	        datasets: [{
		        label: "Action",
		        borderColor: window.chartColors.red,

	        	data: [0,0,0,0,0,0,0,0,0,0,0,0,0,0]
	        },{
	        	label: "Adventure",
	        	borderColor: window.chartColors.orange,

	        	data: [0,0,0,0,0,0,0,0,0,0,0,0,0,0]
	        },{
	        	label: "Animation",
	        	borderColor: window.chartColors.yellow,
	
	        	data: [0,0,0,0,0,0,0,0,0,0,0,0,0,0]
	        },{
	        	label: "Comedy",
	        	borderColor: window.chartColors.green,
	   
	        	data: [0,0,0,0,0,0,0,0,0,0,0,0,0,0]
	        },{
	        	label: "Crime",
	        	borderColor: window.chartColors.blue,
	
	        	data: [0,0,0,0,0,0,0,0,0,0,0,0,0,0]
	        },{
	        	label: "Documentary",
	        	borderColor: window.chartColors.purple,

	        	data: [0,0,0,0,0,0,0,0,0,0,0,0,0,0]
	        },{
	        	label: "Drama",
	        	borderColor: window.chartColors.grey,
	   
	        	data: [0,0,0,0,0,0,0,0,0,0,0,0,0,0]
	        }]	
	    },
	    options: {
	      	title: {
		        display: true,
		        text: 'Genres of top 20 grossing movies over time',
		        fontSize: 40
	    	},
	    	tooltips: {
	    		titleFontSize: 20,
	    		bodyFontSize: 20
	    	}

	    	
	    }
 
	});
}

function generateLinks(pages){

	for(i = 1; i <= pages; i++){
		movieLinks.push("https://api.themoviedb.org/3/discover/movie?api_key=fd710eb4aa46d9d9a6a5c6d5192149c4&language=en-US&sort_by=revenue.desc&include_adult=false&include_video=false&page="+i);
	}

}

var testCounter = 0;
var testCounter2 = 0;

function load() {

	var currentYear = new Date().getFullYear();
	generateLinks(3);

	for(i = 1950; i <= currentYear; i+=5){	
		years.push(i);
	}

	loadChart();
	$.each(years, function(y,year){
		$.each(movieLinks, function(i,item){
		    $.ajax({
		    	url: item+"&primary_release_year="+year,
				dataType: 'json',    
		        success: function(data){
		        	$.each(data.results, function(i){
						var genre_ids = data.results[i].genre_ids;
						for (j in genre_ids){
							switch(genre_ids[j]){
								case 28://Action
									myChart.data.datasets[0].data[y] += 1;
									break;
								case 12://Adventure
									myChart.data.datasets[1].data[y] += 1;
									break;
								case 16://Animation
									myChart.data.datasets[2].data[y] += 1;
									break;
								case 35://Comedy
									myChart.data.datasets[3].data[y] += 1;
									break;
								case 80://Crime
									myChart.data.datasets[4].data[y] += 1;
									break;
								case 99://Documentary
									myChart.data.datasets[5].data[y] += 1;
									break;
								case 18://Drama
									myChart.data.datasets[6].data[y] += 1;
									break;
								/*case 14://Fantasy
									myChart.data.datasets[0].data[7] += 1;
									break;
								case 36://History
									myChart.data.datasets[0].data[8] += 1;
									break;
								case 27://Horror
									myChart.data.datasets[0].data[9] += 1;
									break;
								case 9648://Mystery
									myChart.data.datasets[0].data[10] += 1;
									break;
								case 10749://Romance
									myChart.data.datasets[0].data[11] += 1;
									break;
								case 878://Science Fiction
									myChart.data.datasets[0].data[12] += 1;
									break;
								case 53://Thriller
									myChart.data.datasets[0].data[13] += 1;
									break;
								case 37://Western
									myChart.data.datasets[0].data[14] += 1;
									break;*/
							}
						}
						
					});
	    			myChart.update();
		    	},
		    	error: function() {
	            var errorText = "Error occured, please reload page or contact systems administrator";
		        document.getElementById("info").innerHTML = errorText;
	        	}
	        });
	    });		
	});



}


