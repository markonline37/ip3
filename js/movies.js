
$(document).ready(function (){
	load();
});

var pages = [];
var years = [];
var myChart;
var sortBy = 'revenue';

window.chartColors = {
  red: 'rgb(255, 99, 132)',
  orange: 'rgb(255, 159, 64)',
  yellow: 'rgb(255, 205, 86)',
  green: 'rgb(75, 192, 192)',
  blue: 'rgb(54, 162, 235)',
  purple: 'rgb(153, 102, 255)',
  grey: 'rgb(201, 203, 207)'
};

function initialChart(){
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
	    	responsive: true,
	    	maintainAspectRatio: false,
	      	title: {
		        display: true,
		        text: 'Genre distribution of 20 highest earning movies',
		        fontSize: 40
	    	},
	    	tooltips: {
	    		titleFontSize: 20,
	    		bodyFontSize: 20
	    	},
	    	scales: {
	    		yAxes: [{
	    			scaleLabel: {
	    				display: true,
	    				fontSize: 30,
	    				labelString: "Number of movies"
	    			},
	    			ticks: {
                		fontSize: 20
            		}

	    		}],
	    		xAxes: [{
	    			scaleLabel: {
	    				display: true,
	    				fontSize: 30,
	    				labelString: "Year"
	    			},
	    			ticks: {
                		fontSize: 20
            		}

	    		}]

	    	},
	    	legend: {
	            labels: {
	                fontSize: 20
	            }
        	}
	    }
	});
}

function resetData(){
	$.each(myChart.data.datasets, function(i,item){
		$.each(item.data, function(j,jtem){
			myChart.data.datasets[i].data[j] = 0;
		});
	});
}

function disableButtons(){
	document.getElementById("revenue").disabled = true;
	window.setTimeout(function(){ 
    	if(!err)
    		document.getElementById("revenue").disabled = false;
    },2000);
    document.getElementById("popularity").disabled = true;
	window.setTimeout(function(){
		if(!err)
    		document.getElementById("popularity").disabled = false;
    },2000);
    document.getElementById("rating").disabled = true;
	window.setTimeout(function(){ 
		if(!err)
    		document.getElementById("rating").disabled = false;
    },2000);
}

function revenueSort(){
	disableButtons();
	
	sortBy = 'revenue';
	myChart.options.title.text = 'Genre distribution of 20 highest earning movies';
	updateChart();
}

function popularitySort(){
	disableButtons();

	sortBy = 'popularity';
	myChart.options.title.text = 'Genre distribution of 20 most popular movies';
	updateChart();
}

function ratingSort(){
	disableButtons();

	sortBy = 'vote_average';
	myChart.options.title.text = 'Genre distribution of 20 highest rated movies';
	updateChart();
}

function load() {

	var currentYear = new Date().getFullYear();

	for(i = 1950; i <= currentYear; i+=5){	
		years.push(i);
	}

	for(i = 1; i <= 1; i++){
		pages.push(i);
	}

	initialChart();
	updateChart();
}

var err = false;

function ajaxRequest(y,year,p,page){
	$.ajax({
	type: "POST",
	url: "script/movies-load.php",
	data: {
		phppage: page,
		phpyear: year,
		phpsort: sortBy
	},
	success: function(response){
		try{
			var data = $.parseJSON(response)
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
		var errorText = "";
	    document.getElementById("loading").innerHTML = errorText;
	    if(err){
	    	document.getElementById("revenue").disabled = false;
		    document.getElementById("popularity").disabled = false;
		    document.getElementById("rating").disabled = false;
	    }
	    err = false;
	}
	catch(error){
		err = true;
        var errorText = "loading data";
	    document.getElementById("loading").innerHTML = errorText;
	    ajaxRequest(y,year,p,page);
	    document.getElementById("revenue").disabled = true;
	    document.getElementById("popularity").disabled = true;
	    document.getElementById("rating").disabled = true;
    	
    }	        	
	},
	error: function() {
	    var errorText = "Error occured, please reload page or contact systems administrator";
	    document.getElementById("info").innerHTML = errorText;
	}
	});
}

function updateChart(){
	resetData();
	$.each(years, function(y,year){
		$.each(pages, function(p,page){
			
	    	ajaxRequest(y,year,p,page);
	    	
	 
	    });		
	});
}