<?php
	 include('C:\wamp64\www\codePFE\models\connexionBD_model.php'); 
    if(isset($_GET["idMarque"])) {
	$rep=$bdd->query('select * from modeles where idMarque='.$_GET["idMarque"].' order by modele');
	echo "<option value=''> Sélectionnez le modèle </option>";
	while($donnees=$rep->fetch()){
		
		echo '<option value='.$donnees["idModele"].'>'.$donnees["modele"].'</option>';
	}}
	 else{
	    echo '<option value="">model not available</option>';
	     }


?>