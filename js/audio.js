//global context and global element source
var context;
var src;

window.onload = function() {
    //add listener to play button
    document.getElementById("play_button").addEventListener("click", sort);
}

function sort(){
    //get radio button value
    var selector = document.getElementsByName("song");
    var selected = "";

    //loop through the radio to get the right one
    for(var i = 0; i < selector.length; i++){
        if(selector[i].checked){
            selected = selector[i].value;
            break;
        }
    }
    if(selected === "summer"){
        displayTitle("Summer");
        play("summer");
    } else if(selected === "epic"){
        displayTitle("Epic");
        play("epic");
    } else if(selected === "actionable"){
        displayTitle("Actionable");
        play("actionable");
    } else if(selected === "anewbeginning"){
        displayTitle("A New Beginning");
        play("anewbeginning");
    } else if(selected === "sweet"){
        displayTitle("Sweet");
        play("sweet");
    }
}

function displayTitle(title){
    //display now playing when playing, remove it when over
    var temp = document.getElementById("now_playing");    
    temp.innerHTML = "Now Playing: " + title;
    var myAudio = document.getElementById("myAudio");
    myAudio.onended = function() {
        temp.innerHTML = "<br>";
    }
}



function play(input) {

    var canvas = document.getElementById("canvas");
    var ctx = canvas.getContext("2d");

    var audioFile = "media/" + input + ".mp3";
    var myAudio = document.getElementById("myAudio");

    myAudio.src = audioFile;
    myAudio.load();
    myAudio.play();
    //set the context or use global variable
    context = context || new AudioContext();
    src = src || context.createMediaElementSource(myAudio);
    //create analyser
    var analyser = context.createAnalyser();

    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;
    //connect the analyser to media element
    src.connect(analyser);
    analyser.connect(context.destination);

    analyser.fftSize = 256;

    //make a buffer length to use for drawing the bars
    var bufferLength = analyser.frequencyBinCount;
    //for drawing the bars
    var dataArray = new Uint8Array(bufferLength);

    var WIDTH = canvas.width;
    var HEIGHT = canvas.height;

    var barWidth = (WIDTH / bufferLength) * 2.5;
    var barHeight;
    var x = 0;

    function renderFrame() {
        requestAnimationFrame(renderFrame);
        x = 0;
        //pass the current frequency data to dataArray
        analyser.getByteFrequencyData(dataArray);
        ctx.fillStyle = "#000";
        ctx.fillRect(0, 0, WIDTH, HEIGHT);

        for (var i = 0; i < bufferLength; i++) {
            //use the data array element to calc barheight
            barHeight = dataArray[i];
            var r = barHeight + (25 * (i/bufferLength));
            var g = 250 * (i/bufferLength);
            var b = 50;
            ctx.fillStyle = "rgb(" + r + "," + g + "," + b + ")";
            ctx.fillRect(x, HEIGHT - barHeight*3.45, barWidth, barHeight*3.45);
            x += barWidth + 1;
        }
    }

    myAudio.play();
    renderFrame();
}