google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(ready);

function ready() {
	load();
}

var error = false;
var sets = [
	"Basic",
	"Classic",
	"Naxxramas",
	"Goblins vs Gnomes",
	"Blackrock Mountain",
	"The Grand Tournament",
	"The League of Explorers",
	"Whispers of the Old Gods",
	"One Night in Karazhan",
	"Mean Streets of Gadgetzan",
	"Journey to Un'Goro",
	"Knights of the Frozen Throne",
	"Kobolds & Catacombs",
	"The Witchwood",
	"The Boomsday Project",
	"Rastakhan's Rumble",
	"Tavern Brawl"
];

function load() {

	if(error){
        document.getElementById("info").innerHTML = "Error occured, please reload page or contact systems administrator";
        error = false;
        return;
    } else {
        document.getElementById("info").innerHTML = "";
    }

	$.ajax({
		type: "POST",
        //post the data to a php file to protect the api keys
        url: "script/hearthstone-load.php",
        error: function() {
            //load default view and show error
            error = true;
            load();
        },
        success: function(json_data){
            //parse data returned from php
            var data = $.parseJSON(json_data);

            //convert the returned json array to object array
            populateArray(data);
            //populate menu
            drawMenu();
            //load the first chart
            loadDefault();
        },
        complete: function(data) {
            //add listener after everything is loaded
            menuListener();
        }
	});
}

//draws the set selector options based upon the sets array above
function drawMenu(){
    var container = document.getElementById("menu_content");
    container.innerHTML = "<h5>Set Selector</h5><br>\n";
    var sb = "<form name=\"menu_form\">";
    for(var i = 0; i < sets.length; i++){
        sb+= "<input type=\"radio\" name=\"setselector\" id=\"" + sets[i] + "\" value=\"" + sets[i] + "\">" + sets[i] + "<br>";
    }
    sb+="</form><br>";
    container.innerHTML+=sb;
}

function menuListener() {
    //show hidden elements after data has loaded
    document.getElementById("hearthstone_text").style.display = "block";
    document.getElementById("hearthstone_links").style.display = "block";
    document.getElementById("menu_content").style.display = "block";
    document.getElementById("menu_tag").style.display = "block";
    document.getElementById("Basic").checked = true;
    document.getElementById("temp2").style.display = "none";

    //add a listener to every element type radio, call draw chart using the value stored in radio button
    $(document).ready(function(){
        $('input[type=radio]').click(function(){
            drawChart(this.value);
        });
    });
}



function populateArray(data){
	var j;
	for(j = 0; j < sets.length; j++){
		var temp = sets[j];
		var i;
		for (i = 0; i < data[temp].length; i++) {
        	if(data[temp][i].hasOwnProperty('health')){
        		var t = data[temp][i].health;
        		switch(t){
        			case 1:
        			jsonarray[temp].one++;
        			break;
        			case 2:
        			jsonarray[temp].two++;
        			break;
        			case 3:
        			jsonarray[temp].three++;
        			break;
        			case 4:
        			jsonarray[temp].four++;
        			break;
        			case 5:
        			jsonarray[temp].five++;
        			break;
        			case 6:
        			jsonarray[temp].six++;
        			break;
        			case 7:
        			jsonarray[temp].seven++;
        			break;
        			case 8:
        			jsonarray[temp].eight++;
        			break;
        			case 9:
        			jsonarray[temp].nine++;
        			break;
        			case 10:
        			jsonarray[temp].ten++;
        			break;
        			case 11:
        			jsonarray[temp].eleven++;
        			break;
        			case 12:
        			jsonarray[temp].twelve++;
        			break;
        			case 13:
        			jsonarray[temp].thirteen++;
        			break;
        			case 14:
        			jsonarray[temp].fourteen++;
        			break;
        			case 15:
        			jsonarray[temp].fifteen++;
        			break;
        		}
        	}
        	if(data[temp][i].type === 'Enchantment'){
        		jsonarray[temp].enchantment++;
        	} else if(data[temp][i].type === 'Spell'){
        		jsonarray[temp].spell++;
        	} else if(data[temp][i].type === 'Hero'){
        		jsonarray[temp].hero++;
        	} else if(data[temp][i].type === 'Minion'){
        		jsonarray[temp].minion++;
        	} else if(data[temp][i].type === 'Weapon'){
        		jsonarray[temp].weapon++;
        	} else if(data[temp][i].type === 'Hero Power'){
        		jsonarray[temp].power++;
        	}
        }
	}
}

//initially draw the basic set
function loadDefault(){
	drawChart('Basic');
}

//boolean to stop anchor jump on initial load of page
var firstLoad = true;

function drawChart(input) {
    document.getElementById("menu_tag").innerHTML = "<a id=\"set_anchor\"></a><h5>"+input+" Set</h5>\n<br>";
    //if the user is browsing with mobile sized devices jump to anchor after pressing a radio button for convience
    if(firstLoad === false && window.innerWidth < 950){
        window.location.href = "#set_anchor";
    } else {
        firstLoad = false;
    }
	var data = google.visualization.arrayToDataTable([
		['Card Type', 'Total'],
		['Minion(s) With: 1 Health', jsonarray[input].one],
		['2 Health', jsonarray[input].two],
		['3 Health', jsonarray[input].three],
		['4 Health', jsonarray[input].four],
		['5 Health', jsonarray[input].five],
		['6 Health', jsonarray[input].six],
		['7 Health', jsonarray[input].seven],
		['8 Health', jsonarray[input].eight],
		/*['9 Health', jsonarray[input].nine],
		['10 Health', jsonarray[input].ten],
		['11 Health', jsonarray[input].eleven],
		['12 Health', jsonarray[input].twelve],
		['13 Health', jsonarray[input].thirteen],
		['14 Health', jsonarray[input].fourteen],
		['15 Health', jsonarray[input].fifteen],*/ //too much data
		['Spell Card(s)', jsonarray[input].spell],
		['Minion Card(s)', jsonarray[input].minion],
		['Weapon Card(s)', jsonarray[input].weapon],
		['Power Card(s)', jsonarray[input].power],
		['Enchantment Card(s)', jsonarray[input].enchantment],
		['Hero Card(s)', jsonarray[input].hero]
	]);

	var height2 = data.getNumberOfRows() * 30 + 30;

	var options = {
		hAxis: {
		title: 'Number',
			minValue: 0,
		},
		vAxis: {
			title: 'Type'
		},
		bars: 'horizontal',
		axes: {
			y: {
				0: {side: 'left'}
			}
		},
		height: height2
	};
	var chart = new google.charts.Bar(document.getElementById('hearthstone_content'));
	chart.draw(data, options);
}