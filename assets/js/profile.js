$(document).ready(function() {


	$('#edit').click(function() {
			this.classList.add("display-none");
			$('.display-profile').addClass('display-profile-removed');
			$('.display-profile').removeClass('display-profile');
			$('input').each(function() {
				if ($(this).attr('disabled')) {
					$(this).removeAttr('disabled');
				}
			});
			$('select').each(function() {
				if ($(this).attr('disabled')) {
					$(this).removeAttr('disabled');
				}
    	  		 });
	});

	$('#save').click(function() {
		if($('#profile_form').serialize().length < 110) {
			$("#message").html("There seems to be an error :(");
		} else {
			$.ajax({
    			type: "POST",
    			url: "http://localhost/vyuh/index.php/profile/profile_update",
    			data: $('#profile_form').serialize(),
    			success: function(response)
    			{
      				$("#message").html("Profile Updated Successfully :)");
    			},
    			error: function(){
    				$("#message").html("There seems to be an error :(");
    			},
  			});
  		}
	});

	$('#cancel').click(function() {
			//this.classList.add("display-none");
			$('.display-profile-removed').addClass('display-profile');
			$('.display-profile-removed').removeClass('display-profile-removed');
			$('#edit').removeClass('display-none');
			$('input').each(function() {
				if (!$(this).attr('disabled')) {
					$(this).attr({
    	                'disabled': 'disabled'
    	            });
				}
			});
			$('select').each(function() {
				if (!$(this).attr('disabled')) {
					$(this).attr({
    	                'disabled': 'disabled'
    	            });
				}
			});
			$('#edit').removeAttr('disabled');
			
	});


});

