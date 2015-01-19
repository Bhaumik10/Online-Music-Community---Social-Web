$(document).on("click",".like", function(event){
		event.preventDefault();
		ufname = $(this).attr("ufname");
		type = $(this).attr("value");
		if(type == "follow"){
			txt = "unfollow"
		}
		else{
			txt = "follow"
		}
		that = this;
		$.ajax({
		       url: "/followuser.php",
		       type: "GET",
		       data: {"ufname" : ufname, "type" : type},
		       success: function(response) {
		           $(that).val(txt);
				   $(that).text("txt")
				   
		       }
		    });
	});