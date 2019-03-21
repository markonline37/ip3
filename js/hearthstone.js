window.onload = function() {
	load();
}

var error = false;

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
        url: "script/hearthstone-load.php",
        error: function() {
            //load default view and show error
            error = true;
            load();
        },
        success: function(json_data){
            //parse data returned from php
            var data = $.parseJSON(json_data);

            //disable the loading animation
            document.getElementById("temp2").classList.remove('temp');
            document.getElementById("temp2").classList.add('hidden');

            
        },
        complete: function(data) {
            
        }
	});
}