<?php
 session_start() ;
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8" />
<title>page admin</title>
<script src="https://code.jquery.com/jquery-1.10.2.js"> </script>
 <style>


ul#menu_horizontal { 
width : 80%; 
height : 30px;
margin :0px;
padding :0px;
background-color :  rgb(0, 191, 255);
border : 1px solid black;
list-style-type : none;
margin-left: 100px ; 

}
 
ul#menu_horizontal li {
padding : 0 0.5em;  
line-height : 30px;
}
 
ul#menu_horizontal li.bouton_gauche {
float : left;
border-right : 1px solid black; 
}
 
ul#menu_horizontal li.bouton_droite {
float : right;
border-left : 1px solid black;
}
 
ul#menu_horizontal a {
color : black;
text-decoration : none;
padding : 0 0.5em; 
font :  0.8em "Trebuchet MS";
}
ul#menu_horizontal  :hover { background-color: blue ; }
.supprimer  :hover { background-color: blue ; }
.supprimer {width : 80%; 
height : 30px;
margin :0px;
padding :0px;
background-color :  rgb(0, 191, 255);
border : 1px solid black;
list-style-type : none;
margin-left: 100px ; }
.deconnexion{ margin-left: 1200px ; background-color: #20B2AA; }
body{margin-top: 300px ;}
</style> 
 
  <body>
    <input type="button" name="deconnexion" value="Se deconnecter" onclick="window.location.href='deconnexion_model.php'" class="deconnexion">
      <a href="consultation_controleur.php">Rechercher un materiel</a>      
      <a href="accueil.php">Ajouter un materiel</a>
      
      <a href="livreor.php">Modifier des informations</a>
      <a href="admin.php">Sauvegarder les données    </a>
      <a href="inscription_controleur.php">Ajouter un utilisateur</a>
 <!-- ######################################################## -->
 <button id="supprimerUtilisateur" type="button"> <i class="fa fa-envelope text-center"> </i> Supprimer un utilisateur</button>
 <form name="my_form" id="afficher" method="post" action="pageAcceuilAdmin_vue.php" style="display: none ;">
  <div> Saisir l'e-mail de l'utilisateur à supprimer :</div><br/>
  <input type="text" name=adresseMail>
  <input type="submit" name=validerSuppression value="Valider"/>
  <input type="button" name=annule value="Annuler"id="annule"/>

 </form>
  

 <!-- ######################################################## -->

 <button id="bt-contact" type="button" class="btn btn-group-lg" data-target="#contact-mail"> <i class="fa fa-envelope text-center"> </i> Supprimer un materiel</button>
  
<div id="contact-mail" class="tohide">
 <input type ="button" value ="Rechercher un materiel puis le supprimer"onclick="window.location.href='http://localhost/codePFE/controleurs/consultation_controleur.php'"/>
 <input type ="button" id="suppression" value="Entree le numero d'inventaire du matériel à supprimer"/>

 <form name="myform" id="a_afficher" method="post" action="pageAcceuilAdmin_vue.php" style="display: none ;">
  <div> Saisir un numéro d'inventaire  :</div><br/>
  <input type="text" name=numeroInventaire>
  <input type="submit" name=valider value="Valider"/>
  <input type="button" name=annuler value="Annuler"id="annuler"/>

 </form>

</div>


    </body>
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


    </script>
   
</html>
 <?php
 if(isset($_POST['valider'])){

  include('C:\wamp64\www\codePFE\models\connexionBD_model.php'); 
    if($_SERVER['REQUEST_METHOD']=='POST'){

      if(!empty($_POST['numeroInventaire'])) {
      $sql=" DELETE from materiels where numeroInventaire ='".$_POST['numeroInventaire']."' ";
          $resultat=$bdd->query($sql);

  
        }

      
}
  
}
  if(isset($_POST['validerSuppression'])){

  include('C:\wamp64\www\codePFE\models\connexionBD_model.php'); 
    if($_SERVER['REQUEST_METHOD']=='POST'){

      if(!empty($_POST['adresseMail'])) {
      $sql=" DELETE from users where prenom ='".$_POST['adresseMail']."' "; 
          $resultat=$bdd->query($sql);

    //        while($donnees = $resultat->fetch())
    // {
    //         $_SESSION['nom']=$donnees['nom'];
    //   header('location:suppression2_inc_modele.php') ;
    //  }  
  
      
     }

  
        }

      
}
  
?>
