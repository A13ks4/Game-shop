$(document).ready(function(){
	


});
function addtocart(id){
	$.post("includes/addtocart.php",
			{
				task  : "addtocart",
				id : id
			},
			function(data){
				$(".cart").html(" ");
				$(".cart").html(" "+data);
				
			});
}
function selectgame(str){
	$.get("browsall.php",
			{
				
				genre : str
			},
			function(data){
				$("#brows").html("");
				$("#brows").html(data);
				$("#brows select").val(str);
			});
}
function selectdev(str){
	$.get("browsall.php",
			{
				dev : str
			},
			function(data){
				$("#brows").html("");
				$("#brows").html(data);
				$("#brows select").val(str);
			});
}

function deletegame(id){
	$.post("includes/deletegame.php",
			{
				task  : "delete",
				id : id
			},
			function(data){
				$("#brows").html("");
				$("#brows").html(data);
				
			});
	
}