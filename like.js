$(document).on("click",".like", function(event){
		event.preventDefault();
		band_id = $(this).attr("bandid");
		type = $(this).attr("value");
		if(type == "like"){
			txt = "unlike"
		}
		else{
			txt = "like"
		}
		that = this;
		$.ajax({
		       url: "/likeband.php",
		       type: "GET",
		       data: {"bandid" : band_id, "type" : type},
		       success: function(response) {
		           $(that).val(txt);
				   $(that).text("txt")
				   
		       }
		    });
	});