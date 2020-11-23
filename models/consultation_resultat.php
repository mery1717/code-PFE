<?php
 session_start() ;
  include 'C:\wamp64\www\CodePFE\codes_vues\header_vue.php';
  ?> <body onmousemove='temps=0' onload='time_out();' style='margin-top: 0px ;background-color:  gray
;background-repeat:no-repeat;background-size: cover;'> 
 <?php  include 'C:\wamp64\www\CodePFE\codes_vues\hea.php';?>
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
                <li>
                  <a><input type="button"  value ="Acceuil" class="btn btn-info" style="margin-left: 14%;margin-right: 2%;margin-top: 3%; border-color: red;width: 100px;" role="button" onclick="window.location.href='http://localhost/codePFE/controleurs/pageAcceuilAdmin_controleur'"></a>
                </li>
                  <li><a href="/codePFE/models/deconnexion_model.php" name="deconnexion" class="btn btn-outline-danger" style="color:black;margin-left: 75vw;border-color: red;" role="button">se deconnecter</a></li>
              </ul>
              </div>

      </div>
      </nav>
       <hr width="50%"> <center><h3 style="font-weight: bold;color: black;font-size: 30px">Resultats</h3></center>  <hr width="50%">  
      <?php
 echo'<link rel="stylesheet" type="text/css" href="http://localhost/codePFE/codes_vues/impression.css">' ;
   include('C:\wamp64\www\codePFE\models\connexionBD_model.php') ;
   /* 
    if(empty($_POST['modeleSelectione']) AND empty($_POST['marqueSelectionee']) AND empty($_POST['numeroInventaire'])
        AND empty($_POST['designation']) AND empty($_POST['typeAchatSelectione']) 
        AND empty($_POST['familleSelectionee']) AND empty($_POST['magasinSelectionee']) 
        AND empty($_POST['affectationSelectionee1']) AND empty($_POST['sousFamilleSelectionee'])
        AND empty($_POST['date']) AND empty($_POST['etat']) AND empty($_POST['essai'])  AND empty($_POST['fournisseurSelectionne']) AND empty($_POST['numeroAO'])) { 

            ?> <script> 
            var element1 = document.getElementById('imprimer') ;
                element2 = document.getElementById('exporter') ;
                element3 = document.getElementById('supprimer') ;
                element1.className='none' ;
                element2.className='none' ;
                element3.className='none' ;
          </script> 
<center><div class='alert alert-danger' style='margin-top:200px;height:100px;margin-left:20%;margin-right:20%;'>
  <center><strong style='color:red;'>Attention!</strong><span> Veuillez donner au moins un critère de recherche !!.</span><br/><br/><a href='..\controleurs\consultation_controleur.php' class='alert-link' style='color:blue;text-decoration:none;margin-right:40%;'>Retour</a></center>
</div></center> <?php

       }*/

       // else {


         if($_SERVER['REQUEST_METHOD']=='POST') {

            $numeroInventaire = $_POST['numeroInventaire'] ;
            $numeroDeSerie    = $_POST['numeroDeSerie'] ;
            $designation      = $_POST['designation'] ;
            $idFournisseur    = $_POST['idFournisseur'] ;
            $idMarque         = $_POST['idMarque'];
            $idModele         = $_POST['idModele'] ;
            $idFamille          = $_POST['idFamille'] ;
            $idSousFamille      = $_POST['idSousFamille'] ;
            $dateLivraison             = $_POST['dateLivraison'] ;
            $IdTypeLivraison        = $_POST['IdTypeLivraison'] ; 
            $quantiteLivree             =$_POST['quantiteLivree'] ; 
            $prixUnitaire            =$_POST['prixUnitaire'] ; 
            $numeroLOT      =$_POST['numeroLOT'] ; 
            $numeroAO         =$_POST['numeroAO'] ; 
            $numeroBL         =$_POST['numeroBL'] ; 
            $numeroMB         =$_POST['numeroMB'] ; 
            $essaiMiseService         =$_POST['essaiMiseService'] ; 
            $etat         =$_POST['etat'] ; 
            $idMagasin         =$_POST['idMagasin'] ; 
            $idAffectation         =$_POST['idAffectation'] ; 

          }

           $sql= "SELECT nomFournisseur, livraisons.idFournisseur , materiels.idModele , modeles.idMarque ,familles.idFamille , typeLivraisons.idTypeLivraison ,sousfamilles.idSousFamille , materiels.idMateriel ,numeroInventaire ,designation , materiels.idMagasin ,etat , essaiMiseService , numeroDeSerie ,  modele , Marque , famille ,sousFamille , nomMagasin ,dateLivraison , numeroBL , numeroMB , numeroLOT , numeroAO ,typeLivraison,niveau2,niveau1,niveau3  from (((((familles join familles_sousFamilles on familles.idFamille = familles_sousFamilles.idFamille join sousfamilles on familles_sousFamilles.idSousFamille = sousfamilles.idSousFamille inner join materiels on materiels.idSousFamille = sousfamilles.idSousFamille  join modeles on materiels.idModele =modeles.idModele join marques on  modeles.idMarque = marques.idMarque ) join livraisons on materiels.idLivraison = livraisons.idLivraison join typelivraisons on livraisons.idTypeLivraison = typelivraisons.idTypeLivraison) join fournisseurs on fournisseurs.idFournisseur = livraisons.idFournisseur )left join magasins on magasins.idMagasin = materiels.idMagasin)  left join affectation_materiels on affectation_materiels.idMateriel = materiels.idMateriel)left  join affectations on affectations.idAffectation = affectation_materiels.idAffectation  where 1=1 ";


           if(!empty($numeroInventaire)){$sql.= "AND numeroInventaire LIKE'$numeroInventaire%'" ; }
           if(!empty($quantiteLivree)){$sql.= "AND quantiteLivree LIKE'$quantiteLivree%'" ; }
           if(!empty($prixUnitaire)){$sql.= "AND prixUnitaire LIKE'$prixUnitaire%'" ; }
           if(!empty($numeroLOT)){$sql.= "AND numeroLOT LIKE'$numeroLOT%'" ; }
           if(!empty($numeroAO)){$sql.= "AND numeroAO LIKE'$numeroAO%'" ; }
           if(!empty( $numeroBL)) {$sql.=    "AND numeroBL LIKE '$numeroBL%'" ; }

           if(!empty( $numeroMB)) {$sql.=    "AND numeroMB LIKE '$numeroMB%'" ; }

          // if(!empty( $idAffectation)) {$sql.=    "AND idAffectation LIKE '$idAffectation%'" ; }

          

           if(!empty($dateLivraison)) {$sql.=            "AND dateLivraison ='".$dateLivraison."'" ; }
           if(!empty($idModele)) {$sql.=          "AND materiels.idModele ='".$idModele."'" ; }
           if(!empty($idFamille )) {$sql.=        "AND familles.idFamille ='".$idFamille."'" ; }
           if(!empty($idSousFamille)) {$sql.=     "AND sousfamilles.idSousFamille ='".$idSousFamille."'" ; }
           if(!empty($idMarque)) {$sql.=          "AND modeles.idMarque  ='".$idMarque."'" ; }
           if(!empty($idMagasin)) {$sql.=         "AND materiels.idMagasin ='".$idMagasin."'" ; }
           if(!empty($IdTypeLivraison)) {$sql.=       "AND typeLivraisons.IdTypeLivraison ='".$IdTypeLivraison."'" ; }
           if(!empty($affectation)){$sql.=      "AND niveau1='".$affectation."'" ; }
           if(!empty($etat)){$sql.=             "AND etat='".$etat."'" ; }
           if(!empty($essaiMiseService)){$sql.=            "AND essaiMiseService='".$essaiMiseService."'" ; }
           if(!empty($idFournisseur)){$sql.=      "AND livraisons.idFournisseur='".$idFournisseur."'" ; }
           
          $sql.="GROUP BY numeroInventaire 
                ORDER BY dateLivraison desc";
         $result=$bdd->query($sql); ?>
