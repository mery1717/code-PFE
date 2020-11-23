<?php
$conn=mysqli_connect("localhost","root","","inventaire_materiels");
if(!$conn){
	die("Connection failed: ".mysqli_connect_error());
}
?>
<!--<?php
	/*try{
		$bdd=new PDO('mysql:host=localhost;dbname=inventaire_materiels;charset=utf8','root','');
		$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
    catch(Exception $e){
    	die('Error : '.$e->getMessage());
    }*/
?>-->