var error = false;

window.onload = function(){
	process("amidsummernightsdream"+".txt");
}

function process(filename) {
	if(error){
        document.getElementById("info").innerHTML = errorText;
        error = false;
        return;
    } else {
        document.getElementById("info").innerHTML = "";
    }

	$.ajax({
        url: "media/"+filename,
        error: function() {
            error = true;
            errorText = "Error loading file contact systems administrator";
            process(filename)
        },
        success: function(data){
            var processeddata = wordFrequency(data);
            drawCloud(processeddata);
        },
        complete: function(data) {
            //delete if not needed
        }
    });
}


function wordFrequency(data) {
    var words = data.replace(/\.|\[|\]|\(|\)|\&|\"|\;|\,|\?|\_|\!|\"\"/g, '').replace(/é|ê|ë|è/g, 'e').split(/\s/);
    var freqMap = {};
    var letters = /^[A-Za-z]+$/;
    words.forEach(function(w) {
    	//Shakespeare liked SHOUTING
    	w=w.toLowerCase();
    	w=w.charAt(0).toUpperCase()+w.slice(1);
    	//There's an awful lot of boring, standard words - remove some of them.
        if(w.match(/^(I|And|The|To|Of|A|You|In|My|Is|That|Me|With)$/) || w === ""){
        	//do nothing for the 'not interesting' words
        } else {
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
	var minCount = 16;
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
	element.innerHTML = builder;
}
