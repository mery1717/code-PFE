<?php
session_start() ;
 // empecher le retour à la page précédente lors de la deconnexion
 if(!isset($_SESSION['Utilisateur'])){ ?>
  <SCRIPT LANGUAGE="JavaScript">
history.forward()
</SCRIPT>
<?php
 }
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8" />
<title>page admin</title>
<script src="https://code.jquery.com/jquery-1.10.2.js"> </script>
 <style>
 #favDialog {border-style: none;}
      #firstDialog {border-style: none;}
      #thirdDialog {border-style: none;}
      #fourDialog {border-style: none;}
      .container{margin-left: 20%;}



.bonjour { color:blue; font-size : 30px; margin-left: 500px ; }
</style> 
 
  <body onmousemove="temps=0" onload='time_out();' style="margin-top: 200px ;background-image: url(../images/nature6.jpg);background-repeat:no-repeat;background-size: cover;">
    <script src="../boot/js/bootstrap.min.js" ></script>
    <div class="navbar-header">
    <input type="button" name="deconnexion" value="Se deconnecter" onclick="window.location.href='/codePFE/models/deconnexion_model.php'" class="btn btn-outline-success" style="margin-left: 90vw;border-color: red;" role="button"> 
  </div> <br/> <br/> <br/> <br/> <br/> <br/>
  	<?php
  	echo"<div class='bonjour'>Bonjour ".$_SESSION['Utilisateur']."</div>" ;
  	?>
     <br/> <br/> <br/>
  <div>
      <a href="consultation_controleur.php"class="btn btn-info" style="margin-left: 11%;" role="button">Rechercher un materiel</a>      
      <a href="../models/ajout.php"  class="btn btn-primary" style="" role="button">Ajouter un materiel</a>
      
      <!-- <a href="livreor.php">Modifier des informations</a> -->
      <a href="admin.php" class="btn btn-success" style="margin-right: 1.5%;" role="button">Sauvegarder les données    </a>
      <a href="inscription_controleur.php" class="btn btn-primary" style="margin-right: 1.5%" role="button">Ajouter un utilisateur</a>


      <button id="modifierUtilisateur" type="button"class="btn btn-success"> <i class="fa fa-envelope text-center"> </i> Modifier les données d'un  utilisateur</button>
      <form method="post" action="/codePFE/models/modificationUtilisateur.php" id="modifier" style = "display : none ;" >
<label>Veuillez saisir le PPR de l'utilisateur  : </label>
<input type ="text" name = "PPR" required="required"> <br/> <br/>
<input type = "submit" value="Valider"name="modifier"> 
<input type = "reset" value="Vider le champ" >
</form>


 <!-- ######################################################## -->
 <button id="supprimerUtilisateur" type="button"class="btn btn-success"  > <i class="fa fa-envelope text-center"> </i> Supprimer un utilisateur</button>
 <form name="my_form" id="afficher" method="post" action="/codePFE/models/pageAcceuilAdmin_model.php" style="display: none ;margin-left : 30% ;">
  <div> Quel utilisateur voulez vous supprimer? :</div><br/>
  <table>
    <tr>
 <td> <label>Son login : </label> </td>
  <td><input type="text" name=login></td>
</tr>

<tr>
<td>  <label> Son mot de passe : </label> </td>
 <td> <input type="text" name=password> </td>
</tr>
</table>
  <input type="submit" name=validerSuppression value="Valider"/> 
  <input type="button" name=annule value="Annuler"id="annule"/>

 </form>

 <button id="bt-contact" type="button" class="btn btn-group-lg" data-target="#contact-mail" style="background-color: #1a75ff; border-color : #1a75ff ; color: white ;"> <i class="fa fa-envelope text-center"> </i> Supprimer un materiel</button>
</div>
 <br/>
  
<div id="contact-mail" class="tohide">
 <input type ="button" value ="Rechercher un materiel puis le supprimer"onclick="window.location.href='http://localhost/codePFE/controleurs/consultation_controleur.php'" style="margin-left: 300px ;"/>
 <input type ="button" id="suppression" value="Entree le numero d'inventaire du matériel à supprimer"/>

 <form name="myform" id="a_afficher" method="post" action="/codePFE/models/pageAcceuilAdmin_model.php" style="display: none ;">
  <div style="margin-left: 600px ;"> Saisir un numéro d'inventaire  :</div><br/>
  <input type="text" name=numeroInventaire placeholder="numero d'inventaire" style="margin-left: 600px ;">
  <input type="submit" name=valider value="Valider"/>
  <input type="button" name=annuler value="Annuler"id="annuler"/>




 </form>

</div>


    </body >
    <script>
        $(".tohide").hide();
$(".btn-group-lg").on("click", function() {
   var target = $(this).data("target");
   if(target!==undefined) $(target).toggle();
});
var element = document.getElementById('suppression');

    element.addEventListener('click', function() {
      document.getElementById('a_afficher').style.display = 'block' ;
    });
     var element = document.getElementById('annuler');

    element.addEventListener('click', function() {
      document.getElementById('a_afficher').style.display = 'none' ;
    });
       var element = document.getElementById('annule');

    element.addEventListener('click', function() {
      document.getElementById('afficher').style.display = 'none' ;
    });

    var element = document.getElementById('supprimerUtilisateur');

    element.addEventListener('click', function() {
      document.getElementById('afficher').style.display = 'block' ;
    });
    var element = document.getElementById('modifierUtilisateur');

    element.addEventListener('click', function() {
      document.getElementById('modifier').style.display = 'block' ;
    });



var temps=0;
function time_out()
{
if(temps < 244)
 temps++;
else
 location.href = "/codePFE/index.php";
setTimeout('time_out()',240)
}


// history.forward();

</script>
   
</html>
 <?php
 if(isset($_POST['valider'])){

  include('C:\wamp64\www\codePFE\models\connexionBD_model.php'); 
    if($_SERVER['REQUEST_METHOD']=='POST'){

      if(!empty($_POST['numeroInventaire'])) {
      $sql=" DELETE from materiels where numeroInventaire ='".$_POST['numeroInventaire']."' ";
          $resultat=$bdd->query($sql);

 if($resultat){
    echo"Suppression réussite" ; 
  }
  else echo"Suppression a echoué" ;
  
        }

else {

   echo"Veuillez remplir le champ puis valider " ;}
      
}
  
}
  if(isset($_POST['validerSuppression'])){

  include('C:\wamp64\www\codePFE\models\connexionBD_model.php'); 
    if($_SERVER['REQUEST_METHOD']=='POST'){

      if(!empty($_POST['login']) AND!empty($_POST['password']) ) {
      $sql=" DELETE from users where login ='".$_POST['login']."' AND password  ='".$_POST['password']."' "; 
          $resultat=$bdd->query($sql);

  
      
     }
  if($resultat){
    echo"Suppression réussite" ; 
  }
  else echo"Suppression echouée" ;
  }

      
}
  
?>