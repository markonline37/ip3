var books = [
	"A Midsummer Night's Dream",
	"Hamlet",
	"Julius Caesar",
	"King Lear",
	"Macbeth",
	"Othello",
	"Romeo and Juliet",
	"The Tempest"
];

var error = false;

function drawMenu() {
	var container = document.getElementById("books_menu");
	container.innerHTML = "<h5>Play Selector</h5><br>\n";
	var sb = "<form name=\"menu_form\">";
	for(var i = 0; i < books.length; i++){
        sb+= "<input type=\"radio\" name=\"setselector\" id=\"" + books[i] + "\" value=\"" + books[i] + "\">" + books[i] + "<br>";
    }
    sb+="</form><br>";
    container.innerHTML+=sb;
    document.getElementById(books[0]).checked = true;
}

window.onload = function(){
	drawMenu();
	process(books[0]);
	listener();
}

//add a listener to all radio buttons
function listener() {
	$(document).ready(function(){
        $('input[type=radio]').click(function(){
            process(this.value);
        });
    });
}

function rewrite(data){
	//remove '
	data = data.replace(/'/g, '');
	//remove spaces
	data = data.replace(/ /g, '');
	//remove capitalisation
	data = data.toLowerCase();
	//add a fileextension
	data +=".txt";
	//return the data
	return data;
}

var globalFilename = "";
function process(filename) {
	globalFilename = filename;
	//process the input
	var newfilename = rewrite(filename);
	//get local file - was an ajax request but was behaved similar to a memory leak.
    $.get('media/'+newfilename, runData);
}

function runData(data) {
	var container = document.getElementById("books_container");
	container.innerHTML = "<h5>" + globalFilename + "</h5>";
    var processeddata = wordFrequency(data);
    drawCloud(processeddata);
    processeddata = "";
    data = "";
}

function wordFrequency(data) {
    var words = data.replace(/\.|\[|\]|\(|\)|\&|\"|\;|\,|\?|\_|\!|\"\"/g, '').replace(/é|ê|ë|è/g, 'e').split(/\s/);
    var freqMap = {};
    var letters = /^[A-Za-z]+$/;
    words.forEach(function(w) {
    	//Shakespeare liked SHOUTING
    	w=w.toLowerCase();
    	//There's an awful lot of boring, standard words - remove some of them.
        if(common.includes(w) || w === ""){
        	//do nothing for the 'not interesting' words
        } else {
        	w=w.charAt(0).toUpperCase()+w.slice(1);
        	if (!freqMap[w]) {
	            freqMap[w] = 0;
	        }
	        freqMap[w] += 1;
        }
    });
    return freqMap;
}

function drawCloud(data){
	var maxFont = 48;
	var minFont = 14;
	var maxWeight = 900;
	var minWeight = 100;
	var minCount = 10;
	var array = [];

	var newData = {};
	var max = 0;
	$.each(data, function(w){
		if(!max || data[w] > max){
			max = data[w];
		}
		if(data[w] > minCount){
			newData[w] = data[w];
		}
	});

	var builder = "";

	$.each(newData, function(w){
		var percent = newData[w]/max;
		var weight = newData[w]*percent;
		var fontSize = maxFont*percent;
		var weight = Math.ceil(weight/100)*100;
		fontSize = Math.ceil(fontSize);
		if(weight < minWeight){
			weight = minWeight;
		}
		if(fontSize < minFont){
			fontSize = minFont;
		}

		var string = "<div class=\"wordCloudItem\">";
		string+="<span style=\"font-size: " + fontSize + "px;font-weight: " + weight + "\">" + w + "</span>";
		string+="</div>";
		array.push(string);
	});
	for(var i = 0; i < array.length; i++){
		builder+=array[i];
	}
	var element = document.getElementById("books_container");
	element.innerHTML += builder;
}
