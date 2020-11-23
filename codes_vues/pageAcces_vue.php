<!DOCTYPE html>
<html lang='en'>
<head>
<?php include 'header_vue.php' ?>
</head>
<body style="background-image: url(/codePFE/images/img3.jpg);background-repeat:no-repeat;background-size: cover;background-position: center; background-attachment: fixed;background-size : 100% 100%;margin: 0px;padding: 0px;height: 100%;width: 100%;">

 <?php  include 'C:\wamp64\www\CodePFE\codes_vues\hea.php'; ?>
		<script src="boot/js/bootstrap.min.js" ></script>
			<nav class="navbar navbar-inverse" style="margin-bottom: 0;margin-right: 0 auto;margin-left: 0px auto;margin-top: 0%;">
			  <div class="container-fluid">
			    <div class="navbar-header">
			    	<div class="container">
			    		<!--<nav class="fixed-nav-bar">-->
			      		<a class="navbar-brand" href="#ho">gestion d'inventaire</a>
			    
			    		<ul class="nav navbar-nav">
						      <li class=""><a href="#ho">Acceuil</a></li>
						      <li class=""><a href="#log">Se connecter</a></li>
						      <!--li class=""><a href="#ab">about</a></li-->
						      <li class=""><a href="#con">contact</a></li>
			    		</ul>
			<!--/nav>-->
			  		</div>
			 	 </div>
			  </div>
			</nav>
<div class="Home" id="ho">
<div>
	<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  		<ol class="carousel-indicators">
		    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
		    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
		    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
		    <li data-target="#carousel-example-generic" data-slide-to="3"></li>
 	    </ol>

  <!-- Wrapper for slides -->
  		<div class="carousel-inner" role="listbox">
    		<div class="item active">
     			 <img src="/codePFE/images/img2.jpg" alt="health" style="width:100%;height: 665px;padding-left: 0 auto;margin-left: 0;">
				    <div class="carousel-caption">
						<h1 style="text-align: center;color: black;padding-bottom: 30%;">bienvenue au gestion d'inventure</h1>
					</div>
				     
    		</div>
    		<div class="item">
      			<img src="/codePFE/images/img1.jpg" alt="health" style="width:100%;height: 665px;padding-left: 0 auto;margin-left: 0;">
      			 <div class="carousel-caption">
						<h1 style="text-align: center;color: black;padding-bottom: 30%;">bienvenue</h1>
					</div>
      
    		</div>
     		<div class="item">
     			 <img src="/codePFE/images/Image1.png" alt="health" style="width:100%;height: 665px; padding-left: 0 auto;margin-left: 0;">
      			  <div class="carousel-caption">
						<h1 style="text-align: center;color: black;padding-bottom: 30%;">gestion d'inventure</h1>
				  </div>
   			</div>
   			<div class="item">
     			 <img src="/codePFE/images/Image2.jpg" alt="health" style="width:100%;height: 665px; padding-left: 0 auto;margin-left: 0;">
      			 
				  
   			</div>
  		</div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>

</div>
<div class="login" id="log">
			
<!-- page acces -->
		<div style="margin: 0px;padding: 0px;height: 650px;width: 100%;" >
			<div style="width: 100%;height: 700px;display: table;top: 0;">
        
        			<div style="display: table-cell;vertical-align: middle;width: 100%;">
            
            			<div style="width: 26vw;height: 70vh;background: rgba(255,255,255,0.39);margin: auto;border-radius: 1%;display: table;">
	   		 <form method="post" action="index.php">
	    			
	    		
	   	<br/>
	   	<h1 style="color : black ;margin-left: 5vw;margin-top: 6vh;padding: 1% 1% 1% 10%;font-size: 36px;border-bottom: 1px width: 20vw;">Connexion </h1>
	   	<hr >
	   	<br/>
		<input type="text" name="login" id="username" placeholder="Nom d'utilisateur" required="required" style="size: 100; color:black; display: table-cell;margin-left: 3.5vw;margin-top: 6vh;padding: 1% 1% 1% 10%;font-size: 20px;border: 0px;border-bottom: 1px solid white;width: 20vw;">
		<br/>
		<br/>
		<input type="password" name="password" id="password" placeholder="Mot de passe" required="required" style="display:table-cell;margin-left: 3.5vw;margin-top: 2vh; margin-bottom: 6vh;padding: 1% 1% 1% 10%;font-size: 20px;border: 0px;border-bottom: 1px solid white;width: 20vw;">
		<br/>
		<button type="submit" name="seLoguer" style="width :20vW ;text-decoration: none; display: table;margin-top:5%; height: 6vh;margin-left:3.5vw;margin-right:3.5vw; background: #ff5d5d ;border-color: transparent; font-size: 1.4vw;color: white">Se connecter</button>
								
    				
 	    		</form>
    		</div>
		</div>
	</div>
		
<!-- end page acces -->	
	</div>
</div>



<!--div class="about" id="ab">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="graphic_text">
					<h2 style=" margin-top:100px; color: pink ;">About us</h2>
						<div class="container">
							<span>
							<div class="card">
							  <img class="card-img-top" src="../images/Image1.png" alt="Card image cap">
							    <div class="w3-card-4">
							  <div class="card-body">
							  	<div class="container">
							    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
							</div>
							  </div>
							</div>
							</div>
							<div class="card">
							  <img class="card-img-top" src="../images/Image1.png" alt="Card image cap">
							    <div class="w3-card-4">
							  <div class="card-body">
							  	<div class="container">
							    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
							</div>
							  </div>
							</div>
							</div>
						</span>
						</div>
				</div>
			</div>
		</div>
	</div>
</div-->
<!--div class="alert alert-success" role="alert" id="id" style="width :100%;">Well done! You successfully log in </div-->

<script type="text/javascript">
	$(function(){
	$('a[href*="#"]:not([href="#"])').click(function(){
		if (location.pathname.replace(/^\//,'')==this.pathname.replace(/^\//,'') && location.hostname == this.hostname ){
			var target = $(this.hash);
			target = target.length ? target : $('[name='+this.hash.slice(1)
				+']');
			if(target.length){
				$('html,body').animate({scrollTop: target.offset().top},1000);
				return false;
			}
	}
	});
	});
</script>
<footer class="footer" style="padding-left: 0;padding-right: 0;background-color: #232931;color:white;">
	<div class="contact" id="con">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="graphic_text">
						<h3 style="color:white;">Contact</h3>
							<div class="container">
								

								<h4 style="color:white;">Vous pouvez nous contacter au numero ci-dessous:</h4>

								<h4 style="color:white;">05 22 45 67 50Heures d'ouverture: du lundi au vendredi de 09:00 a 16:00 </h4>
					        </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>
</body>


</html>