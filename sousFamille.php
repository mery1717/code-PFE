<?php
	include('connect.php');
    if(isset($_GET["idFamille"])) {
	$rep=$bdd->query("SELECT `sousfamilles`.idSousFamille, sousFamille FROM `sousfamilles`,`familles_sousfamilles` WHERE `idFamille`=".$_GET['idFamille']." and `familles_sousfamilles`.`idSousFamille`=`sousfamilles`.`idSousFamille`");
	echo "<option value=''>Sélectionnez la sous famille </option>";
	while($donnees=$rep->fetch()){
		
		echo '<option value='.$donnees["idSousFamille"].'>'.$donnees["sousFamille"].'</option>';
	}}
	 else{
	    echo '<option value="">sous famille not available</option>';
	     }


?>