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
 <?php  include 'C:\wamp64\www\CodePFE\codes_vues\header_vue.php'; ?>
<title>page utilisateur</title>
<script src="https://code.jquery.com/jquery-1.10.2.js"> </script>
<style>
 #favDialog {border-style: none;}
      #firstDialog {border-style: solid red;}
     
     i {
    border: solid black;
    border-width: 0 3px 3px 0;
    display: inline-block;
    padding: 3px;
    padding-left: 2px;
}
.down {
    transform: rotate(45deg);
    -webkit-transform: rotate(45deg);
}
     .container{margin-left: 20%;}
     .bonjour { margin-left: 0px;color:#20c1bd; font-size : 17px;border-color: blue; }
</style>  
 
 <body  onmousemove="temps=0" onload='time_out();' style="margin-top: 0px ;background-image: url(../images/check.jpg);background-repeat:no-repeat;background-size: cover;">
    
  <?php  include 'C:\wamp64\www\CodePFE\codes_vues\hea.php'; ?>
  <hr style="background: gray; color :black;height: 5px; margin-bottom: 0px;margin-top: 0px;">
      <nav class="navbar" style="margin-bottom: 0px;margin-right: 0 auto;margin-left: 0px auto;margin-top: 0px;background:white" >
        <div class="fluid">
          <div class="navbar-header"> 
                <span class="navbar-text">
                  <?php if(isset($_SESSION['Utilisateur'])){
                    echo "<span class='bonjour'><strong style='color :black;font-size:18px;'>Bonjour , </strong><strong>".$_SESSION['Utilisateur']."</strong></span>" ;
                  }else{
                    echo "<span class='bonjour'><strong style='color :black;font-size:18px;'>Bonjour , </strong></span>" ;
                  }
                  ?>
               </span>
              <ul class="nav navbar-nav">
                  <li><a href="/codePFE/models/deconnexion_model.php" name="deconnexion" class="btn btn-outline-danger" style="color:black;margin-left: 70vw;border-color: red;" role="button">se deconnecter</a></li>
              </ul>

              </div>

      </div>
      </nav>
         <script src="../boot/js/bootstrap.min.js" ></script>
 
      <a href="consultation_controleur.php"class="btn btn-info" style="margin-left: 24%;margin-right: 2%;margin-top: 3%;" role="button">Rechercher un materiel</a>      
     
      <a href="admin.php" class="btn btn-primary" style="margin-right: 2%;margin-top: 3%;" role="button">Sauvegarder les données</a>

<div class="btn-group" style="margin-right: 2%;margin-top: 3%">
  <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width:120px;" >
   Ajouter &nbsp; &nbsp;<i class="arrow down"></i>
  </button>
 
  <div class="dropdown-menu" style="background-color: rgba(255,255,255,0.30);width: 100%;">
    <a class="dropdown-item btn btn-primary" href='..\models\ajout.php' role="button" style="width: 100%;">Ajouter un materiel</a>
    <br/>
  </div>
</div>  

<!-- 
 <form name="my_form" id="afficher" method="post" action="pageAcceuilAdmin_vue.php" style="display: none ;margin-left : 30% ;">
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

 </form> -->
 <a class="btn btn-success" id="supprimer" role="button" style="margin-right: 2%;margin-top: 3%;">Supprimer un materiel</a>


<dialog id="thirdDialog" >
    <form method="dialog">
   
        <a href='http://localhost/codePFE/controleurs/consultation_controleur.php' class="btn btn-primary" style="" role="button">Rechercher un materiel puis le supprimer</a>
      <button id="supprimerNumMat" class="btn btn-primary" style="" role="button">Entree le numero d'inventaire du matériel à supprimer</button>

      <menu>
        <button id="annuler2" type="reset" name=annuler2>Annuler</button>
        
    </menu>
  </form>
</dialog>

<script>
  (function() {
    var updateButton = document.getElementById('supprimer');
    var cancelButton = document.getElementById('annuler2');

    // Update button opens a modal dialog
    updateButton.addEventListener('click', function() {
      document.getElementById('thirdDialog').showModal();
    });

    // Bouton pour fermer la boîte de dialogue
    cancelButton.addEventListener('click', function() {
      document.getElementById('thirdDialog').close();
    });

  })();
</script>

<dialog id="fourDialog" >
    <form  name="myform" method="get" action="/codePFE/models/supprimer.php">
   
       <label for="numeroInventaire"> Saisir un numéro d'inventaire  :</label>
        <input type="text"  name=numeroInventaire id=":id" required="true" />

      <menu>
        <button id="annuler" type="reset" name="annule" >Annuler</button>
        <button type="submit" name=valider " >Valider</button>
    </menu>
  </form>
</dialog>
<script>
  (function() {
    var updateButton = document.getElementById('supprimerNumMat');
    var cancelButton = document.getElementById('annuler');

    // Update button opens a modal dialog
    updateButton.addEventListener('click', function() {
      document.getElementById('fourDialog').showModal();
    });

    // Bouton pour fermer la boîte de dialogue
    cancelButton.addEventListener('click', function() {
      document.getElementById('fourDialog').close();
    });

  })();

var temps=0;
function time_out()
{
if(temps < 3664)
 temps++;
else
    location.href = "/codePFE/models/deconnexion_model.php";

setTimeout('time_out()',3660)
}


</script>


 


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

var temps=0;
function time_out()
{
if(temps < 3366)
 temps++;
else
 location.href = "/codePFE/index.php";
setTimeout('time_out()',3360)
}


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
  else echo"Suppression a echoué" ;
  }

      
}
  
?>