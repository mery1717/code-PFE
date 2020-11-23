<?php
include('C:\wamp64\www\codePFE\models\connexionBD_model.php') ;
  
$resultat=$bdd->prepare('DELETE  from materiels where idMateriel=:id') ;
            $resultat->bindValue(':id',$_GET['identifiantMateriel']) ;
            $isOk = $resultat->execute() ;
            if($isOk){
            	echo "La suppression est effectuée" ;
            }
        
        else echo"Votre suppression a echoué" ;
			
 ?>