<?php
    session_start();
    include('connect.php');
    if(isset($_GET["identifiantMateriel"])){
      $rep=$bdd->query('SELECT * FROM `livraisons`,`materiels` where `idMateriel`="'.$_GET["identifiantMateriel"].'" AND `livraisons`.idLivraison=`materiels`.idLivraison');
       while($donnees=$rep->fetch()){
        $idFournisseur=$donnees['idFournisseur'];
        $IdTypeLivraison=$donnees['IdTypeLivraison'];
        $dateLivraison=$donnees['dateLivraison'];
        $quantiteLivree=$donnees['quantiteLivree'];
        $prixUnitaire=$donnees['prixUnitaire'];
        $numeroMB=$donnees['numeroMB'];
        $numeroAO=$donnees['numeroAO'];
        $numeroLOT=$donnees['numeroLOT'];
        $numeroBL=$donnees['numeroBL'];
        $idMagasin=$donnees['idMagasin'];
        $idModele=$donnees['idModele'];
        $idLivraison=$donnees['idLivraison'];
        $idSousFamille=$donnees['idSousFamille'];
        $numeroInventaire=$donnees['numeroInventaire'];
        $numeroDeSerie=$donnees['numeroDeSerie'];
        $designation=$donnees['designation'];
        $etat=$donnees['etat'];
        $essaiMiseService=$donnees['essaiMiseService'];
        $idMateriel=$donnees['idMateriel'];

//variablesde table affectaion_materiels
        /*$idAffectation=$donnees['idAffectation'];
        
        $dateAffectation=$donnees['dateAffectation'];
        //variablesde table affectaions
        $niveau1=$donnees['niveau1'];
        $niveau2=$donnees['niveau2'];
        $niveau3=$donnees['niveau3'];*/
        //$idMarque=$donnees['idMarque'];
        //$idFamille=$donnees['idFamille'];
        //$idAffectation=$_POST['idAffectation'];
      }
    } 
?>

