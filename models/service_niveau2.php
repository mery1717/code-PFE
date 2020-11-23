<?php
	 include('C:\wamp64\www\codePFE\models\connexionBD_model.php'); 
    if(isset($_GET["niveau1"])) {
	$rep=$bdd->query('select distinct niveau2 from affectations where niveau1='.$_GET["niveau1"].' order by niveau2');
	echo "<option value=''> Sélectionnez le sous service</option>";
	while($donnees=$rep->fetch()){
		
		echo '<option value='.$donnees["niveau2"].'>'.$donnees["niveau2"].'</option>';
	}}
	 else{
	    echo '<option value="">service not available</option>';
	     }


?>


