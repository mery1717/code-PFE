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
  <!-- l'inclusion de l'entete -->
    <?php  include 'C:\wamp64\www\CodePFE\codes_vues\header_vue.php'; ?>
<meta charset="utf-8" />
<title> page admin </title>
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
 
 
<body  onmousemove="temps=0" onload='time_out();' style="margin-top: 0px ;background-image: url(../images/img3.jpg);background-repeat:no-repeat;background-size: cover;">
    
  <?php  include 'C:\wamp64\www\CodePFE\codes_vues\hea.php'; ?>
  <hr style="background: gray; color :black;height: 5px; margin-bottom: 0px;margin-top: 0px;">
      <nav class="navbar" style="margin-bottom: 0px;margin-right: 0 auto;margin-left: 0px auto;margin-top: 0px;background:white" >
        <div class="fluid">
          <div class="navbar-header">
            
              <!-- <nav class="fixed-nav-bar"> -->
                <!--a class="navbar-brand" href="#ho">gestion d'inventaire</a-->
                <span class="navbar-text">
                  <?php if(isset($_SESSION['Utilisateur'])){
                    echo "<span class='bonjour'><strong style='color :black;font-size:18px;'>Bonjour , </strong><strong>".$_SESSION['Utilisateur']."</strong></span>" ;
                  }else{
                    echo "<span class='bonjour'><strong style='color :black;font-size:18px;'>Bonjour , </strong></span>" ;
                  }
                  ?>
               </span>
              <ul class="nav navbar-nav">
                  
                  <!--li><a href="">deconnect</a></li-->
               
                  <li><a href="/codePFE/models/deconnexion_model.php" name="deconnexion" class="btn btn-outline-danger" style="color:black;margin-left: 75vw;border-color: red;" role="button">se deconnecter</a></li>
              </ul>

              </div>

      </div>
      </nav>
      <script src="../boot/js/bootstrap.min.js" ></script>

      <a href="../controleurs/consultation_controleur"class="btn btn-info" style="margin-left: 24%;margin-right: 2%;margin-top: 3%;" role="button">Rechercher un materiel</a>      
     
      <a href="admin.php" class="btn btn-primary" style="margin-right: 2%;margin-top: 3%;" role="button">Sauvegarder les données    </a>

 <!-- AJout DROP DOWN -->
 <div class="btn-group" style="margin-right: 2%;margin-top: 3%">
  <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width:120px;" >
   Ajouter &nbsp; &nbsp;<i class="arrow down"></i>
  </button>
 
  <div class="dropdown-menu" style="background-color: rgba(255,255,255,0.30);width: 100%;">
    <a class="dropdown-item btn btn-primary" href='inscription_controleur' role="button" style="width: 100%;">Ajouter un utilisateur</a>
    <br/>
  <a class="dropdown-item btn btn-primary" href='..\models\ajout'  role="button" style="width: 100%;">Ajouter un materiel</a>

  </div>
</div>   

<div class="btn-group" style="margin-top: 3%">
  <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width:200px;" >
    Mettre à jour &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <i class="arrow down"></i>
  </button>
 
  <div class="dropdown-menu" style="background-color: rgba(255,255,255,0.30);width:300px;">
    <a class="dropdown-item btn btn-success" id="modifierUtilisateur" role="button" style="width: 100%;">Modifier les données d'un  utilisateur</a>
    <br/>
  <a class="dropdown-item btn btn-success" id="supprimer" role="button" style="width: 100%;">Supprimer</a>
   
  
  </div>
</div>

<dialog id="zeroDialog" >
    <form method="POST" action="" id="modifier" >
     <label for="PPR">Veuillez saisir le PPR de l'utilisateur:</label>
        <input type="number" min="1" name = "PPR" required="true" />

      <menu>
          <button id="annule0" type="reset" name=annule0>annuler</button>
           <button type="submit" name="modifieruser" id="mod" >Valider</button>
           <input type='submit'  name='valider' value='Enregistrer'  class='button' hidden="hidden" />

      </menu>
   </form>
</dialog>

<script>
  (function() {
    var updateButton = document.getElementById('modifierUtilisateur');
    var cancelButton = document.getElementById('annule0');

    // Update button opens a modal dialog
    updateButton.addEventListener('click', function() {
      document.getElementById('zeroDialog').showModal();
    });

    // Bouton pour fermer la boîte de dialogue
    cancelButton.addEventListener('click', function() {
      document.getElementById('zeroDialog').close();
    });

  })();
</script>

 <?php
 include('C:\wamp64\www\codePFE\models\connexionBD_model.php');
    if($_SERVER['REQUEST_METHOD']){
      if (isset($_POST['modifieruser'])) {
        $_SESSION['PPR'] = $_POST['PPR'] ;
        $sql4 ="SELECT * FROM users where PPR ='".$_POST['PPR']."'" ;
        $resultat4 =$bdd->query($sql4) ;
        if ($donnees=$resultat4->fetch()) {?>
         <script>
           location.href = "/codePFE/models/modification_utilisateur.php";
         </script>
      <?php  }
        else{
          ?>
                  <script>
                    alert("Pas d\'utilisateur avec ce PPR");
                  </script>
          <?php
        }
      }

    }
?>
<!-- trying -->

<dialog id="firstDialog" >
    <form method="dialog">
      <button id="supprimerUtilisateur" class="btn btn-primary" style="" role="button">Supprimer Utilisateur</button>
      <menu>
          <button id="annule2" type="reset" name=annule2>Annuler</button>
      </menu>
   </form>