<div style="margin-top: 80px;background-color: rgba(255,255,255,0.45);">
         <table border="2">
          <tr style="color: green;">
            <th>N° d'inventaire</th> <th>N° de série</th><th>Désignation</th> <th> Marque </th>  <th> Modèle </th> <th>famille</th> <th>Type d'acquisition</th> <th>Fournisseur</th> <th>date de livraison</th><th>lieu de stockage </th><th></th><th></th><th></th> <th></th><th></th>
          </tr>
          <?php
         while($donnees = $result->fetch())
       { ?>

          <tr style="height:100px">
            <td style="font-weight: bold">
              <?php echo $donnees['numeroInventaire']; ?> 
            </td>
            <td>
              <?php echo $donnees['numeroDeSerie']  ; ?>
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
              <?php echo $donnees['typeLivraison'];?>
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
              <a id="imprimer" href="consultationPV.php?identifiantMateriel=<?php echo  $donnees['idMateriel'] ;?>" style="display:table; width:10%; border-spacing:10px;margin-left: 0px;text-decoration: none"><strong>Imprimer le PV</strong></a>
            </td><!--
            <td  style=" white-space: nowrap;padding:0; border-spacing:0">
              <a id="imprimer2" href="impressionBA2.php?identifiantMateriel=<?php echo  $donnees['idMateriel'] ;?>" style="display:table; width:10%; border-spacing:10px;margin-left: 0px;text-decoration: none"><strong>Imprimer <br/>le bulletin <br/>d'affectation</strong></a>
            </td>-->
            <td  style=" white-space: nowrap;padding:0; border-spacing:0">
              <a id="modifier" href="modification_materiel.php?identifiantMateriel=<?php echo  $donnees['idMateriel'] ;?>" style="display:table; width:10%; border-spacing:10px;margin-left: 0px;text-decoration: none"><strong> Modifier</a></strong>
            </td>
            <td style=" white-space: nowrap;padding:0; border-spacing:0">
              <a id="supprimer" href="supprimer.php?identifiantMateriel=<?php echo  $donnees['idMateriel'] ;?>"  onclick="return confirm('Etes vous sûre de vouloir supprimer cette valeur ?');" style="display:table; width:10%; border-spacing:10px;margin-left: 0px;text-decoration: none;"><strong>Supprimer</strong></a>
            </td>
            <td style=" white-space: nowrap;padding:0; border-spacing:0">
              <a id="exporter" href="exportation_model.php?identifiantMateriel=<?php echo  $donnees['idMateriel'] ;?>" style="display:table; width:10%; border-spacing:10px;margin-left: 0px;text-decoration: none"><strong>Exporter</strong></a>
            </td>
            
          </tr>
        

<?php

} 
echo "</table></div>" ;


?>

