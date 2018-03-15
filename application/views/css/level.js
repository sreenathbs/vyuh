$(document).ready(function() {


	$('#add').click(function() {
			$('#add').addClass("display-none");
			$('#save').removeClass("display-none");
			$(document).find('tbody').prepend($('<tr><form id="level-form"><td><input class="form-control" id="id" value=""></td><td><input class="form-control" id="serial_number" value=""></td><td><input class="form-control" id="question" value=""></td><td><input class="form-control" id="answer" value=""></td><td><input class="form-control" id="active" value=""></td><td><input class="form-control" id="type" value=""></td><td><input class="form-control" id="hint" value=""></td><td><input class="form-control" id="hint_status" value=""></td></form></tr>'));
	});

	$('#save').click(function() {
		$('#add').removeClass("display-none");
		$('#save').addClass("display-none");
		var data = {id: document.getElementById('id').value, serial_number: document.getElementById('serial_number').value, question: document.getElementById('question').value, answer: document.getElementById('answer').value, active: document.getElementById('active').value, type: document.getElementById('type').value, hint: document.getElementById('hint').value, hint_status: document.getElementById('hint_status').value};
		if(data.length < 1) {
			$("#message").html("There seems to be an error :(");
		} else {
			$.ajax({
    			type: "POST",
    			url: "http://localhost/vyuh/index.php/profile/profile_update1",
    			data: data,
    			success: function(response)
    			{
      				$("#message").html("Profile Updated Successfully :)");
    			},
    			error: function(){
    				$("#message").html("Sorry, There seems to be an error :(");
    			},
  			});
  		}
	});



});


