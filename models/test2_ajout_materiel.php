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
<!doctype html>
<html>
  <head>
    <style type="text/css">
  .bonjour { margin-left: 0px;color:#20c1bd; font-size : 17px;border-color: blue; }
  span{
    color: red;
    font-weight: bolder;
  }
</style>
   <?php include '../codes_vues/header_vue.php' ?>

    <title>Enregistrement d'un nouveau matériel</title>
   
    
  </head>
  <?php
    include('C:\wamp64\www\codePFE\models\connexionBD_model.php');
  ?>
  
  <body>
 <body style="margin-top: 0px ;background-color: gray;background-repeat:no-repeat;background-size: cover;">
<?php include '../codes_vues/hea.php' ?>
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
                <li>
                  <a><input type="button"  value ="Acceuil" class="btn btn-info" style="margin-left: 14%;margin-right: 2%;margin-top: 3%; border-color: red;width: 100px;" role="button" onclick="window.location.href='http://localhost/codePFE/controleurs/pageAcceuilAdmin_controleur'"></a>
                </li>
                  <li><a href="/codePFE/models/deconnexion_model.php" name="deconnexion" class="btn btn-outline-danger" style="color:black;margin-left: 75vw;border-color: red;" role="button">se deconnecter</a></li>
              </ul>

              </div>

      </div>
      </nav>

      <hr width="50%">
        <center><h3 style="font-weight: bold;color: black;font-size: 30px">Ajouter un nouveau matériel:</h3>
      <hr width="50%">            
        </center>
       <div class="container">
         <center>
         <form id="materiel-form" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" role="form" style="background:rgba(255,255,255,0.38);height:750px ;color: black">
                  <div class="container" style="margin-top: 6px;padding-top: 6%;margin-right: 0px;">
                    <table> 
                        <tr style="height: 55px;">
                            <td >
                                <label for="designation" <?php ?>><b>Désignation :<span>*</span></b></label>
                            </td>
                            <td 
                            >
                              <input type="text" name="designation"  placeholder="Désignation de matériel"  style="height: 36px; font-size: 17px;width: 100%" >
                            </td>
                            <td>
                                <label for="idFournisseur" style="padding-left: 7%;">Fournisseur :<span>*</span></label>
                              </td>
                              <td>
                                <select name="idFournisseur" id="idFournisseur" required style="height: 36px; font-size: 17px;width: 100%">
                                    <option value="">Sélectionnez le fournisseur </option>
                                    <?php
                                     include('C:\wamp64\www\codePFE\models\connexionBD_model.php');
                                        $rep=$bdd->query('SELECT * FROM `fournisseurs` ORDER BY `nomFournisseur` ');
                                      while ($donnees=$rep->fetch()) {
                                        echo 
                                        "<option value=".$donnees['idFournisseur'].">".$donnees['nomFournisseur']."</option>";
                                      }

                                    ?>
                                </select>
                              </td>
                          </tr>
                          <tr style="height: 55px;">
                            <td>
                              <label for="idMarque">Marque :<span>*</span></label>
                            </td>
                            <td>
                              <select onchange="selectchange()"  name="idMarque" id="idMarque" required style="height: 36px; font-size: 17px;width: 100%">
                                    <option value="">Sélectionnez la marque </option>
                                    <?php
                                     include('C:\wamp64\www\codePFE\models\connexionBD_model.php');
                                        $rep=$bdd->query('select * from marques order by Marque');
                                      while ($donnees=$rep->fetch()) {
                                        echo 
                                        "<option value=".$donnees['idMarque'].">".$donnees['Marque']."</option>";
                                      }

                                    ?>
                                </select>
                              </td>
                                <td>
                                  <label for="idModele" style="padding-left: 7%;">Modèle :<span>*</span></label>
                                </td>
                                <td>
                                  <select name="idModele" id="idModele" required style="height: 36px; font-size: 17px;width: 100%">
                                  <option value="" >Sélectionnez le modele </option>
                                    
                                </select>
                              </td>
                                
                          
                           </tr>
                           <tr style="height: 55px;">
                             <td>
                              <label for="idFamille">Famille :<span>*</span></label>
                            </td>
                            <td>
                              <select onchange="selectSousFamille()"  name="idFamille" id="idFamille" required style="height: 36px; font-size: 17px;width: 100%">
                                    <option value="">Sélectionnez la famille </option>
                                    <?php
                                     include('C:\wamp64\www\codePFE\models\connexionBD_model.php');
                                        $rep=$bdd->query('SELECT * FROM `familles` ORDER BY `familles`.`famille` ASC');
                                      while ($donnees=$rep->fetch()) {
                                        echo 
                                        "<option value=".$donnees['idFamille'].">".$donnees['famille']."</option>";
                                      }

                                    ?>
                                </select>
                              </td>
                                <td>
                                  <label for="idSousFamille" style="padding-left: 7%;">Sous famille :<span>*</span></label>
                                </td>
                                <td>
                                  <select name="idSousFamille" id="idSousFamille" required style="height: 36px; font-size: 17px;width: 100%">
                                  <option value="" >Séléctionnez la sous famille </option>
                                    
                                </select>
                              </td>
                           </tr>
                           <tr style="height: 55px;">
                              <td>
                                <label for="IdTypeLivraison" id="label_livraison" >Type d'acquésition :<span>*</span></label>
                              </td>
                              <td>
                                <select onchange="display_MB()" name="IdTypeLivraison" id="IdTypeLivraison" required style="height: 36px; font-size: 17px;width: 100%">
                                  <option value="">Sélectionnez le type </option>
                                    <?php
                                     include('C:\wamp64\www\codePFE\models\connexionBD_model.php');
                                        $rep=$bdd->query('SELECT * FROM `typelivraisons` ORDER BY `typeLivraison`');
                                      while ($donnees=$rep->fetch()) {
                                        echo 
                                        "<option value=".$donnees['IdTypeLivraison'].">".$donnees['typeLivraison']."</option>";
                                      }

                                    ?>
                                </select>
                              </td>
                              <td>
                                <label for="dateLivraison" style="padding-left: 7%;">Date de livraison :<span>*</span></label>
                              </td>
                              <td>
                                <input type="text" name="dateLivraison" id="dateLivraison" required placeholder="aaaa-mm-jj" style="height: 36px; font-size: 17px;width: 100%">
                              </td>
                            </tr>
                            <tr style="height: 55px;">
                              <td>
                                <label for="prixUnitaire">Prix unitaire (DH):</label>
                              </td>
                              <td>
                                <input type="text" name="prixUnitaire" id="prixUnitaire" placeholder="saisir le prix"  style="height: 36px; font-size: 17px;width: 100%">
                              </td>
                              <td>
                                <label for="quantiteLivree"  style="padding-left: 7%;"     >Quantité livrée :<span>*</span></label>
                              </td>
                              <td>
                                <input type="number" onchange="hideSerie()" name="quantiteLivree" id="quantiteLivree" placeholder="saisir la quantité" style="height: 36px; font-size: 17px;width: 100%">
                              </td>
                            </tr>
                            <tr style="height: 55px;">
                              <td>
                                <label for="numeroDeSerie" id="label_numeroDeSerie">Numéro de série :</label>
                            </td>
                            <td>
                              <input type="text" name="numeroDeSerie" id="numeroDeSerie"  placeholder="Numéro de série de matériel"  style="height: 36px; font-size: 17px;width: 100%" onkeyup="showSerie()">
                            </td>
                              <td>
                                
                              </td>
                              <td>
                                
                              </td>
                            </tr>
                            <tr style="height: 55px;" id="ligne1">
                              <td>
                                <label for="numeroAO" id="label_numeroAO">N° d'appel d'offre :</label>
                              </td>
                              <td>
                                <input type="text" name="numeroAO" id="numeroAO" placeholder="Numero AO"  style="height: 36px; font-size: 17px;width: 100%">
                              </td>
                              <td>
                                <label for="numeroMB" id="label_numeroMB" style="padding-left: 7%; ">Numéro de marché :</label>
                              </td>
                              <td>
                                <input type="text" name="numeroMB" id="numeroMB" placeholder="Numéro MB"  style="height: 36px; font-size: 17px;width: 100%; ">
                              </td>
                              
                         </tr>
                         <tr style="height: 55px;" id="ligne2">
                              <td>
                                <label for="numeroBL" id="label_numeroBL">Numéro de BL :</label>
                              </td>
                              <td>
                                <input type="text" name="numeroBL" id="numeroBL" placeholder="Numero BL"  style="height: 36px; font-size: 17px;width: 100%">
                              </td>
                               <td>
                                <label for="numeroLOT" id="label_numeroLOT" style="padding-left: 7%;">Numéro de LOT :</label>
                              </td>
                              <td>
                                <input type="text" name="numeroLOT" id="numeroLOT" placeholder="Numero LOT"  style="height: 36px; font-size: 17px;width: 100%">
                              </td>
                          </tr>
                          <tr style="height: 55px;">
                            <td><label for="essaiMiseService" >Essaie de mise en service:<span>*</span></label>
                              </td>
                              <td>
                                <center>
                                <input type="radio" name="essaiMiseService" id="essaiMiseService"  value="oui" required >Oui &nbsp; &nbsp;
                                <input type="radio" name="essaiMiseService" id="essaiMiseService"  value="non" required >Non 
                                </center>
                              </td>
                            <td>
                                <label for="etat" style="padding-left: 7%;">Etat de matériel :<span>*</span>  &nbsp; &nbsp;</label>
                            </td>
                            <td>
                              <center>
                              <input type="radio"  id="etat_stock" name="etat"  value="stocké" required style="color: black" onclick="stock_service()">En stock  &nbsp; &nbsp;
                                <input type="radio" id="etat_service" name="etat"  value="affecté" required style="color: black" onclick="stock_service()">En service
                              </center>
                            </td>
                            
                          </tr>
                          <tr style="height: 55px;" id="stock_level1">
                            <td>
                              <label for="idMagasin" id="label_idMagasin" >Nom de stock :<span>*</span> </label>
                            </td>
                            <td>
                              <select name="idMagasin" id="idMagasin" style="height: 36px; font-size: 17px;width: 100%;">
                                    <option value="">Sélectionnez votre choix </option>
                                    <?php
                                     include('C:\wamp64\www\codePFE\models\connexionBD_model.php');
                                      $answer=$bdd->query('select * from magasins order by nomMagasin');
                                      while ($datas=$answer->fetch()) {
                                        echo 
                                        "<option value=".$datas['idMagasin'].">".$datas['nomMagasin']."</option>";
                                      }

                                    ?>
                                </select>
                            </td>
                             <td>
                              <label for="level1" id="label_level1" style="padding-left: 7%;">Nom de service(niveau1):</label>
                            </td>
                            <td>
                              <select onchange="loadservice()"  name="level1" id="level1"  style="height: 36px; font-size: 17px;width: 100%;">
                                    <option value="">Sélectionnez votre choix </option>
                                    <?php
                                     include('C:\wamp64\www\codePFE\models\connexionBD_model.php');
                                      $repon=$bdd->query('select distinct niveau1 from affectations group by niveau1');
                                     while ($donnes=$repon->fetch()) {
                                        echo 
                                        "<option value=".$donnes['niveau1'].">".$donnes['niveau1']."</option>";
                                      }

                                    ?>
                                </select>
                              </td>
                                
                           </tr>
                           <tr style="height: 55px;" id="level2_level3">
                            <td>
                                  <label for="level2" id="label_level2">Nom de service(niveau2) :</label>
                                </td>
                                <td>
                                  <select name="level2" id="level2" onchange="loadservice3()" style="height: 36px; font-size: 17px;width: 100%;">
                                  <option value="" >Sélectionnez tout d'abord le niveau 1 </option>
                                    
                                </select>
                              </td>
                            <td>
                              <label for="idAffectation" id="label_level3" style="padding-left: 7%;">Nom de service(niveau3):</label>
                            </td>
                            <td>
                              <select name="idAffectation" id="idAffectation"  style="height: 36px; font-size: 17px;width: 100%;">
                                    <option value="">Sélectionnez tout d'abord le niveau 2</option>
                                    
                                </select>
                            </td>
                            
                          </tr>
                           <tr style="height: 55px;">
                            <td></td>
                            <td style="padding-left: 7%;">
                              <input type="submit" name="submit" value="Enregistrer" style="color: black;background: #4fb783;height: 35px;width: 150px; border-color: transparent;padding-left: 10%;font-weight: bold;">
                            </td>
                            <td></td>
                            <td style="padding-left: 7%;">
                              <input type="reset" name="reset" value="réinsérer" style="color: black;background:#f67280;height: 35px;width: 100px; border-color: transparent;margin-left: 10%;font-weight: bold;" >
                            </td>
                          </tr>
                          
                        </div>
                          
                          </div>
                      </table>
                  </form>
              <span>* :Ces champs sont obligatoires</span>
             </center>

    <dialog id="zeroDialog" >
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ;?>" id="serie_number"><table id="dialogTable">
      <tr><th></th><th></th></tr>
      <div id="tes">
        
      </div>
      <tr>
        <td><label for="numeroDeSerie" id="label_numeroDeSerie">Numéro de série :</label></td>
        <td><input type="text" name="numeroDeSerie2" id="numeroDeSerie2"  placeholder="Numéro de série de matériel"  style="height: 36px; font-size: 17px;width: 100%" onkeyup="showSerie()"></td>

      </tr>
      <td><label for="numeroDeSerie" id="label_numeroDeSerie">Numéro de série :</label></td>
      <td><input type="text" name="numeroDeSerie3" id="numeroDeSerie3"  placeholder="Numéro de série de matériel"  style="height: 36px; font-size: 17px;width: 100%" onkeyup="showSerie()"></td>
      <tr><td><div></div>&nbsp;&nbsp;</td><td><div>&nbsp;&nbsp;</div></td></tr>
      <tr>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button id="annule0" class="btn btn-sm btn-warning" type="reset" name="annule0" style="padding-left: 4%;">annuler</button></td>
        <td>&nbsp;&nbsp;<button type="submit" name="ajouterSerie" class="btn btn-sm btn-success" id="ajouterSerie" style="padding-left: 4%;">&nbsp;&nbsp;Enregistrer</button></td>
      </tr>
    </table>
   </form>
</dialog>

     </div>

  </body>
</html>
<script src="boot/js/jquery.min.js"></script>
 <script type="text/javascript">
        function hideSerie(){
          var qte=document.getElementById('quantiteLivree').value;
          
         if(qte==1){
          document.getElementById('label_numeroDeSerie').style.display='block';
        document.getElementById('numeroDeSerie').style.display='block';
         }
         else{
          document.getElementById('label_numeroDeSerie').style.display='none';
        document.getElementById('numeroDeSerie').style.display='none';
       /*$(function() {
        alert('test');
            $('#dialogTable').html('<tr><td><label>Numéro de série :</label></td><td><input type="text" placeholder="Numéro de série de matériel"  style="height: 36px; font-size: 17px;width: 100%" "></td></tr>');
        });*/
         (function() {
          var text=' <tr><td><label for="numeroDeSerie" id="label_numeroDeSerie">Numéro de série :</label></td><td><input type="text" name="numeroDeSerie2" id="numeroDeSerie2"  placeholder="Numéro de série de matériel"  style="height: 36px; font-size: 17px;width: 100%"></td></tr>'
          alert('test');
          document.getElementById('numeroDeSerie3').value=('2');
          for (var j = qte ; i >= 0; i--) {
            document.getElementById('tes').innerHTML=text;
          }
          
         })();

          (function() {
            
    
    var cancelButton = document.getElementById('annule0');
    document.getElementById('zeroDialog').showModal();
   

    // Bouton pour fermer la boîte de dialogue
    cancelButton.addEventListener('click', function() {
      document.getElementById('zeroDialog').close();
    });

  })();
        

      //if (qte>2) {}
       /*for (var i = qte; i >0; i--) {
         document.getElementById('zeroDialog').innerHTML="<?php //echo '<td><input type="text"></td>';?>"
       }*/

        /*$("#ajouterSerie").on("click",function(){
              alert('test');
        });*/

         }

        }
       /* fonction pour masquer l'input de numero de serie si quantite saisie>1
            $(document).ready(function(){
              $("#numeroDeSerie").change(function(){
                var estRempli=true;
                //$.each($("input[type='text']"),function(){
                  if($(this).val()!=1){
                    estRempli=false;
                  }
               // });
                $("#numeroDeSerie").show(estRempli);
              });
            });
*/
        window.onload= function(){
        document.getElementById('label_numeroDeSerie').style.display='none';
        document.getElementById('numeroDeSerie').style.display='none';
        document.getElementById('label_numeroMB').style.display='none';
        document.getElementById('numeroMB').style.display='none';
        document.getElementById('label_numeroAO').style.display='none';
        document.getElementById('numeroAO').style.display='none';
        document.getElementById('label_numeroBL').style.display='none';
        document.getElementById('numeroBL').style.display='none';
        document.getElementById('label_numeroLOT').style.display='none';
        document.getElementById('numeroLOT').style.display='none';
        document.getElementById('label_numeroMB').style.display='none';
        document.getElementById('label_idMagasin').style.display='none';
        document.getElementById('idMagasin').style.display='none';
        document.getElementById('label_level1').style.display='none';
        document.getElementById('level1').style.display='none';
        document.getElementById('label_level2').style.display='none';
        document.getElementById('level2').style.display='none';
        document.getElementById('label_level3').style.display='none';
        document.getElementById('idAffectation').style.display='none';
  }
      function display_MB(){
        if(document.getElementById('IdTypeLivraison').value=='M'){
         /* document.getElementById('ligne1').style.display='block';
          document.getElementById('ligne2').style.display='block';*/
          document.getElementById('label_numeroMB').style.display='block';
          document.getElementById('numeroMB').style.display='block';
          document.getElementById('label_numeroAO').style.display='block';
           document.getElementById('numeroAO').style.display='block';
           document.getElementById('label_numeroBL').style.display='block';
           document.getElementById('numeroBL').style.display='block';
           document.getElementById('label_numeroLOT').style.display='block';
           document.getElementById('numeroLOT').style.display='block';
        }
        else{
          /*document.getElementById('ligne1').style.display='none';
          document.getElementById('ligne2').style.display='none';*/
          document.getElementById('label_numeroMB').style.display='none';
           document.getElementById('numeroMB').style.display='none';
           document.getElementById('label_numeroAO').style.display='none';
           document.getElementById('numeroAO').style.display='none';
           document.getElementById('label_numeroBL').style.display='none';
           document.getElementById('numeroBL').style.display='none';
           document.getElementById('label_numeroLOT').style.display='none';
           document.getElementById('numeroLOT').style.display='none';
        }
      }
/*
        function showSerie(){
          if (document.getElementById('quantiteLivree').value==1 ) { 
        document.getElementById('numeroDeSerie').style.display='none'; 
        document.getElementById('label_numeroMB').style.display='none';
        //return;
    }
        }*/


      function stock_service(){
        //alert('test');
        if (document.getElementById('etat_stock').checked) {
        document.getElementById('label_idMagasin').style.display='block';
        document.getElementById('idMagasin').style.display='block';
        document.getElementById('label_level1').style.display='none';
        document.getElementById('level1').style.display='none';
        document.getElementById('label_level2').style.display='none';
        document.getElementById('level2').style.display='none';
        document.getElementById('label_level3').style.display='none';
        document.getElementById('idAffectation').style.display='none';
      }
      else
        if (document.getElementById('etat_service').checked) {
        document.getElementById('label_idMagasin').style.display='none';
        document.getElementById('idMagasin').style.display='none';
        document.getElementById('label_level1').style.display='block';
        document.getElementById('level1').style.display='block';
        document.getElementById('label_level2').style.display='block';
        document.getElementById('level2').style.display='block';
        document.getElementById('label_level3').style.display='block';
        document.getElementById('idAffectation').style.display='block';
      }
      }

      function selectchange()
      {
          
          var xhttp;
          var idmarque = document.getElementById('idMarque').value;
          xhttp=new XMLHttpRequest();
          xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              document.getElementById('idModele').innerHTML = xhttp.responseText;
            }
         };
          xhttp.open("GET", "modeles.php?idMarque="+idmarque, true);
          xhttp.send();
        
      }
      function selectSousFamille()
      {
          
          var xhttp;
          var idFamille = document.getElementById('idFamille').value;
          xhttp=new XMLHttpRequest();
          xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              document.getElementById('idSousFamille').innerHTML = xhttp.responseText;
            }
         };
          xhttp.open("GET", "sousFamille.php?idFamille="+idFamille, true);
          xhttp.send();
        
      }
      function loadservice()
      {
          
          var xhttp;
          var level1 = document.getElementById('level1').value;
          xhttp=new XMLHttpRequest();
          xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              document.getElementById('level2').innerHTML = xhttp.responseText;
            }
         };
          xhttp.open("GET", "service_niveau2.php?niveau1="+'"'+level1+'"', true);
          xhttp.send();
        
      }
      function loadservice3()
      {
          
          var xhttp;
          var level2 = document.getElementById('level2').value;
          xhttp=new XMLHttpRequest();
          xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              document.getElementById('idAffectation').innerHTML = xhttp.responseText;
            }
         };
          xhttp.open("GET", "service_niveau3.php?niveau2="+'"'+level2+'"', true);
          xhttp.send();
        
      }/*
     (function() {            
           var cancelButton = document.getElementById('annule0'); 
           document.getElementById('zeroDialog').showModal();              
           cancelButton.addEventListener('click', function() {
           document.getElementById('zeroDialog').close();
        });

      })();*/
      
    </script>
    <?php
    if (isset($_POST['ajouterSerie'])) {
      include('C:\wamp64\www\codePFE\models\connexionBD_model.php');
      echo $_POST['numeroDeSerie2'];
       echo $_POST['numeroDeSerie3'];
    }
