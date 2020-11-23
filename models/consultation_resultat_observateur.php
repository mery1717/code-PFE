<?php
 session_start() ;
   include 'C:\wamp64\www\CodePFE\codes_vues\header_vue.php';
    echo " <body onmousemove='temps=0' onload='time_out();' style='margin-top: 0px ;background-image: url(../images/impuser2.jpg);background-repeat:no-repeat;background-size: cover;'> ";
       include 'C:\wamp64\www\CodePFE\codes_vues\hea.php';?>
 <hr style="background: gray; color :black;height: 5px; margin-bottom: 0px;margin-top: 0px;">
      <nav class="navbar" style="margin-bottom: 0px;margin-right: 0 auto;margin-left: 0px auto;margin-top: 0px;background:white" >
        <div class="fluid">
          <div class="navbar-header">
            
              <!--<nav class="fixed-nav-bar">-->
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
               
                  <li><a href="/codePFE/models/deconnexion_model.php" name="deconnexion" class="btn btn-outline-danger" style="color:black;margin-left: 70vw;border-color: red;" role="button">se deconnecter</a></li>
              </ul>

              </div>

      </div>
      </nav>
       <hr width="50%" style="color:black"> <center> <h2 style="font-family: arial;color: black;">Resultats</h2></center>  <hr width="50%" style="color: black;">  
        <?php
 echo'<link rel="stylesheet" type="text/css" href="http://localhost/codePFE/codes_vues/impression.css">' ;

   include('C:\wamp64\www\codePFE\models\connexionBD_model.php') ;
    
    if(empty($_POST['modeleSelectione']) AND empty($_POST['marqueSelectionee']) AND empty($_POST['numeroInventaire'])
        AND empty($_POST['designation']) AND empty($_POST['typeAchatSelectione']) 
        AND empty($_POST['familleSelectionee']) AND empty($_POST['magasinSelectionee']) 
        AND empty($_POST['affectationSelectionee1']) AND empty($_POST['sousFamilleSelectionee'])
        AND empty($_POST['date']) AND empty($_POST['etat']) AND empty($_POST['essai'])  AND empty($_POST['fournisseurSelectionne']) AND empty($_POST['numeroAO'])) { 

            echo " <script> 
            var element1 = document.getElementById('imprimer') ;
                element2 = document.getElementById('exporter') ;
                element3 = document.getElementById('supprimer') ;
                element1.className='none' ;
                element2.className='none' ;
                element3.className='none' ;
          </script> 

      <center><div class='alert alert-danger' style='margin-top:200px;height:100px;margin-left:20%;margin-right:20%;'>
  <center><strong style='color:red;'>Attention!</strong><span> Veuillez donner au moins un critère de recherche !!.</span><br/><br/><a href='..\controleurs\consultation_controleur.php' class='alert-link' style='color:blue;text-decoration:none;margin-right:40%;'>Retour</a></center>
</div></center> ";

       }

        else {


         if($_SERVER['REQUEST_METHOD']=='POST') {

            $numeroInventaire = $_POST['numeroInventaire'] ;
            $designation      = $_POST['designation'] ;
            $modele           = $_POST['modeleSelectione'] ;
            $marque           = $_POST['marqueSelectionee'] ;
            $famille          = $_POST['familleSelectionee'];
            $sousFamille      = $_POST['sousFamilleSelectionee'] ;
            $magasin          = $_POST['magasinSelectionee'] ;
            $affectation      = $_POST['affectationSelectionee1'] ;
            $date             = $_POST['date'] ;
            $typeAchat        = $_POST['typeAchatSelectione'] ; 
            $etat             =$_POST['etat'] ; 
            $essai            =$_POST['essai'] ; 
            $fournisseur      =$_POST['fournisseurSelectionne'] ; 
            $numeroAO         =$_POST['numeroAO'] ; 
          }

           $sql= "SELECT nomFournisseur, livraisons.idFournisseur , materiels.idModele , modeles.idMarque ,familles.idFamille , typeLivraisons.idTypeLivraison ,sousfamilles.idSousFamille , materiels.idMateriel ,numeroInventaire ,designation , materiels.idMagasin ,etat , essaiMiseService , numeroDeSerie ,  modele , Marque , famille ,sousFamille , nomMagasin ,dateLivraison , numeroBL , numeroMB , numeroLOT , numeroAO ,typeLivraison,niveau2,niveau1,niveau3  from (((((familles join familles_sousFamilles on familles.idFamille = familles_sousFamilles.idFamille join sousfamilles on familles_sousFamilles.idSousFamille = sousfamilles.idSousFamille inner join materiels on materiels.idSousFamille = sousfamilles.idSousFamille  join modeles on materiels.idModele =modeles.idModele join marques on  modeles.idMarque = marques.idMarque ) join livraisons on materiels.idLivraison = livraisons.idLivraison join typelivraisons on livraisons.idTypeLivraison = typelivraisons.idTypeLivraison) join fournisseurs on fournisseurs.idFournisseur = livraisons.idFournisseur )left join magasins on magasins.idMagasin = materiels.idMagasin)  left join affectation_materiels on affectation_materiels.idMateriel = materiels.idMateriel)left  join affectations on affectations.idAffectation = affectation_materiels.idAffectation  where 1=1 ";


           if(!empty($numeroInventaire)){$sql.= "AND numeroInventaire LIKE'$numeroInventaire%'" ; }
           if(!empty( $designation)) {$sql.=    "AND designation LIKE '$designation%'" ; }
           if(!empty($date)) {$sql.=            "AND dateLivraison ='".$date."'" ; }
           if(!empty($modele)) {$sql.=          "AND materiels.idModele ='".$modele."'" ; }
           if(!empty($famille )) {$sql.=        "AND familles.idFamille ='".$famille."'" ; }
           if(!empty($sousFamille)) {$sql.=     "AND sousfamilles.idSousFamille ='".$sousFamille."'" ; }
           if(!empty($marque)) {$sql.=          "AND modeles.idMarque  ='".$marque."'" ; }
           if(!empty($magasin)) {$sql.=         "AND materiels.idMagasin ='".$magasin."'" ; }
           if(!empty($typeAchat)) {$sql.=       "AND typeLivraisons.idTypeLivraison ='".$typeAchat."'" ; }
           if(!empty($affectation)){$sql.=      "AND niveau1='".$affectation."'" ; }
           if(!empty($etat)){$sql.=             "AND etat='".$etat."'" ; }
           if(!empty($essai)){$sql.=            "AND essaiMiseService='".$essai."'" ; }
           if(!empty($fournisseur)){$sql.=      "AND livraisons.idFournisseur='".$fournisseur."'" ; }
           if(!empty($numeroAO)){$sql.=            "AND numeroAO='".$numeroAO."'" ; }
          $sql.="GROUP BY numeroInventaire 
                ORDER BY dateLivraison desc";
         $result=$bdd->query($sql); ?>
        <div style="margin-top: 80px;background-color: rgba(255,255,255,0.55);">
         <table border="2">
          <tr style="color: green;">
            <td>Numéro d'inventaire</td> <td>Designation</td> <td> Marque </td>  <td> Modele </td> <td>famille</td> <td>Numero de série</td><td>Type d'acquisition</td> <td>Fournisseur</td> <td>date de livraison</td><td>lieu de stockage </td><td></td><td></td><td></td> <td></td><td></td>
          </tr>
          <?php
         while($donnees = $result->fetch())
       { ?>

        
          <tr style="height:100px">
            <td style="font-weight: bold">
              <?php echo $donnees['numeroInventaire']; ?> 
            </td> 
            <td>
              <?php echo $donnees['designation']  ; ?>
            </td> 
            <td>
              <?php echo $donnees['Marque']  ; ?>  
            </td> 
             <td> 
              <?php echo $donnees['modele']  ; ?>  
            </td>
             <td> 
              <?php echo $donnees['famille']  ; ?>
            </td> 
            <td>
              <?php echo $donnees['numeroDeSerie']  ; ?>
            </td>
            <td>
              <?php echo $donnees['typeLivraison']  ; ?>  
            </td>
            <td>
              <?php echo $donnees['nomFournisseur'] ;?>
            </td> 
            <td>
              <?php echo $donnees['dateLivraison'] ;?>
            </td>
            <td>
              <?php echo $donnees['nomMagasin'] ;?>
            </td>
            <td style=" white-space: nowrap;padding:0; border-spacing:0">
              <a id="imprimer" href="consultationPV.php?identifiantMateriel=<?php echo  $donnees['idMateriel'] ;?>"style="display:table; width:10%; border-spacing:10px;margin-left: 0px;text-decoration: none"><strong>imprimer le PV</a>
            </td>
            <td style=" white-space: nowrap;padding:0; border-spacing:0">
              <a id="imprimer2" href="impressionBA2.php?identifiantMateriel=<?php echo  $donnees['idMateriel'] ;?>" style="display:table; width:10%; border-spacing:10px;margin-left: 0px;text-decoration: none"><strong>Imprimer <br/>le bulletin <br/>d'affectation</strong></a>
            </td>
            <td style=" white-space: nowrap;padding:0; border-spacing:0">
              <a id="modifier" href="modification_materiel.php?identifiantMateriel=<?php echo  $donnees['idMateriel'] ;?>" style="display:table; width:10%; border-spacing:10px;margin-left: 0px;text-decoration: none"><strong>Modifier</a>
            </td>
            <td style=" white-space: nowrap;padding:0; border-spacing:0">
              <a id="supprimer" href="supprimer.php?identifiantMateriel=<?php echo  $donnees['idMateriel'] ;?>"  onclick="return confirm('Etes vous sûre de vouloir supprimer cette valeur ?');" style="display:table; width:10%; border-spacing:10px;margin-left: 0px;text-decoration: none"><strong>Supprimer</a>
            </td>
            <td style=" white-space: nowrap;padding:0; border-spacing:0">
              <a id="exporter" href="exportation_model.php?identifiantMateriel=<?php echo  $donnees['idMateriel'] ;?>" style="display:table; width:10%; border-spacing:10px;margin-left: 0px;text-decoration: none"><strong>Exporter</a>
            </td>         
          </tr>
           
      <?php

} 
echo "</table></div>" ;
}
?>
   
