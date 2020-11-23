<?php
include('connect.php');
    if(isset($_GET["niveau2"])) {
	$repo=$bdd->query('select * from affectations where niveau2='.$_GET["niveau2"].' order by niveau3');
	echo "<option value=''>Sélectionnez le sous service </option>";
	while($donnee=$repo->fetch()){

		echo 
            '<option value='.$donnee["idAffectation"].'>'.$donnee["niveau3"].'</option>';
	}}
	 else{
	    echo '<option value="">service not available</option>';
	     }

?>