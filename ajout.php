<!doctype html>
<html>
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

    <title>Enregistrement d'un nouveau matériel</title>
   
    
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
        <center><h3>Catégories de matériel:</h3>
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
                                <input type="text" name="designation"  placeholder="Désignation de matériel" required>
                           </div>
                           <div class="col-md-6">
                                <label for="numeroDeSerie">Numéro de série :</label><br>
                                <input type="text" name="numeroDeSerie" id="numeroDeSerie"  placeholder="Numéro de série de matériel" required>
                            </div>
                       </div>
                        <div class="row">
                           
                            <div class="col-md-6">
                                <label for="idMarque">Marque :</label><br>
                                <select onchange="selectchange()"  name="idMarque" id="idMarque" required>
                                    <option value="">Sélectionnez la marque </option>
                                    <?php
                                      include('connect.php');
                                        $rep=$bdd->query('select * from marques order by Marque');
                                      while ($donnees=$rep->fetch()) {
                                        echo 
                                        "<option value=".$donnees['idMarque'].">".$donnees['Marque']."</option>";
                                      }

                                    ?>
                                </select>
                            </div>
                             <div class="col-md-6">
                                <label for="idModele">Modèle :</label><br>
                                <select name="idModele" id="idModele" required>
                                  <option value="">Sélectionnez le modele </option>
                                    
                                </select>
                                
                           </div>
                        </div>
                        <div class="row">
                           
                            <div class="col-md-6">
                                <label for="idFamille">Famille :</label><br>
                                <select onchange="selectSousFamille()"  name="idFamille" id="idFamille" required>
                                    <option value="">Sélectionnez la Famille </option>
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
                                <label for="idSousFamille">Sous famille :</label><br>
                                <select name="idSousFamille" id="idSousFamille" required>
                                  <option value="">Sélectionnez la sous famille </option>
                                    
                                </select>
                                
                           </div>
                        </div>
                        <div class="row">
                           
                            <div class="col-md-6">
                                <label for="idFournisseur">Fournisseur :</label><br>
                                <select name="idFournisseur" id="idFournisseur" required>
                                    <option value="">Sélectionnez le fournisseur </option>
                                    <?php
                                      include('connect.php');
                                        $rep=$bdd->query('SELECT * FROM `fournisseurs` ORDER BY `nomFournisseur` ');
                                      while ($donnees=$rep->fetch()) {
                                        echo 
                                        "<option value=".$donnees['idFournisseur'].">".$donnees['nomFournisseur']."</option>";
                                      }

                                    ?>
                                </select>
                            </div>
                             <div class="col-md-6">
                                <label for="IdTypeLivraison">Type livraison :</label><br>
                                <select name="IdTypeLivraison" id="IdTypeLivraison" required>
                                  <option value="">Sélectionnez le type </option>
                                    <?php
                                      include('connect.php');
                                        $rep=$bdd->query('SELECT * FROM `typelivraisons` ORDER BY `typeLivraison`');
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
                                <input type="text" name="dateLivraison" id="dateLivraison" required placeholder="aaaa-mm-jj">
                            </div>
                             <div class="col-md-6">
                                <label for="quantiteLivree">Quantité livrée :</label><br>
                                 <input type="text" name="quantiteLivree" id="quantiteLivree" placeholder="saisir quantité">
                           </div>
                        </div>
                        <div class="row">
                           
                            <div class="col-md-6">
                                <label for="prixUnitaire">Prix unitaire (DH):</label><br>
                                <input type="text" name="prixUnitaire" id="prixUnitaire" placeholder="saisir le prix" required>
                            </div>
                             <div class="col-md-6">
                                <label for="numeroMB">Numéro MB :</label><br>
                                 <input type="text" name="numeroMB" id="numeroMB" placeholder="Numéro MB" required>
                           </div>
                        </div>
                        <div class="row">
                           
                            <div class="col-md-6">
                                <label for="numeroAO">Numéro AO :</label><br>
                                <input type="text" name="numeroAO" id="numeroAO" placeholder="Numero AO" required>
                            </div>
                             <div class="col-md-6">
                                <label for="numeroLOT">Numéro LOT :</label><br>
                                 <input type="text" name="numeroLOT" id="numeroLOT" placeholder="Numero LOT" required>
                           </div>
                        </div>
                        <div class="row">
                           
                             <div class="col-md-6">
                                <label for="numeroBL">Numéro BL :</label><br>
                                 <input type="text" name="numeroBL" id="numeroBL" placeholder="Numero BL" required>
                           </div>
                           <div class="col-md-6">
                                <label for="essaiMiseService">Essaie de mise en service:</label><br>
                                <input type="radio" name="essaiMiseService" id="essaiMiseService"  value="oui" required>Oui 
                                <input type="radio" name="essaiMiseService" id="essaiMiseService"  value="non" required>Non
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="etat">Etat de matériel (fourniture):</label><br>
                                <input type="radio" id="etat" name="etat"  value="stocké" required>En stock 
                                <input type="radio" id="etat" name="etat"  value="affecté" required>En service
                            </div>
                            <div class="col-md-6">
                                <label for="idMagasin">Nom de stock :</label><br>
                                <select name="idMagasin" id="idMagasin" >
                                    <option value="">Sélectionnez votre choix </option>
                                    <?php
                                      include('connect.php');
                                      $answer=$bdd->query('select * from magasins order by nomMagasin');
                                      while ($datas=$answer->fetch()) {
                                        echo 
                                        "<option value=".$datas['idMagasin'].">".$datas['nomMagasin']."</option>";
                                      }

                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            

                            <!--
                            <div class="col-md-6">
                                <label for="level1">Nom de service(niveau1) :</label><br>
                                <select onchange="loadservice()" name="level1" id="level1" >
                                    <option value="">Sélectionnez votre choix  </option>
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
                            </div>-->
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


    <?php  
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


        $lastIdInventaire=$bdd->lastInsertId();
        echo $lastIdInventaire;
        $newInventaireNum=$famille_abr.date('Y', strtotime($dateLivraison)).$lastIdInventaire;
        echo $newInventaireNum;
        $stmt = $bdd->prepare('UPDATE `materiels` SET `numeroInventaire`="'.$newInventaireNum.'" where `idMateriel`="'.$lastIdInventaire.'"');
        $stmt->execute();
        echo $stmt->rowCount() . " Vous avez bien ajouter le mouveau materiel!";

       /* $lastIdInventaire=$bdd->lastInsertId();
        if(!empty($_POST['level1'])){
        //requete d'insertion dans la table affectation_materiels
        $repo=$bdd->prepare('INSERT INTO `affectation_materiels` (`idAffectation`,`idMateriel`,`dateAffectation`) values(:idAffectation,:idMateriel,:dateAffectation`)');
        $repo->execute(array(
          'idAffectation'=>$_POST['idAffectation'];
          'idMateriel'=>$lastIdInventaire,
          'dateAffectation'=>NOW()
        ));}*/
  }
  /*else{
    echo "if test not working :(";
  }*/
  
  ?>

  </body>
</html>
