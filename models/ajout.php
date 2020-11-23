
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
        <form id="materiel-form" method="POST" action="<?php echo $_SERVER['PHP_SELF'] ;?>" role="form" style="background:rgba(255,255,255,0.38) ;color: black">
                  <div class="container" style="margin-top: 6px;padding-top: 6%;margin-right: 0px;">
                    <table> 
                        <tr style="height: 55px;">
                            <td >
                                <label for="designation" ><b>Désignation :<span>*</span></b></label>
                            </td>
                            <td 
                            >
                              <input type="text" name="designation"  placeholder="Désignation de matériel" required style="height: 36px; font-size: 17px;width: 100%" >
                            </td>
                            <td>
                                <label for="numeroDeSerie"  style="padding-left: 7%;padding-bottom: 3px;font-weight: bold;">Numéro de série :<span>*</span></label>
                            </td>
                            <td>
                              <input type="text" name="numeroDeSerie" id="numeroDeSerie"  placeholder="Numéro de série de matériel" required style="height: 36px; font-size: 17px;width: 100%">
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
                                <label for="idFournisseur">Fournisseur :<span>*</span></label>
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
                              <td>
                                <label for="IdTypeLivraison" style="padding-left: 7%;">Type d'acquésition:<span>*</span></label>
                              </td>
                              <td>
                                <select name="IdTypeLivraison" id="IdTypeLivraison" required style="height: 36px; font-size: 17px;width: 100%">
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
                            </tr>
                            <tr style="height: 55px;">
                              <td>
                                <label for="dateLivraison">Date de livraison :<span>*</span></label>
                              </td>
                              <td>
                                <input type="text" name="dateLivraison" id="dateLivraison" required placeholder="aaaa-mm-jj" style="height: 36px; font-size: 17px;width: 100%">
                              </td>
                              <td>
                                <label for="quantiteLivree"  style="padding-left: 7%;"     >Quantité livrée :<span>*</span></label>
                              </td>
                              <td>
                                <input type="number" name="quantiteLivree" id="quantiteLivree" placeholder="saisir la quantité" style="height: 36px; font-size: 17px;width: 100%">
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
                                <label for="numeroMB"  style="padding-left: 7%;">Numéro MB :</label>
                              </td>
                              <td>
                                <input type="text" name="numeroMB" id="numeroMB" placeholder="Numéro MB"  style="height: 36px; font-size: 17px;width: 100%">
                              </td>
                            </tr>
                            <tr style="height: 55px;">
                              <td>
                                <label for="numeroAO">Numéro AO :</label>
                              </td>
                              <td>
                                <input type="text" name="numeroAO" id="numeroAO" placeholder="Numero AO"  style="height: 36px; font-size: 17px;width: 100%">
                              </td>
                              <td>
                                <label for="numeroLOT"  style="padding-left: 7%;">Numéro LOT :</label>
                              </td>
                              <td>
                                <input type="text" name="numeroLOT" id="numeroLOT" placeholder="Numero LOT"  style="height: 36px; font-size: 17px;width: 100%">
                              </td>
                         </tr>
                         <tr style="height: 55px;">
                              <td>
                                <label for="numeroBL">Numéro BL :</label>
                              </td>
                              <td>
                                <input type="text" name="numeroBL" id="numeroBL" placeholder="Numero BL"  style="height: 36px; font-size: 17px;width: 100%">
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
                              <input type="radio" id="etat" name="etat"  value="stocké" required style="color: black">En stock  &nbsp; &nbsp;
                                <input type="radio" id="etat" name="etat"  value="affecté" required style="color: black">En service
                              </center>
                            </td>
                            
                          </tr>
                          <tr style="height: 55px;">
                            <td>
                              <label for="idMagasin" >lieu de stockage: </label>
                            </td>
                            <td>
                              <select name="idMagasin" id="idMagasin" style="height: 36px; font-size: 17px;width: 100%">
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
                              <label for="level1" style="padding-left: 7%;">Nom de service(niveau1) :</label>
                            </td>
                            <td>
                              <select onchange="loadservice()"  name="level1" id="level1"  style="height: 36px; font-size: 17px;width: 100%">
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
                           <tr style="height: 55px;">
                            <td>
                                  <label for="level2" >Nom de service(niveau2) :</label>
                                </td>
                                <td>
                                  <select name="level2" id="level2" onchange="loadservice3()" style="height: 36px; font-size: 17px;width: 100%">
                                  <option value="" >Sélectionnez tout d'abord le niveau 1 </option>
                                    
                                </select>
                              </td>
                            <td>
                              <label for="idAffectation" style="padding-left: 7%;">Nom de service(niveau3) :</label>
                            </td>
                            <td>
                              <select name="idAffectation" id="idAffectation"  style="height: 36px; font-size: 17px;width: 100%">
                                    <option value="">Sélectionnez tout d'abord le niveau 2</option>
                                    
                                </select>
                            </td>
                            
                          </tr>
                           <tr style="height: 55px;">
                            <td></td>
                            <td style="padding-left: 18%;">
                              <input type="submit" name="submit" value="Enregistrer" style="color: black;background: #4fb783;height: 35px;width: 150px; border-color: transparent;padding-left: 10%;font-weight: bold;">
                            </td>
                            <td></td>
                            <td style="padding-right: 30%;">
                              <input type="reset" name="reset" value="Vider les champs" style="color: black;background:#f67280;height: 35px;width: 200px; border-color: transparent;margin-left: 10%;font-weight: bold;" >
                            </td>
                          </tr>
                          
                        </div>
                          
                          </div>
                      </table>
                  </form>
              <span>* :Ces champs sont obligatoires</span>
             </center>
     </div>

  </body>
