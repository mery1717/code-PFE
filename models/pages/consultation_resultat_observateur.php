<?php
 session_start() ;
 echo'<link rel="stylesheet" type="text/css" href="http://localhost/codePFE/codes_vues/impression.css">' ;

  echo'<input type="button"name="imprimer" value="imprimer" onClick="window.print()" id="imprimer" class="couleur"/>' ;
  echo'<a href="exportation_model.php"><input type="button"name="exporter" 
  value = "exporter sous format excel" id="exporter" class="couleur"/></a>' ; 
   include('C:\wamp64\www\codePFE\models\connexionBD_model.php') ;
    
    if(empty($_POST['modeleSelectione']) AND empty($_POST['marqueSelectionee']) AND empty($_POST['numeroInventaire'])
        AND empty($_POST['designation']) AND empty($_POST['typeAchatSelectione']) 
        AND empty($_POST['familleSelectionee']) AND empty($_POST['magasinSelectionee']) 
        AND empty($_POST['affectationSelectionee1']) AND empty($_POST['sousFamilleSelectionee'])
        AND empty($_POST['date'])) { 

            echo " <script> 
            var element1 = document.getElementById('imprimer') ;
                element2 = document.getElementById('exporter') ;
                element3 = document.getElementById('supprimer') ;
                element1.className='none' ;
                element2.className='none' ;
                element3.className='none' ;
          </script> 

      <div class='red'>Veuillez donner au moins un critère de recherche !! <div> ";

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
          }

           $sql= "SELECT nomFournisseur, materiels.idModele , modeles.idMarque ,familles.idFamille , typeLivraisons.idTypeLivraison ,sousfamilles.idSousFamille , materiels.idMateriel ,numeroInventaire ,designation , materiels.idMagasin ,etat , essaiMiseService , numeroDeSerie ,  modele , Marque , famille ,sousFamille , nomMagasin ,dateLivraison , numeroBL , numeroMB , numeroLOT , numeroAO ,typeLivraison,niveau2,niveau1,niveau3  from (((((familles join familles_sousFamilles on familles.idFamille = familles_sousFamilles.idFamille join sousfamilles on familles_sousFamilles.idSousFamille = sousfamilles.idSousFamille inner join materiels on materiels.idSousFamille = sousfamilles.idSousFamille  join modeles on materiels.idModele =modeles.idModele join marques on  modeles.idMarque = marques.idMarque ) join livraisons on materiels.idLivraison = livraisons.idLivraison join typelivraisons on livraisons.idTypeLivraison = typelivraisons.idTypeLivraison) join fournisseurs on fournisseurs.idFournisseur = livraisons.idFournisseur )left join magasins on magasins.idMagasin = materiels.idMagasin)  left join affectation_materiels on affectation_materiels.idMateriel = materiels.idMateriel)left  join affectations on affectations.idAffectation = affectation_materiels.idAffectation  where 1=1 ";


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
          $sql.="GROUP BY numeroInventaire 
                ORDER BY Designation";
         $result=$bdd->query($sql); 
        while($donnees = $result->fetch())
        
       { ?>
        <div class="marge"> 
        <!-- <a id="supprimer" href="supprimer.php?identifiantMateriel=<?php echo  $donnees['idMateriel'] ;?>"  onclick="return confirm('Etes vous sûre de vouloir supprimer cette valeur ?');">supprimer</a> <br/>  -->
        <a id="PV" href="consultationPV.php?identifiantMateriel=<?php echo  $donnees['idMateriel'] ;?>">Voir le PV de reception de ce materiel</a> <br/>     
     <?php
     echo"Numero d'inventaire :";      echo  $donnees['numeroInventaire']  ;         echo "<br>"       ;
     $_SESSION['numeroInventaire'] = $donnees['numeroInventaire']  ;
     echo"Designation : "       ;      echo  $donnees['designation']  ;              echo "<br>"  ;

 
     $_SESSION['designation'] = $donnees['designation']  ;
     echo"Numero de serie : "   ;      echo  $donnees['numeroDeSerie']    ;          echo "<br>"    ;
      
     $_SESSION['numeroDeSerie'] = $donnees['numeroDeSerie']  ;

     echo"Marque :"        ;           echo  $donnees['Marque']          ;            echo "<br>"  ;
     $_SESSION['Marque'] = $donnees['Marque']  ;
     echo"modele : "       ;           echo  $donnees['modele']          ;            echo "<br>"  ;
     $_SESSION['modele'] = $donnees['modele']  ;

     echo"famille : "      ;           echo  $donnees['famille']         ;            echo "<br>"   ;
      $_SESSION['famille'] = $donnees['famille']  ;

     
     echo"livré le "       ;           echo  $donnees['dateLivraison']    ;
      
     $_SESSION['dateLivraison'] = $donnees['dateLivraison']  ;

     echo"par : "  ;                  echo  $donnees['nomFournisseur']  ;            echo "<br>"  ;

     $_SESSION['nomFournisseur'] = $donnees['nomFournisseur']  ;
     if($donnees['nomMagasin']==''){
      if(!empty($affectation) ||!empty($niveau2)  ||!empty($niveau3)) {

        $sql2 ="SELECT nomFournisseur, materiels.idModele , modeles.idMarque ,familles.idFamille , typeLivraisons.idTypeLivraison ,sousfamilles.idSousFamille , materiels.idMateriel ,numeroInventaire ,designation , materiels.idMagasin ,etat , essaiMiseService , numeroDeSerie ,  modele , Marque , famille ,sousFamille , nomMagasin ,dateLivraison , numeroBL , numeroMB , numeroLOT , numeroAO ,typeLivraison,niveau2,niveau1,niveau3  from (((((familles join familles_sousFamilles on familles.idFamille = familles_sousFamilles.idFamille join sousfamilles on familles_sousFamilles.idSousFamille = sousfamilles.idSousFamille inner join materiels on materiels.idSousFamille = sousfamilles.idSousFamille  join modeles on materiels.idModele =modeles.idModele join marques on  modeles.idMarque = marques.idMarque ) join livraisons on materiels.idLivraison = livraisons.idLivraison join typelivraisons on livraisons.idTypeLivraison = typelivraisons.idTypeLivraison) join fournisseurs on fournisseurs.idFournisseur = livraisons.idFournisseur )left join magasins on magasins.idMagasin = materiels.idMagasin)  left join affectation_materiels on affectation_materiels.idMateriel = materiels.idMateriel)left  join affectations on affectations.idAffectation = affectation_materiels.idAffectation  where 1=1 ";    ;  
        if(!empty($affectation)){ $sql.="AND    affectations.niveau1 LIKE '$affectation%'" ; }
        if(!empty($niveau2)){ $sql.=    "AND    affectations.niveau2 LIKE '$niveau2%'" ; }
        if(!empty($niveau3)){ $sql.=    "AND    affectations.niveau2 LIKE '$niveau3%'" ; }


        $resultat2 = $bdd -> query($sql2); 

        
        while($donnees = $sql2)
        {

      echo"le materiel est affecté à '".$donnees['niveau1']."'  " ;
       
     $_SESSION['niveau1'] = $donnees['niveau1']  ;
     } 
      }

      } 
      else{
     echo "stocké dans : " ;           echo  $donnees['nomMagasin']             ;     echo "<br>"      ; 
    
     $_SESSION['nomMagasin'] = $donnees['nomMagasin']  ;
    }  
    
     echo"Numero de marché et de bon de commande  :"      ;           echo  $donnees['numeroMB']        ;            echo "<br>"    ;
     $_SESSION['numeroMB'] = $donnees['numeroMB']  ;

     echo "Numero de bon de livraison :"     ;           echo  $donnees['numeroBL']        ;            echo "<br>"    ;
     $_SESSION['numeroBL'] = $donnees['numeroBL']  ;

     echo "Numero de LOT :"    ;           echo  $donnees['numeroLOT']       ;            echo "<br>"     ;
     $_SESSION['numeroLOT'] = $donnees['numeroLOT']  ;

     echo"Numero de l'appel d'offre :"      ;           echo  $donnees['numeroAO']        ;            echo "<br>"    ;
     $_SESSION['numeroAO'] = $donnees['numeroAO']  ;
     echo"</div>" ;
 }
   
if( !$donnees = $result->fetch()) {
        echo " <script> 
            var element1 = document.getElementById('imprimer') ;
                element2 = document.getElementById('exporter') ;
                element3 = document.getElementById('supprimer') ;
                element1.className='none' ;
                element2.className='none' ;
                element3.className='none' ;
          </script> 

      <div class='red'> Aucun resultat pour les critères données <div> ";
 
}


}

?>
   
