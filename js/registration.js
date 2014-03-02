$(function(){

$("#reg").click(function(){
	if($("#email").val()=="" || 
	   $("#pass").val()=="" ||
	   $("#pass").val() != $("#cpass").val())
		
		$("#ack").html("Username and Password are required")
	else if($("#fname").val() == "")
		$("#ack").html("omplete all Fields")
	else
		$.post($("#regForm").attr("action"),
			$("#regForm :input").serializeArray(),
			function(info){
				$("#ack").empty();
				$("#ack").html(info);
				clear();
			});
	$("#regForm").submit(function(){
		return false;
	});
	
});

function clear(){
	$("#regForm :input").each(function(){
		$(this).val("");
		
	});
}
});

