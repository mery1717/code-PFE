<?php
		session_start() ;
		include('C:\wamp64\www\codePFE\models\connexionBD_model.php') ;
          
          $req2="SELECT numeroInventaire from  view_livraisons3  where dateLivraison =".$_SESSION['dateLivraison2']."";
          echo"N° D'INVENTAIRE : ";
          echo $_SESSION['dateLivraison2'] ; 
		  $result2 = $bdd->query($req2) ; 
          while($donnees2=$result2->fetch()) {
          echo"hello" ;
          echo"->".$donnees2['numeroInventaire']." ";

	     }		


?>