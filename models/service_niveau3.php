<?php
	 include('C:\wamp64\www\codePFE\models\connexionBD_model.php'); 
    if(isset($_GET["niveau2"])) {
	$rep=$bdd->query('select * from affectations where niveau2='.$_GET["niveau2"].'order by niveau3');
	echo "<option value=''> Sélectionnez le sous service</option>";
	while($donnees=$rep->fetch()){
		
		echo '<option value='.$donnees["idAffectation"].'>'.$donnees["niveau3"].'</option>';
	}}
	 else{
	    echo '<option value="">service not available</option>';
	     }


?>