</html>
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
        
      }

      
    </script>
   <?php  
    //print_r($_POST);
     if(isset($_POST['submit']) && !empty($_POST['submit'])){
        //connexion au serveur et a la base de donnees
       include('C:\wamp64\www\codePFE\models\connexionBD_model.php');
        //echo "if test works";
        $sql2 ="SELECT * FROM materiels where numeroDeSerie ='".$_POST['numeroDeSerie']."'" ;
    $resultat2 =$bdd->query($sql2) ;
    if($datas=$resultat2->fetch()) { ?>
     <script>
        alert("Un numéro de série doit etre unique!");
      </script>    ';
    <?php }
    else{
    $designation= $_POST['designation'];
    $numeroDeSerie= $_POST['numeroDeSerie'];
    $idMarque= $_POST['idMarque'];
    $idModele= $_POST['idModele'];
    $idFamille= $_POST['idFamille'];
    $idSousFamille= $_POST['idSousFamille'];
    $idFournisseur= $_POST['idFournisseur'];
    $IdTypeLivraison= $_POST['IdTypeLivraison'];
    $dateLivraison= $_POST['dateLivraison'];
    $quantiteLivree= $_POST['quantiteLivree'];
    $prixUnitaire= $_POST['prixUnitaire'];
    $numeroMB= $_POST['numeroMB'];
    $numeroAO= $_POST['numeroAO'];
    $numeroLOT= $_POST['numeroLOT'];
    $numeroBL= $_POST['numeroBL'];
    $etat= $_POST['etat'];
    $essaiMiseService= $_POST['essaiMiseService'];
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
    //$idAffectation=$_POST['idAffectation'];
    
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
    //ALTER TABLE `materiels` ADD UNIQUE( `numeroDeSerie`);
    /* $numeroInventaire=$famille_abr.date('Y', strtotime($dateLivraison));
     $answ=$bdd->prepare('INSERT INTO `materiels` (`idMagasin`,`idModele`,`idLivraison`,`idSousFamille`,`numeroInventaire`,`numeroDeSerie`,`designation`,`materiels`.`etat`,`essaiMiseService`)
      VALUES (?,?,?,?,?,?,?,?,?)');
     $lastIdInventaire=$bdd->lastInsertId();
     //requete d'insertion dans la table materiel*/
     if(empty($_POST['idMagasin']))
      $idMagasin=NULL;
    $numeroInventaire=$famille_abr.'-'.date('Y', strtotime($dateLivraison)).'-'.date('m', strtotime($dateLivraison));
    include('C:\wamp64\www\codePFE\models\connexionBD_model.php');
    

     $answ=$bdd->prepare('INSERT INTO `materiels` (`idMagasin`,`idModele`,`idLivraison`,`idSousFamille`,`numeroInventaire`,`numeroDeSerie`,`designation`,`materiels`.`etat`,`essaiMiseService`)
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
        //echo $lastIdInventaire;
        $newInventaireNum=$numeroInventaire."-".$lastIdInventaire;
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
        echo $lastIdInventaire;
        echo $newInventaireNum;
        echo '<script> alert("Vous avez bien ajouter le nouveau materiel"); </script>';
    
    }
  }
  //else{
    //echo "if submit test not working :(";
  //}
  
  ?>
  