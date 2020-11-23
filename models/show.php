<?php  
session_start() ;?>
<?php
    //print_r($_POST);
     if(isset($_POST['submit'])){
        //connexion au serveur et a la base de donnees
       include('connexionBD_model.php');
        //echo "if test works";
        
    echo $_POST['designation'];
    echo $_POST['numeroDeSerie'];
    //echo $_POST['idMarque'];
    echo $_POST['idModele'];
    //echo $_POST['idFamille'];
    echo $_POST['idSousFamille'];
    //echo $_POST['idFournisseur'];
    //echo $_POST['IdTypeLivraison'];
   // echo $_POST['dateLivraison'];
   // echo $_POST['quantiteLivree'];
   // echo $_POST['prixUnitaire'];
    /*echo $_POST['numeroMB'];
    echo $_POST['numeroAO'];
    echo $_POST['numeroLOT'];
    echo $_POST['numeroBL'];*/
    echo $_POST['etat'];
    echo $_POST['essaiMiseService'];
    echo $_POST['idMagasin'];
    echo $numeroInventaire;
    echo $idMagasin;
    echo $idModele;
    echo $idLivraison;
    //echo $idSousFamille;
    echo $numeroInventaire;
    //echo $numeroDeSerie;
    //echo $designation;
    //echo $etat;
    ////echo $essaiMiseService;
    echo $numeroDeSerie_2;
    //$idAffectation=$_POST['idAffectation'];
    
    //echo $numeroDeSerie_2;
    //echo $_COOKIE["designation"];
    //echo $_POST['numeroDeSerie_2'];
   // echo $_SESSION['numeroDeSerie_2'] ;
  }
  else{
    echo "if test not working :(";
  }
  
 
  ?>