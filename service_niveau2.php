<?php
include('connect.php');
    if(isset($_GET["niveau1"])) {
	$repo=$bdd->query('select distinct niveau2 from affectations where niveau1='.$_GET["niveau1"].' order by niveau2');
	echo "<option value=''>Sélectionnez le sous service </option>";
	while($donnee=$repo->fetch()){

		echo 
            '<option value='.$donnee["niveau2"].'>'.$donnee["niveau2"].'</option>';
	}}
	 else{
	    echo '<option value="">service not available</option>';
	     }

?>