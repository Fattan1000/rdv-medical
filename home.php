<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/5/css/bootstrap.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<title>Home Page</title>
	<script src="/js/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/stylesheet_home.css">
	<link rel="stylesheet" type="text/css" href="css/stylesheet_essai.css">
</head>
<body>
	<div class="main_container">
		<div class="header">
			
			<button class='head_buttons' style="color:white">mon profile </button>
			<button class='head_buttons'style="color:white" ><a href="login.php" style="color:white"> login/sign up</a></button>
		    
		</div>
			<h1 class="display-1">Prenez un rendez-vous avec le medcin  le plus proche de vous online </h1>

		<div class="container">
			<div class="search"><input id="search"type="text" placeholder="Nom,Specialite,Ville..." name="search_button">
			<button>rechercher &#xFE0E;</button></div>
		</div>
	</div> 
	<div id="search_result"></div>
	
<script>
	$(document).ready(function() {
    $("#search").keyup(function(){
		let input=$(this).val();
		
		if(input!=""){
			$.ajax({

				url:"search_config.php",
				method:"POST",
				data:{input:input},
				success:function(data){
                  $("#search_result").html(data);
				  $("#search_result").css("display","block");
				}
			})
		}
		else   $("#search_result").css("display","none");
	});
	});
</script>





</body>
</html>