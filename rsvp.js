$(document).on("click",".like", function(event){
		event.preventDefault();
		concert_name = $(this).attr("concertname");
		type = $(this).attr("value");
		if(type == "RSVP"){
			txt = "UNRSVP"
		}
		else{
			txt = "RSVP"
		}
		that = this;
		$.ajax({
		       url: "/followconcert1.php",
		       type: "GET",
		       data: {"concertname" : concert_name, "type" : type},
		       success: function(response) {
		           $(that).val(txt);
				   $(that).text("txt")
				   
		       }
		    });
	});