<?php
	 include('C:\wamp64\www\codePFE\models\connexionBD_model.php'); 
    if(isset($_GET["idFamille"])) {
	$rep=$bdd->query('SELECT `sousfamilles`.idSousFamille, sousFamille FROM `sousfamilles`,`familles_sousfamilles` WHERE `idFamille`='.$_GET["idFamille"].' and `familles_sousfamilles`.`idSousFamille`=`sousfamilles`.`idSousFamille`');
	echo "<option value=''> Sélectionnez sous famille </option>";
	while($donnees=$rep->fetch()){
		
		echo '<option value='.$donnees["idSousFamille"].'>'.$donnees["sousFamille"].'</option>';
	}}
	 else{
	    echo '<option value="">Sous famille not available</option>';
	     }


?>