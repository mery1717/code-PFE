<?php
  session_start() ;
   if(isset($_POST['seLoguer'])) {
    	if(!empty($_POST['login']) AND !empty($_POST['password'])) {

		  $login=$_POST['login'];
		 $password=$_POST['password'];
		 $password_decrypt=md5($password);
		 } 
		                                
        $sql= "SELECT  *from users WHERE login ='".$login."' AND password ='".$password_decrypt."' " ;
          $resultat=$bdd->query($sql);
          while($donnees = $resultat->fetch())
        {  
                $profile = $donnees['profile'];
         if( $profile=="administrateur") {
         		 $_SESSION['profile']=$donnees['profile'] ;
				 $_SESSION['PPR']=$donnees['PPR'];
				 $_SESSION['login']=$donnees['login'];
				 $_SESSION['Utilisateur']=$donnees['nom'].' '.$donnees['prenom'];
				  header("Location:  http://localhost:8080/codePFE/controleurs/pageAcceuilAdmin_controleur.php");
				/* Header('Location:/codePFE/controleurs/pageAcceuilAdmin_controleur.php');*/

	
	   }

       
		 elseif( $profile=="utilisateur"){
	 	 $_SESSION['profile']=$donnees['profile'] ;
		 $_SESSION['PPR']=$donnees['PPR'];
		 $_SESSION['login']=$donnees['login'];
		 $_SESSION['Utilisateur']=$donnees['nom'].' '.$donnees['prenom'];
		 header("Location:  http://localhost:8080/codePFE/controleurs/pageAcceuilUtilisateur_controleur");
		
		 /*Header('Location:/codePFE/controleurs/pageAcceuilUtilisateur_controleur.php');*/
		}
		elseif( $profile=="observateur"){
	 		 $_SESSION['profile']=$donnees['profile'] ;
		 $_SESSION['PPR']=$donnees['PPR'];
		 $_SESSION['login']=$donnees['login'];
		 $_SESSION['Utilisateur']=$donnees['nom'].' '.$donnees['prenom'];
	
		  header("Location:  http://localhost:8080/codePFE/controleurs/consultation_controleur_observateur.php");
		/*Header('Location:/codePFE/controleurs/consultation_controleur_observateur.php');*/
		
		
		}

} ?>
<script>
  alert("Veuillez vérifier votre login ou votre mot de passe")	;
</script>
  <?php

    }                   
      ?>
          						
    
   
