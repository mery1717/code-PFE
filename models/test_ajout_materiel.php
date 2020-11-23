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
</style>
   <?php include '../codes_vues/header_vue.php' ?>

    <title>Enregistrement d'un nouveau matériel</title>
   
    
  </head>
  <?php
    include('connexionBD_model.php');
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
        <form id="materiel-form" method="post" action="" role="form" style="background:rgba(255,255,255,0.38);height:750px ;color: black">
                  <div class="container" style="margin-top: 6px;padding-top: 6%;margin-right: 0px;">
                    <table> 
                        <tr style="height: 55px;">
                            <td >
                                <label for="designation" ><b>Désignation :</b></label>
                            </td>
                            <td 
                            >
                              <input type="text" name="designation"  placeholder="Désignation de matériel" required style="height: 36px; font-size: 17px;width: 100%" >
                            </td>
                            <td>
                                <label for="numeroDeSerie"  style="padding-left: 7%;padding-bottom: 3px;font-weight: bold;">Numéro de série :</label>
                            </td>
                            <td>
                              <input type="text" name="numeroDeSerie" id="numeroDeSerie"  placeholder="Numéro de série de matériel" required style="height: 36px; font-size: 17px;width: 100%">
                            </td>
                          </tr>
                          <tr style="height: 55px;">
                            <td>
                              <label for="idMarque">Marque :</label>
                            </td>
                            <td>
                              <select onchange="selectchange()"  name="idMarque" id="idMarque" required style="height: 36px; font-size: 17px;width: 100%">
                                    <option value="">Sélectionnez la marque </option>
                                    <?php
                                     include('connexionBD_model.php');
                                        $rep=$bdd->query('select * from marques order by Marque');
                                      while ($donnees=$rep->fetch()) {
                                        echo 
                                        "<option value=".$donnees['idMarque'].">".$donnees['Marque']."</option>";
                                      }

                                    ?>
                                </select>
                              </td>
                                <td>
                                  <label for="idModele" style="padding-left: 7%;">Modèle :</label>
                                </td>
                                <td>
                                  <select name="idModele" id="idModele" required style="height: 36px; font-size: 17px;width: 100%">
                                  <option value="" >Sélectionnez le modele </option>
                                    
                                </select>
                              </td>
                                
                          
                           </tr>
                           <tr style="height: 55px;">
                              <td>
                                <label for="idFamille">Famille :</label>
                              </td>
                              <td>
                                <select onchange="selectSousFamille()"  name="idFamille" id="idFamille" required style="height: 36px; font-size: 17px;width: 100%">
                                    <option value="">Sélectionnez la Famille </option>
                                    <?php
                                     include('connexionBD_model.php');
                                        $rep=$bdd->query('select * from familles order by Famille');
                                      while ($donnees=$rep->fetch()) {
                                        echo 
                                        "<option value=".$donnees['idFamille'].">".$donnees['famille']."</option>";
                                      }
                                       // $nomFamille=$donnees['famille'];
                                    ?>
                                </select>
                              </td>
                              <td>
                                <label for="idSousFamille"  style="padding-left: 7%;">Sous famille :</label>
                              </td>
                              <td>
                                <select name="idSousFamille" id="idSousFamille" required style="height: 36px; font-size: 17px;width: 100%">
                                  <option value="">Sélectionnez la sous famille </option>
                                    
                                </select>
                              </td>
                                
                           </tr>
                           <tr style="height: 55px;">
                              <td>
                                <label for="idFournisseur">Fournisseur :</label>
                              </td>
                              <td>
                                <select name="idFournisseur" id="idFournisseur" required style="height: 36px; font-size: 17px;width: 100%">
                                    <option value="">Sélectionnez le fournisseur </option>
                                    <?php
                                     include('connexionBD_model.php');
                                        $rep=$bdd->query('SELECT * FROM `fournisseurs` ORDER BY `nomFournisseur` ');
                                      while ($donnees=$rep->fetch()) {
                                        echo 
                                        "<option value=".$donnees['idFournisseur'].">".$donnees['nomFournisseur']."</option>";
                                      }

                                    ?>
                                </select>
                              </td>
                              <td>
                                <label for="IdTypeLivraison" style="padding-left: 7%;">Type livraison :</label>
                              </td>
                              <td>
                                <select name="IdTypeLivraison" id="IdTypeLivraison" required style="height: 36px; font-size: 17px;width: 100%">
                                  <option value="">Sélectionnez le type </option>
                                    <?php
                                     include('connexionBD_model.php');
                                        $rep=$bdd->query('SELECT * FROM `typelivraisons` ORDER BY `typeLivraison`');
                                      while ($donnees=$rep->fetch()) {
                                        echo 
                                        "<option value=".$donnees['IdTypeLivraison'].">".$donnees['typeLivraison']."</option>";
                                      }

                                    ?>
                                </select>
                              </td>
                            </tr>
                            <tr style="height: 55px;">
                              <td>
                                <label for="dateLivraison">Date de livraison :</label>
                              </td>
                              <td>
                                <input type="text" name="dateLivraison" id="dateLivraison" required placeholder="aaaa-mm-jj" style="height: 36px; font-size: 17px;width: 100%">
                              </td>
                              <td>
                                <label for="quantiteLivree"  style="padding-left: 7%;"     >Quantité livrée :</label>
                              </td>
                              <td>
                                <input type="text" name="quantiteLivree" id="quantiteLivree" placeholder="saisir quantité" style="height: 36px; font-size: 17px;width: 100%">
                              </td>
                            </tr>
                            <tr style="height: 55px;">
                              <td>
                                <label for="prixUnitaire">Prix unitaire (DH):</label>
                              </td>
                              <td>
                                <input type="text" name="prixUnitaire" id="prixUnitaire" placeholder="saisir le prix" required style="height: 36px; font-size: 17px;width: 100%">
                              </td>
                              <td>
                                <label for="numeroMB"  style="padding-left: 7%;">Numéro MB :</label>
                              </td>
                              <td>
                                <input type="text" name="numeroMB" id="numeroMB" placeholder="Numéro MB" required style="height: 36px; font-size: 17px;width: 100%">
                              </td>
                            </tr>
                            <tr style="height: 55px;">
                              <td>
                                <label for="numeroAO">Numéro AO :</label>
                              </td>
                              <td>
                                <input type="text" name="numeroAO" id="numeroAO" placeholder="Numero AO" required style="height: 36px; font-size: 17px;width: 100%">
                              </td>
                              <td>
                                <label for="numeroLOT"  style="padding-left: 7%;">Numéro LOT :</label>
                              </td>
                              <td>
                                <input type="text" name="numeroLOT" id="numeroLOT" placeholder="Numero LOT" required style="height: 36px; font-size: 17px;width: 100%">
                              </td>
                         </tr>
                         <tr style="height: 55px;">
                              <td>
                                <label for="numeroBL">Numéro BL :</label>
                              </td>
                              <td>
                                <input type="text" name="numeroBL" id="numeroBL" placeholder="Numero BL" required style="height: 36px; font-size: 17px;width: 100%">
                              </td>
                              <td><label for="essaiMiseService" style="padding-left: 7%;">Essaie de mise en service:</label>
                              </td>
                              <td>
                                <center>
                                <input type="radio" name="essaiMiseService" id="essaiMiseService"  value="oui" required >Oui &nbsp; &nbsp;
                                <input type="radio" name="essaiMiseService" id="essaiMiseService"  value="non" required >Non 
                                </center>
                              </td>
                          </tr>
                          <tr style="height: 55px;">
                            <td>
                                <label for="etat">Etat de matériel (fourniture):  &nbsp; &nbsp;</label>
                            </td>
                            <td>
                              <center>
                              <input type="radio" id="etat" name="etat"  value="stocké" required style="color: black">En stock  &nbsp; &nbsp;
                                <input type="radio" id="etat" name="etat"  value="affecté" required style="color: black">En service
                              </center>
                            </td>
                            <td>
                              <label for="idMagasin" style="padding-left: 7%;">Nom de stock : </label>
                            </td>
                            <td>
                              <select name="idMagasin" id="idMagasin" style="height: 36px; font-size: 17px;width: 100%">
                                    <option value="">Sélectionnez votre choix </option>
                                    <?php
                                     include('connexionBD_model.php');
                                      $answer=$bdd->query('select * from magasins order by nomMagasin');
                                      while ($datas=$answer->fetch()) {
                                        echo 
                                        "<option value=".$datas['idMagasin'].">".$datas['nomMagasin']."</option>";
                                      }

                                    ?>
                                </select>
                            </td>
                          </tr>
                          <tr style="height: 55px;">
                            <td>
                                <label for="level1">Nom de service(niveau1) :</label>
                            </td>
                            <td>
                              <select name="level1" id="level1" onchange="loadservice()" style="height: 36px; font-size: 17px;width: 100%">
                                    <option value="">Sélectionnez votre choix </option>
                                    <?php
                                     include('connexionBD_model.php');
                                      $repon=$bdd->query('select distinct niveau1 from affectations group by niveau1');
                                     while ($donnes=$repon->fetch()) {
                                        echo 
                                        "<option value=".$donnes['niveau1'].">".$donnes['niveau1']."</option>";
                                      }

                                    ?>
                                </select>
                            </td>
                            <td>
                              <label for="level2" style="padding-left: 7%;">Nom de service(niveau2)</label>
                            </td>
                            <td>
                              <select name="level2" id="level2" onchange="loadservice3()" style="height: 36px; font-size: 17px;width: 100%">
                                    <option value="">Sélectionnez tout d'abord le niveau 1</option>
                                    
                                </select>
                            </td>
                          </tr>
                          <tr style="height: 55px;">
                            <td>
                              <label for="idAffectation">Nom de service(niveau3)</label>
                            </td>
                            <td>
                              <select name="idAffectation" id="idAffectation" # style="height: 36px; font-size: 17px;width: 100%">
                                    <option value="">Sélectionnez tout d'abord le niveau 2</option>
                                    
                                </select>
                            </td>
                            
                          </tr>
                        <div class="">
                            
                            <!--
                            <div class="col-md-6">
                                <label for="level1">Nom de service(niveau1) :</label><br>
                                <select onchange="loadservice()" name="level1" id="level1" >
                                    <option value="">Sélectionnez votre choix  </option>
                                        <?php
                                     //include('connexionBD_model.php');
                                      //$repon=$bdd->query('select distinct niveau1 from affectations group by niveau1');
                                     // while ($donnes=$repon->fetch()) {
                                       // echo 
                                        //"<option value=".$donnes['niveau1'].">".$donnes['niveau1']."</option>";
                                      //}

                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="level2">Nom de service(niveau2) :</label><br>
                                <select onchange="loadservice3()" name="level2" id="level2" >
                                    <option value="">Sélectionnez votre choix </option>
                                    
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="idAffectation">Nom de service(niveau3) :</label><br>
                                <select name="idAffectation" id="idAffectation" >
                                    <option value="">Sélectionnez votre choix  </option>
                                      
                                </select>
                            </div>-->
                        </div>
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
                      </table>
                  </form>
              
             </center>
     </div>

     <script type="text/javascript">

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

      function loadservice()
      {
          
          var http;
          var niveau_1 = document.getElementById('level1').value;
          http=new XMLHttpRequest();
          http.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              document.getElementById('level2').innerHTML = http.responseText;
            }
         };
          http.open("GET", "service_niveau2.php?niveau1="+'"'+niveau_1+'"', true);
          http.send();
        
      }

      function loadservice3()
      {
          
          var mhttp;
          var niveau_2 = document.getElementById('level2').value;
          mhttp=new XMLHttpRequest();
          mhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              document.getElementById('idAffectation').innerHTML = mhttp.responseText;
            }
         };
          mhttp.open("GET", "service_niveau3.php?niveau2="+'"'+niveau_2+'"', true);
          mhttp.send();
        
      }

      function selectSousFamille()
      { 
          
          var vhttp;
          var famille_id = document.getElementById('idFamille').value;
          vhttp=new XMLHttpRequest();
          vhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              document.getElementById('idSousFamille').innerHTML = vhttp.responseText;
            }
         };
          vhttp.open("GET", "sousFamille.php?idFamille="+famille_id, true);
          vhttp.send();
        
      }
    
    </script>


    <?php  
    //print_r($_POST);
     if(isset($_POST['submit']) && !empty($_POST['submit'])){
        //connexion au serveur et a la base de donnees
       include('connexionBD_model.php');
        //echo "if test works";
        
    $designation=$_POST['designation'];
    $numeroDeSerie=$_POST['numeroDeSerie'];
    $idMarque=$_POST['idMarque'];
    $idModele=$_POST['idModele'];
    $idFamille=$_POST['idFamille'];
    $idSousFamille=$_POST['idSousFamille'];
    $idFournisseur=$_POST['idFournisseur'];
    $IdTypeLivraison=$_POST['IdTypeLivraison'];
    $dateLivraison=$_POST['dateLivraison'];
    $quantiteLivree=$_POST['quantiteLivree'];
    $prixUnitaire=$_POST['prixUnitaire'];
    $numeroMB=$_POST['numeroMB'];
    $numeroAO=$_POST['numeroAO'];
    $numeroLOT=$_POST['numeroLOT'];
    $numeroBL=$_POST['numeroBL'];
    $etat=$_POST['etat'];
    $essaiMiseService=$_POST['essaiMiseService'];
    $idMagasin=$_POST['idMagasin'];
    //$idAffectation=$_POST['idAffectation'];
    
    //requete d'insertion dans la table livraison
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
     echo $idLivraison;

     if($idFamille==3){
      $famille_abr='MT';
    }
    else
      if($idFamille==4){
        $famille_abr='MH';
      }
    else
      if($idFamille==5){
        $famille_abr='T';
      }
    else
      if($idFamille==6){
        $famille_abr='MB';
      }
    else
      if($idFamille==7){
        $famille_abr='MI';
      }
    else{
         $famille_abr='autre';
    }


     //echo $idLivraison;
     //requete d'insertion dans la table materiel
    $numeroInventaire=$famille_abr.date('Y', strtotime($dateLivraison));
     $answ=$bdd->prepare('INSERT INTO `materiels` (`idMagasin`,`idModele`,`idLivraison`,`idSousFamille`,`numeroInventaire`,`numeroDeSerie`,`designation`,`etat`,`essaiMiseService`)
      VALUES (?,?,?,?,?,?,?,?,?)');
     $answ->execute([$idMagasin, $idModele, $idLivraison, $idSousFamille,$numeroInventaire,$numeroDeSerie,$designation,$etat,$essaiMiseService]);
      /*values(:idMagasin,:idModele,:idLivraison,:idSousFamille,:numeroInventaire,:numeroDeSerie,:designation,:etat,:essaiMiseService)'/*);
     //$lastIdInventaire=$bdd->lastInsertId();
     
     $answ->execute(array(
        'idMagasin'=>$idMagasin,
        'idModele'=>$idModele,
        'idLivraison'=>$idLivraison,
        'idSousFamille'=>$idSousFamille,
        'numeroInventaire'=>$famille_abr.date('Y', strtotime($dateLivraison)),//.$lastIdInventaire,
        'numeroDeSerie'=>$numeroDeSerie,
        'designation'=>$designation,
        'etat'=>$etat,
        'essaiMiseService'=>$essaiMiseService
        

     ));*/

     $lastIdInventaire=$bdd->lastInsertId();
        echo $lastIdInventaire;
        $newInventaireNum=$famille_abr."_".date('Y', strtotime($dateLivraison))."_".$lastIdInventaire;
        //echo $newInventaireNum;
        $stmt = $bdd->prepare('UPDATE `materiels` SET `numeroInventaire`="'.$newInventaireNum.'" where `idMateriel`="'.$lastIdInventaire.'"');
        $stmt->execute();
       /* $lastIdInventaire=$bdd->lastInsertId();
        if(!empty($_POST['level1'])){
        //requete d'insertion dans la table affectation_materiels
        $repo=$bdd->prepare('INSERT INTO `affectation_materiels` (`idAffectation`,`idMateriel`,`dateAffectation`) values(:idAffectation,:idMateriel,:dateAffectation`)');
        $repo->execute(array(
          'idAffectation'=>$_POST['idAffectation'];
          'idMateriel'=>$lastIdInventaire,
          'dateAffectation'=>NOW()
        ));}*/
        echo $idMagasin;
        echo $idModele;
        echo $idLivraison;
        echo $idSousFamille; 
        echo $numeroInventaire;
        echo $numeroDeSerie;
        echo $designation;
        echo $etat;
        echo$essaiMiseService;
        echo $newInventaireNum;
        echo '<script> alert("Vous avez bien ajouter le nouveau materiel"); </script>';
      
      
  }
  else{
    echo "if test not working :(";
  }
  
  ?>

  </body>
</html>