?>
   <?php
    if ($_SERVER["REQUEST_METHOD"]=="POST") {
      if(isset($_POST['submit']) && !empty($_POST['submit'])){
        include('C:\wamp64\www\codePFE\models\connexionBD_model.php');
        $designation= $_POST['designation']; $idFournisseur=$_POST['idFournisseur'];
        $idMarque= $_POST['idMarque'];$idModele= $_POST['idModele'];
        $idFamille= $_POST['idFamille'];$idSousFamille= $_POST['idSousFamille'];
        $IdTypeLivraison= $_POST['IdTypeLivraison'];$dateLivraison= $_POST['dateLivraison'];
        $prixUnitaire= $_POST['prixUnitaire'];$quantiteLivree= $_POST['quantiteLivree'];
        
        $numeroAO= $_POST['numeroAO'];$numeroMB= $_POST['numeroMB'];
        $numeroBL= $_POST['numeroBL'];$numeroLOT= $_POST['numeroLOT'];
        $essaiMiseService= $_POST['essaiMiseService'];$etat= $_POST['etat'];
        $idMagasin= $_POST['idMagasin'];
        if(empty($_POST['prixUnitaire']))
          $prixUnitaire=NULL;
        if(empty($_POST['numeroMB']))
          $numeroMB='NULL';
        if(empty($_POST['numeroAO']))
          $numeroAO='NULL';
        if(empty($_POST['numeroLOT']))
          $numeroLOT='NULL';
        if(empty($_POST['numeroBL']))
          $numeroBL='NULL';
        if(empty($_POST['idMagasin']))
          $idMagasin=NULL;
        
          $rep=$bdd->prepare('INSERT INTO `livraisons` (`idFournisseur`,`IdTypeLivraison`,`dateLivraison`,`quantiteLivree`,`prixUnitaire`,`numeroMB`,`numeroAO`,`numeroLOT`,`numeroBL`) values(:idFournisseur,:IdTypeLivraison,:dateLivraison,:quantiteLivree,:prixUnitaire,:numeroMB,:numeroAO,:numeroLOT,:numeroBL)');

    $rep->execute(array(
    'idFournisseur'=>$idFournisseur,
    'IdTypeLivraison'=>$IdTypeLivraison,
    'dateLivraison'=>$dateLivraison,
    'quantiteLivree'=>$quantiteLivree,
    'prixUnitaire'=>$prixUnitaire,
    'numeroMB'=>$numeroMB,
    'numeroAO'=>$numeroAO,
    'numeroLOT'=>$numeroLOT,
    'numeroBL'=>$numeroBL
    ));
    $idLivraison = $bdd->lastInsertId();

     if($idFamille==3){
      $famille_abr='MT';
    }
    
    else
      if($idFamille==5){
        $famille_abr='T';
      }
    
    else
      if($idFamille==7){
        $famille_abr='MI';
      }
    else{
         $famille_abr='autre';
    }
    // si quantite livree > 1
    if ($quantiteLivree==1) { 
     $numeroDeSerie= $_POST['numeroDeSerie'];
     if(empty($_POST['numeroDeSerie']))
          $numeroDeSerie=NULL;
        //test si le numero de erie est deja exist
        $sql5 ="SELECT * FROM materiels where numeroDeSerie='".$_POST['numeroDeSerie']."'";
   
        $resultat5 =$bdd->query($sql5) ;
        if($datas=$resultat5->fetch()){
                  ?>
             <script>
                alert("Ce numero de serie existe deja, Veuillez verifiet votre numero de serie!");
              </script>    ';
            <?php 
        }

else{

    $numeroInventaire=$famille_abr.'-'.date('Y', strtotime($dateLivraison)).'-'.date('m', strtotime($dateLivraison));
     $answ=$bdd->prepare('INSERT INTO `materiels` (`idMagasin`,`idModele`,`idLivraison`,`idSousFamille`,`numeroInventaire`,`numeroDeSerie`,`designation`,`materiels`.`etat`,`essaiMiseService`)
      VALUES (?,?,?,?,?,?,?,?,?)');
     $answ->execute([$idMagasin, $idModele, $idLivraison, $idSousFamille,$numeroInventaire,$numeroDeSerie,$designation,$etat,$essaiMiseService]);
      

     $lastIdInventaire=$bdd->lastInsertId();
        //echo $lastIdInventaire;
        $newInventaireNum=$numeroInventaire."-".$lastIdInventaire;
        //echo $newInventaireNum;
        $stmt = $bdd->prepare('UPDATE `materiels` SET `numeroInventaire`="'.$newInventaireNum.'" where `idMateriel`="'.$lastIdInventaire.'"');
        $stmt->execute();
        echo "<script>
              alert('validé!')
        </script>";
        }// fin else
}//fin test quantite =1
   else{// quantite>1

  }   // fin else quantite>1        

          }    // fin if post submit
         /* else{
            if (isset($_POST['ajouterSerie'])) {
             echo $_POST['ajouterSerie'];
            }
          }*/
    }//fin de test $_SERVER["REQUEST_METHOD"]
   ?>
  