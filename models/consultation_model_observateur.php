 <?php
 session_start() ;
  if(!isset($_SESSION['Utilisateur'])) { ?>
  <SCRIPT LANGUAGE="JavaScript">
history.forward()
</SCRIPT>
<?php
}
?>
<html><head>
   <?php  include 'C:\wamp64\www\CodePFE\codes_vues\header_vue.php'; ?>
<meta charset="utf-8" />
<title>Consultation</title>
<style>
.container{margin-left: 20%;}
     .bonjour { margin-left: 0px;color:#20c1bd; font-size : 17px;border-color: blue; }
     body{
overflow: scroll;
margin: 0;
padding: 0;
}

</style>
</head>

<body  onmousemove="temps=0" onload='time_out();' style="margin-top: 0px ;background-image: url(../images/blog.jpg);background-repeat:no-repeat;background-size: cover;">
   <?php include('C:\wamp64\www\codePFE\models\connexionBD_model.php'); ?>
 <?php
 include 'C:\wamp64\www\CodePFE\codes_vues\hea.php'; ?>
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
        <hr width="50%"> <center> <h2 style="font-family: arial;color: white;">Recherchez un materiel</h2></center> 
   <hr width="50%">  

        <div class="container" style="margin-left: 10%">
    <form name='myForm' id='myForm' method='post' style="height:550px;background-color:rgba(255,255,255,0.10);" action='http://localhost/codePFE/models/consultation_resultat_observateur.php'> 
      <table> 
        <tr> 
          <td>
           <h3 style="color: white;font-size: 21px;">numéro d'inventaire :</h3> 
          </td>
          <td> 
            <input type='text' name='numeroInventaire' style="height: 36px; font-size: 17px;width: 100%" id='numeroInventaire'/> 
          </td>
          <td> 
             <h3 style="color:white;font-size: 21px;padding-left: 10%;">Essaie Mise en service :</h3> 
          </td>
          <td style="width: 300px;"> 
            <select name='etat' style="height: 34px; font-size: 17px;width:100%">
              <option value=''>Selectionnez votre choix</option>
              <option value='stocke'>Stocké</option>
              <option value='affecte'>Affecté</option>
            </select>
          </td>
        </tr>
         <tr>
          <td >
           <h3 style="color:white;font-size: 21px;"> Désignation :</h3> 
          </td>
          <td> 
            <input type='text' name='designation' id='designation' style="height: 36px; font-size: 17px;width: 100%" /> 
          </td>

          <td> 
            <h3 style="color: white;font-size: 21px;padding-left: 10%;">Famille : </h3>
          </td>
          <td> 
            <select onchange='selectSousFamille()' name='familleSelectionee' style="height: 36px; font-size: 17px;width: 100%"  id='familleSelectionee'>
              <option value=''class='center'>=====Familles=====</option>
                 <?php
                  $sql= 'SELECT * FROM familles' ;
                $resultat=$bdd->query($sql);
                while($donnees = $resultat->fetch())
                {
               
                echo "<option value=".$donnees['idFamille']." name='selectionFamille'>".$donnees['famille']."</option>";
                 } ?>
            </select>
          </td> 
           </tr>  
        <tr>
          <td> 
            <h3 style="color: white;font-size: 21px;"> Marque :</h3> 
          </td>
          <td> 
            <select onchange ='selectchange()'name='marqueSelectionee' style="height: 36px; font-size: 17px;width: 100%" id='marqueSelectionee'>
              <option value='' class='center'>=====Marques=====</option>
                 <?php 
                 $sql= 'SELECT * FROM marques order by Marque' ;
                 $resultat=$bdd->query($sql);
                 while($donnees = $resultat->fetch())
                      { 
                     
                    echo"<option value=".$donnees['idMarque'].">".$donnees['Marque']."</option>";           
                  } ?>
                       
            </select> 
          </td>
          
          <td>
             <h3 style="color: white;font-size: 21px;padding-left: 10%;"> Sous famille : </h3>
          </td>
          <td> 
            <select name='sousFamilleSelectionee' style="height: 36px; font-size: 17px;width: 100%" id='sousFamilleSelectionee'>
              <option value='' class='center'>=====sous Familles=====</option>" ;
            </select> </td>
        </tr>
        <tr>
          <td> 
             <h3 style="color: white;font-size: 21px;">Modele : </h3>
          </td>
          <td> 
            <select  name='modeleSelectione'  style="height: 36px; font-size: 17px;width: 100%" id='modeleSelectione'>
              <option value='' class='center'>=====Modeles=====</option>

            </select> 
          </td>
           <td> 
            <h3 style="color: white;font-size: 21px;padding-left: 10%;">lieu de stockage : </h3>
          </td>
          <td> 
            <select name='magasinSelectionee' style="height: 36px; font-size: 17px;width: 100%" id='magasin'>
              <option value='' class='center'>=====Lieux de stockage =====</option>
              <?php  
                $sql= 'SELECT * FROM magasins' ;
                $resultat=$bdd->query($sql);
                while($donnees = $resultat->fetch())
                {       
                echo "<option value=".$donnees['idMagasin']." name='selectionMagasin'>".$donnees['nomMagasin']."</option>";
                 }?>
            </select>
          </td> 
        </tr>
        <tr>
          <td> 
            <h3 style="color:white;font-size: 21px;">Fournisseur: </h3>
          </td>
          <td> 
            <select name='fournisseurSelectionne' style="height: 36px; font-size: 17px;width: 100%" id='magasin'>
              <option value='' class='center'>=====Fournisseur=====</option>
                <?php  
                    $sql= 'SELECT * FROM fournisseurs' ;
                    $resultat=$bdd->query($sql);
                    while($donnees = $resultat->fetch())
                    {      
                    echo "<option value=".$donnees['idFournisseur']." name='selectionFournisseur'>".$donnees['nomFournisseur']."</option>";
                     }?>
            </select>
          </td>
          <td > 
           <h3 style="color: white;font-size: 21px;padding-left: 10%;"> Niveau1 d'affectation : </h3>
          </td>
          <td> 
            <select onchange='loadservice()' name='affectationSelectionee1' style="height: 36px; font-size: 17px;width: 100%" id='affectation1'>
              <option value='' class='center'>=====Lieux d'affectation=====</option>" ;
                <?php
                    $sql= 'SELECT DISTINCT niveau1  FROM affectations' ;
                    $resultat=$bdd->query($sql);
                    while($donnees = $resultat->fetch())
                    {
                   
                    echo "<option value=".$donnees['niveau1']." name='selectionAffectation'>".$donnees['niveau1']."</option>";
                     } ?>           
            </select> 
          </td>
        </tr>   
        <tr>
          <td> 
            <h3 style="color: white;font-size: 21px;">Type d'acquésition :</h3> 
          </td>
          <td> 
            <select name='typeAchatSelectione' style="height: 36px; font-size: 17px;width: 100%" id='typeAchat'>
              <option value='' class='center'>=====Types d'achat=====</option>
                <?php
                    $sql= 'SELECT * FROM typeLivraisons' ;
                    $resultat=$bdd->query($sql);
                    while($donnees = $resultat->fetch())
                    {                  
                    echo "<option value=".$donnees['IdTypeLivraison']." name='selectionTypeAchat'>".$donnees['typeLivraison']."</option>";
                    }?>
            </select> 
          </td>
          <td>
            <h3 style="color: white;font-size: 21px;padding-left: 10%;">Niveau2 affectation: </h3>
          </td>
          <td> 
            <select  onchange='loadservice3()' name='affectationSelectionee2'  style="height: 36px; font-size: 17px;width: 100%" id='affectation2'>
              <option value='' class='center'>=====Niveau2=====</option>
            </select> 
          </td>
        </tr>
        <tr> 
          <td> 
           <h3 style="color:white;font-size: 21px;"> DateLivraison : </h3>
          </td>
          <td> 
            <input type='date' name='date' id='date' style="height: 36px; font-size: 17px;width: 100%"/>
          </td>
          <td> 
            <h3 style="color: white;font-size: 21px;padding-left: 10%;">Niveau3 affectation:</h3> 
          </td>
          <td> 
            <select name='affectationSelectionee3' style="height: 36px; font-size: 17px;width: 100%" id='affectation3'>
              <option value=''class='center'>=====Niveau3=====</option>"
            </select>
          </td>
        </tr>
        <tr>
          <td>
           <h3 style="color: white;font-size: 21px;"> Essai de mise en service : </h3>
          </td>
          <td>
            <select name='essai' style="height: 36px; font-size: 17px;width: 100%" >
              <option value=''>Selectionnez votre choix</option>
              <option value='oui' style="color: white;font-size: 21px;">Oui</option>
              <option value='non' style="color: white;font-size: 21px;">Non</option>
            </select> 
          </td>
          <td>
            <h3 style="color: white;font-size: 21px;padding-left: 10%;">N° d'appel d'offre : </h3>
          </td>
          <td>
            <input type='text' name='numeroAO' id='numeroAO'style="height: 36px; font-size: 17px;width: 100%" />
          </td>
        </tr>   
         <tr>
          <td> </td>
          <td style="padding-top: 2%;">
            <input type='submit' name='rechercher' id='rechercher' style="color: white;background: #65daf7;height: 35px;width: 100%; border-color: transparent;font-weight: bold;" value='Rechercher'/> 
          </td>
          <td style="padding-top: 2%;"> 
            <input type='reset' name='vider' id='vider' style="color: white;background: #e95280;height: 35px;width: 90%;margin-left:10%; border-color:transparent;font-weight: bold;" value='Vider les champs'/>
          </td>
        </tr>
      </table>
    </form>
 </div>
      
      <script type="text/javascript">

      function selectchange()
      {
          
          var xhttp;
          var idmarque = document.getElementById('marqueSelectionee').value;
          xhttp=new XMLHttpRequest();
          xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              document.getElementById('modeleSelectione').innerHTML = xhttp.responseText;
            }
         };
          xhttp.open("GET", "/codePFE/models/modeles.php?idMarque="+idmarque , true);
          xhttp.send();
        
      }

       function loadservice()
      {
          
          var http;
          var niveau_1 = document.getElementById('affectation1').value;
          http=new XMLHttpRequest();
          http.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              document.getElementById('affectation2').innerHTML = http.responseText;
            }
         };
          http.open("GET", "/codePFE/models/service_niveau2.php?niveau1="+'"'+niveau_1+'"', true);
          http.send();
        
      }

      function loadservice3()
      {
          
          var mhttp;
          var niveau_2 = document.getElementById('affectation2').value;
          mhttp=new XMLHttpRequest();
          mhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              document.getElementById('affectation3').innerHTML = mhttp.responseText;
            }
         };
          mhttp.open("GET", "/codePFE/models/service_niveau3.php?niveau2="+'"'+niveau_2+'"', true);
          mhttp.send();
        
      }

      function selectSousFamille()
      { 
          
          var vhttp;
          var famille_id = document.getElementById('familleSelectionee').value;
          vhttp=new XMLHttpRequest();
          vhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              document.getElementById('sousFamilleSelectionee').innerHTML = vhttp.responseText;
            }
         };
          vhttp.open("GET", "/codePFE/models/sousFamille.php?idFamille="+famille_id, true);
          vhttp.send();
        
      }
        var temps=0;
       function time_out()
{
       if(temps < 244)
      temps++;
      else
    location.href = "/codePFE/models/deconnexion_model.php";

setTimeout('time_out()',240)
}


    </script>
      <?php
    if(isset($_POST['rechercher'])){
      header("location:'consultation_resultat_observateur.php'") ;
    }

echo "</body>" ;
?>