<!doctype html>
<html
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="jquery.js"></script>
    <!-- jQuery library-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    
    <!-- link to css file-->
    <link rel="stylesheet" type="text/css" href="ajout.css">
    <!-- Bootstrap-->
    <link href="css/bootstrap.min.css" type="text/css"> 
    <!-- Bootstrap CSS--> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Modification d'un matériel</title>
   
    
  </head>
  <?php
    include('connect.php');
  ?>
  
  <body>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS--> 
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>



      <br>
      <br>
      <hr width="50%">
        <center><h3>Modification de matériel:</h3>
      <hr width="50%">            
        </center>
       <div class="container">
         <center>
         <div class="row">
             <div class="col-lg-10 col-lg-offset-1">
                  <form id="materiel-form" method="post" action="" role="form">
                       <div class="row">
                           <div class="col-md-6">
                                <label for="designation">Désignation :</label><br>
                                <input type="text" name="designation"  placeholder="Désignation de matériel" required value=<?php echo $designation; ?>>
                           </div>
                           <div class="col-md-6">
                                <label for="numeroDeSerie">Numéro de série :</label><br>
                                <input type="text" name="numeroDeSerie" id="numeroDeSerie"  placeholder="Numéro de série de matériel" value=<?php echo$numeroDeSerie ?> required>
                            </div>
                       </div>
                        <div class="row">
                           <?php 
                            $marque_modele=$bdd->query('SELECT `idMarque`, `Marque` FROM `marques` WHERE `idMarque`= (SELECT `idMarque` FROM `modeles` WHERE `idModele`=(SELECT `idModele` FROM `materiels` WHERE `idMateriel`="'.$_GET["identifiantMateriel"].'"))');
                           while($donnees=$marque_modele->fetch()){
                            $idMarque=$donnees['idMarque'];
                            $Marque=$donnees['Marque'];
                           }

                            ?>
                            <div class="col-md-6">
                                <label for="idMarque">Marque :</label><br>
                                <select onchange="selectchange()"  name="idMarque" id="idMarque" required>
                                    <option value=<?php echo $idMarque; ?>><?php echo $Marque; ?> </option>
                                    <?php
                                      include('connect.php');
                                        $rep=$bdd->query('select * from marques where idMarque!="'.$idMarque.'" order by Marque');
                                      while ($donnees=$rep->fetch()) {
                                        echo 
                                        "<option value=".$donnees['idMarque'].">".$donnees['Marque']."</option>";
                                      }

                                    ?>
                                </select>
                            </div>
                             <div class="col-md-6">
                              <?php
                                $modele_inv=$bdd->query('SELECT * from modeles where idModele=(SELECT `idModele` FROM `materiels` WHERE `idMateriel`="'.$_GET["identifiantMateriel"].'")');
                                while($donnees=$modele_inv->fetch()){
                                  $idModele=$donnees['idModele'];
                                  $modele=$donnees['modele'];
                           }
                              ?>
                                <label for="idModele">Modèle :</label><br>
                                <select name="idModele" id="idModele" required>
                                  <option value=<?php echo $idModele; ?>><?php echo $modele; ?> </option>
                                  <?php
                                    $rep=$bdd->query('select * from modeles where idMarque='.$idMarque.' and idModele!='.$idModele.' order by modele ');
                                    while($donnees=$rep->fetch()){
                                           echo '<option value='.$donnees["idModele"].'>'.$donnees["modele"].'</option>';
                                      }
                                  ?>
                                    
                                </select>
                                
                           </div>
                        </div>
                        <div class="row">
                           <?php 
                            $famille_sousFamille=$bdd->query('SELECT `idFamille`, `famille` FROM `familles` WHERE `idFamille`= (SELECT `idFamille` FROM `familles_sousfamilles` WHERE `idSousFamille`=(SELECT `idSousFamille` FROM `materiels` WHERE `idMateriel`="'.$_GET["identifiantMateriel"].'"))');
                           while($donnees=$famille_sousFamille->fetch()){
                            $idFamille=$donnees['idFamille'];
                            $famille=$donnees['famille'];
                           }

                            ?>
                            <div class="col-md-6">
                                <label for="idFamille">Famille :</label><br>
                                <select onchange="selectSousFamille()"  name="idFamille" id="idFamille" required>
                                    <option value=<?php echo $idFamille; ?>><?php echo $famille; ?> </option>
                                    <?php
                                      include('connect.php');
                                        $rep=$bdd->query('select * from familles order by Famille');
                                      while ($donnees=$rep->fetch()) {
                                        echo 
                                        "<option value=".$donnees['idFamille'].">".$donnees['famille']."</option>";
                                      }
                                       // $nomFamille=$donnees['famille'];
                                    ?>
                                </select>
                            </div>
                             <div class="col-md-6">
                              <?php 
                            $sousFamilles=$bdd->query('SELECT `idSousFamille`, `sousFamille` FROM `sousfamilles` WHERE `idSousFamille`=(SELECT `idSousFamille` FROM `materiels` WHERE `idMateriel`="'.$_GET["identifiantMateriel"].'")');
                           while($donnees=$sousFamilles->fetch()){
                            $idSousFamille=$donnees['idSousFamille'];
                            $sousFamille=$donnees['sousFamille'];
                           }

                            ?>
                                <label for="idSousFamille">Sous famille :</label><br>
                                <select name="idSousFamille" id="idSousFamille" required>
                                  <option value=<?php echo $idSousFamille; ?>><?php echo $sousFamille; ?> </option>
                                   <?php
                                    $rep=$bdd->query("SELECT `sousfamilles`.idSousFamille, sousFamille FROM `sousfamilles`,`familles_sousfamilles` WHERE `idFamille`=".$idFamille." and `familles_sousfamilles`.`idSousFamille`=`sousfamilles`.`idSousFamille` and `sousfamilles`.idSousFamille!=".$idSousFamille."");
                                    while($donnees=$rep->fetch()){
                                          echo '<option value='.$donnees["idSousFamille"].'>'.$donnees["sousFamille"].'</option>';
                                      }
                                  ?> 
                                </select>
                                
                           </div>
                        </div>
                        <div class="row">
                          <?php 
                            $fournisseur=$bdd->query('SELECT * FROM `fournisseurs` WHERE `idFournisseur`= (SELECT `idFournisseur` FROM `livraisons` WHERE `idLivraison`=(SELECT `idLivraison` FROM `materiels` WHERE `idMateriel`="'.$_GET["identifiantMateriel"].'"))');
                           while($donnees=$fournisseur->fetch()){
                            $idFournisseur=$donnees['idFournisseur'];
                            $nomFournisseur=$donnees['nomFournisseur'];
                           }

                            ?>
                           
                            <div class="col-md-6">
                                <label for="idFournisseur">Fournisseur :</label><br>
                                <select name="idFournisseur" id="idFournisseur" required>
                                    <option value=<?php echo $idFournisseur; ?>><?php echo $nomFournisseur; ?> </option>
                                    <?php
                                      include('connect.php');
                                        $rep=$bdd->query('SELECT * FROM `fournisseurs` WHERE `idFournisseur`!="'.$idFournisseur.'"  ORDER BY `nomFournisseur` ');
                                      while ($donnees=$rep->fetch()) {
                                        echo 
                                        "<option value=".$donnees['idFournisseur'].">".$donnees['nomFournisseur']."</option>";
                                      }

                                    ?>
                                </select>
                            </div>
                             <div class="col-md-6">
                              <?php 
                            $acquisition=$bdd->query('SELECT * FROM `typelivraisons` WHERE `IdTypeLivraison`= (SELECT `IdTypeLivraison` FROM `livraisons` WHERE `idLivraison`=(SELECT `idLivraison` FROM `materiels` WHERE `idMateriel`="'.$_GET["identifiantMateriel"].'"))');
                           while($donnees=$acquisition->fetch()){
                            $IdTypeLivraison=$donnees['IdTypeLivraison'];
                            $typeLivraison=$donnees['typeLivraison'];
                           }

                            ?>
                                <label for="IdTypeLivraison">Type d'acquisition :</label><br>
                                <select name="IdTypeLivraison" id="IdTypeLivraison" required>
                                  <option value=<?php echo $IdTypeLivraison; ?>><?php echo $typeLivraison; ?> </option>
                                    <?php
                                      include('connect.php');
                                        $rep=$bdd->query('SELECT * FROM `typelivraisons` WHERE `IdTypeLivraison`!="'.$IdTypeLivraison.'" ORDER BY `typeLivraison`');
                                      while ($donnees=$rep->fetch()) {
                                        echo 
                                        "<option value=".$donnees['IdTypeLivraison'].">".$donnees['typeLivraison']."</option>";
                                      }

                                    ?>
                                </select>
                                
                           </div>
                        </div>
                        <div class="row">
                           
                            <div class="col-md-6">
                                <label for="dateLivraison">Date de livraison :</label><br>
                                <input type="text" name="dateLivraison" id="dateLivraison" required placeholder="aaaa-mm-jj" value=<?php echo $dateLivraison ?>>
                            </div>
                             <div class="col-md-6">
                                <label for="quantiteLivree">Quantité livrée :</label><br>
                                 <input type="text" name="quantiteLivree" id="quantiteLivree" placeholder="saisir quantité" value=<?php echo $quantiteLivree ?>>
                           </div>
                        </div>
                        <div class="row">
                           
                            <div class="col-md-6">
                                <label for="prixUnitaire">Prix unitaire (DH):</label><br>
                                <input type="text" name="prixUnitaire" id="prixUnitaire" placeholder="saisir le prix" value=<?php echo $prixUnitaire ?> required>
                            </div>
                             <div class="col-md-6">
                                <label for="numeroMB">Numéro marché/ Bonde de commande  :</label><br>
                                 <input type="text" name="numeroMB" id="numeroMB" placeholder="Numéro MB" value=<?php echo $numeroMB ?>required>
                           </div>
                        </div>
                        <div class="row">
                           
                            <div class="col-md-6">
                                <label for="numeroAO">Numéro AO :</label><br>
                                <input type="text" name="numeroAO" id="numeroAO" placeholder="Numero AO" value=<?php echo $numeroAO ?> required>
                            </div>
                             <div class="col-md-6">
                                <label for="numeroLOT">Numéro LOT :</label><br>
                                 <input type="text" name="numeroLOT" id="numeroLOT" placeholder="Numero LOT" value=<?php echo $numeroLOT ?>  required>
                           </div>
                        </div>
                        <div class="row">
                           
                             <div class="col-md-6">
                                <label for="numeroBL">Numéro BL :</label><br>
                                 <input type="text" name="numeroBL" id="numeroBL" placeholder="Numero BL" value=<?php echo $numeroBL ?> required>
                           </div>
                           
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="etat">Etat de matériel (fourniture):</label><br>
                                <input type="radio"  name="etat"   value="stocké" >En stock 
                                <input type="radio"  name="etat"  value="affecté">En service
                            </div>
                            <div class="col-md-6">
                                <label for="essaiMiseService">Essaie de mise en service:</label><br>
                                <input type="radio" name="essaiMiseService" id="essaiMiseService"  value="oui" required value=<?php echo $essaiMiseService ?>>Oui 
                                <input type="radio" name="essaiMiseService" id="essaiMiseService"  value="non" required>Non
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                              <?php 
                            $stockage=$bdd->query('SELECT * FROM `magasins` WHERE `idMagasin`= (SELECT `idMagasin` FROM `materiels` WHERE `idMateriel`="'.$_GET["identifiantMateriel"].'")');
                           while($donnees=$stockage->fetch()){
                            $idMagasin=$donnees['idMagasin'];
                            $nomMagasin=$donnees['nomMagasin'];
                           }

                            ?>
                                <label for="idMagasin">Lieu de stockage :</label><br>
                                <select name="idMagasin" id="idMagasin" >
                                    <option value=<?php if($etat=="affecté") echo ""; else echo $idMagasin ?>><?php if($etat=="affecté") echo "Sélectionnez un service plutot"; else echo $nomMagasin ?> </option>
                                    <?php
                                      include('connect.php');
                                      $answer=$bdd->query('select * from magasins WHERE `idMagasin`!="'.$idMagasin.'" order by nomMagasin');
                                      while ($datas=$answer->fetch()) {
                                        echo 
                                        "<option value=".$datas['idMagasin'].">".$datas['nomMagasin']."</option>";
                                      }

                                    ?>
                                </select>
                            </div>
                              
                            
                            <div class="col-md-6">
                              <?php 
                                $affectation=$bdd->query('SELECT * FROM `affectations` WHERE `idAffectation`= (SELECT `idAffectation` FROM `affectation_materiels` WHERE `idMateriel`=(SELECT `idMateriel` FROM `materiels` WHERE `idMateriel`="'.$_GET["identifiantMateriel"].'"))');
                               while($donnees=$affectation->fetch()){
                                $niveau1=$donnees['niveau1'];
                                $niveau2=$donnees['niveau2'];
                                $niveau3=$donnees['niveau3'];
                                $idAffectation=$donnees['idAffectation'];
                               }

                                ?>
                                <label for="level1">Nom de service(niveau1) :</label><br>
                                <select onchange="loadservice()" name="level1" id="level1" >
                                    <option value="">Sélectionnez le service  </option>
                                        <?php
                                      include('connect.php');
                                      $repon=$bdd->query('select distinct niveau1 from affectations group by niveau1');
                                      while ($donnes=$repon->fetch()) {
                                        echo 
                                        "<option value=".$donnes['niveau1'].">".$donnes['niveau1']."</option>";
                                      }

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
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6"><br/></div>
                            <div class="col-md-6"><br/></div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <input type="submit" name="submit" value="Enregistrer" >
                            </div>
                            <div class="col-md-6">
                                <input type="reset" name="reset" value="réinsérer" >
                            </div>
                        </div>
                  </form>
                </div>
             </div>
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


    <?php  /*
    //print_r($_POST);
     if(isset($_POST['submit']) && !empty($_POST['submit'])){
        //connexion au serveur et a la base de donnees
        include('connect.php');
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
     $answ=$bdd->prepare('INSERT INTO `materiels` (`idMagasin`,`idModele`,`idLivraison`,`idSousFamille`,`numeroInventaire`,`numeroDeSerie`,`designation`,`etat`,`essaiMiseService`) values(:idMagasin,:idModele,:idLivraison,:idSousFamille,:numeroInventaire,:numeroDeSerie,:designation,:etat,:essaiMiseService)');
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
        

     ));


          echo"<script language=\"javascript\">";
          echo"alert('Vous avez bien ajouter le materiel de Numéro d'inventaire')".$famille_abr.date('Y', strtotime($dateLivraison))."";
          echo"</script>";


       /* $lastIdInventaire=$bdd->lastInsertId();
        if(!empty($_POST['level1'])){
        //requete d'insertion dans la table affectation_materiels
        $repo=$bdd->prepare('INSERT INTO `affectation_materiels` (`idAffectation`,`idMateriel`,`dateAffectation`) values(:idAffectation,:idMateriel,:dateAffectation`)');
        $repo->execute(array(
          'idAffectation'=>$_POST['idAffectation'];
          'idMateriel'=>$lastIdInventaire,
          'dateAffectation'=>NOW()
        ));}*/
  //}
  /*else{
    echo "if test not working :(";
  }*/
  
  ?>

  </body>
</html>