</dialog>
 <br> <br>&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a><input type="button"  value ="Marques" class="btn btn-info" style="margin-left: 14%;margin-right: 2%;margin-top: 3%; width: 100px;" role="button" onclick="window.location.href='http://localhost/codePFE/models/marques_table.php'"></a>
<a><input type="button" value ="Modèles" class="btn btn-primary" onclick="window.location.href='http://localhost/codePFE/models/modeles_tables.php'" style="margin-left: %;margin-right: 2%;margin-top: 3%; width: 100px;" role="button" ></a>
<a><input type="button" value ="Familles" class="btn btn-success dropdown-toggle" style="margin-left: %;margin-right: 2%;margin-top: 3%; width: 100px;" role="button" onclick="window.location.href='http://localhost/codePFE/models/familles_table.php'"></a>
<a href="#"><input type="button" value ="Sous-familles" class="btn btn-warning" onclick="window.location.href='http://localhost/codePFE/models/sousFamille_table.php'"  style="margin-left:%;margin-right: 2%;margin-top: 3%; width: 100px;" role="button" class="btn btn-info"></a>
<a href="#"><input type="button" value ="Utilisateurs" class="btn btn-primary" onclick="window.location.href='http://localhost/codePFE/models/utilisateur_table.php'" style="margin-left: %;margin-right: 2%;margin-top: 3%; width: 100px;" role="button"></a>
<a><input type="button" value ="Magasins" class="btn btn-info" style="margin-left: %;margin-right: 2%;margin-top: 3%; width: 100px;" role="button" onclick="window.location.href='http://localhost/codePFE/models/magasins_table.php'"></a>
<a href="#"><input type="button" value ="Fournisseurs" class="btn btn-warning" onclick="window.location.href='http://localhost/codePFE/models/fournisseurs_table.php'" style="margin-left: %;margin-right: 2%;margin-top: 3%; width: 100px;" role="button"></a>


<script>
  (function() {
    var updateButton2 = document.getElementById('supprimer');
    var cancelButton2 = document.getElementById('annule2');

    // Update button opens a modal dialog
    updateButton2.addEventListener('click', function() {
      document.getElementById('firstDialog').showModal();
    });

    // Bouton pour fermer la boîte de dialogue
    cancelButton2.addEventListener('click', function() {
      document.getElementById('firstDialog').close();
    });

  })();
</script>
<!-- try two -->
<dialog id="favDialog" >
    <form name="my_form"  method="post" action="/codePFE/controleurs/pageAcceuilAdmin_controleur.php" id="supprimer" >
      <table>

      <label style="color:#45eba5;font-size: 14px;"><center> Quel utilisateur voulez vous supprimer? :</center></label><br/>
        <tr><td><label for="emailuser">Son login :</label></td>
        <td><input type="text" name=emailuser id="emailuser" /><br/></td></tr>
        <!--<tr><td><label> Son mot de passe : </label></td>
 <td><input type="password" name=password> </td></tr>-->
</table>
      <menu>
        <button id="annule" type="reset" name=annule>Annuler</button>
        <button type="submit" name="validerSuppression" >Valider</button>
    </menu>
  </form>
</dialog>

<script>
  (function() {
    var updateButton = document.getElementById('supprimerUtilisateur');
    var cancelButton = document.getElementById('annule');

    // Update button opens a modal dialog
    updateButton.addEventListener('click', function() {
      document.getElementById('favDialog').showModal();
    });

    // Bouton pour fermer la boîte de dialogue
    cancelButton.addEventListener('click', function() {
      document.getElementById('favDialog').close();
    });

  })();
</script>
          <!--       THE THIRD DIALOG     -->



  
<div id="contact-mail" class="tohide">
 <input type ="button" value ="Rechercher un materiel puis le supprimer"onclick="window.location.href='http://localhost/codePFE/controleurs/consultation_controleur.php'" style="margin-left: 300px ;"/>
 <input type ="button" id="suppression" value="Entree le numero d'inventaire du matériel à supprimer"/>

 <form name="myform" id="a_afficher" method="post" action="/codePFE/controleurs/pageAcceuilAdmin_controleur.php" style="display: none ;">
  <div style="margin-left: 600px ;"> Saisir un numéro d'inventaire  :</div><br/>
  <input type="text" name=numeroInventaire placeholder="numero d'inventaire" style="margin-left: 600px ;">
  <input type="submit" name=validation value="Valider"/>
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
if(temps < 3664)
 temps++;
else
    location.href = "/codePFE/models/deconnexion_model.php";

setTimeout('time_out()',3660)
}


// history.forward();

</script>
   
</html>
 <?php
 if(isset($_POST['validation'])){

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


   $sql2 ="SELECT * FROM `users` where `users`.`login`='".$_POST['emailuser']."'";
   
    $resultat2 =$bdd->query($sql2) ;
    if($datas=$resultat2->fetch()) {

            if(!empty($_POST['emailuser'])) {
            $sql1=" DELETE from users where login ='".$_POST['emailuser']."'"; 
                $resultat1=$bdd->exec($sql1);

              if($resultat1){
                            echo '
                <script>
                    alert("Suppression réussite!");
                  </script>    ';
                //echo"Suppression réussite" ; 
              }
              else {//echo"Suppression echouée" ;
                echo '
                <script>
                    alert("Suppression echouée!");
                  </script>    ';
            }
      
              }
       else{
                 echo '
                <script>
                    alert("erreur in POST [login]");
                  </script>    ';
       }  }

       else{
         echo '
                <script>
                    alert("Pas d\'utilisateur de ce login");
                  </script>    ';
       }     
              }

      
}
  
?>