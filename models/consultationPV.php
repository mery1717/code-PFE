<?php
session_start() ;
include('C:\wamp64\www\codePFE\models\connexionBD_model.php') ;
   echo'<link rel="stylesheet" type="text/css" href="http://localhost/codePFE/codes_vues/impression.css">' ;
   echo'<input type="button"name="imprimer" value="imprimer" onClick="window.print()" id="imprimer" class="couleur"/>' ; 

   echo"<br/>" ;
 $req="SELECT nomFournisseur, materiels.idModele , modeles.idMarque ,familles.idFamille , typeLivraisons.idTypeLivraison ,sousfamilles.idSousFamille , materiels.idMateriel ,numeroInventaire ,designation , materiels.idMagasin ,etat , essaiMiseService , numeroDeSerie ,  modele , Marque , famille ,sousFamille , nomMagasin ,dateLivraison , numeroBL , numeroMB , numeroLOT , numeroAO ,typeLivraison,niveau2,niveau1,niveau3  from (((((familles join familles_sousFamilles on familles.idFamille = familles_sousFamilles.idFamille join sousfamilles on familles_sousFamilles.idSousFamille = sousfamilles.idSousFamille inner join materiels on materiels.idSousFamille = sousfamilles.idSousFamille  join modeles on materiels.idModele =modeles.idModele join marques on  modeles.idMarque = marques.idMarque ) join livraisons on materiels.idLivraison = livraisons.idLivraison join typelivraisons on livraisons.idTypeLivraison = typelivraisons.idTypeLivraison) join fournisseurs on fournisseurs.idFournisseur = livraisons.idFournisseur )left join magasins on magasins.idMagasin = materiels.idMagasin)  left join affectation_materiels on affectation_materiels.idMateriel = materiels.idMateriel)left  join affectations on affectations.idAffectation = affectation_materiels.idAffectation  where  materiels.idMateriel ='".$_GET['identifiantMateriel']."' ";


$result = $bdd->query($req)  ; 
while($donnees=$result->fetch()) {
  $_SESSION['nomFournisseur'] = $donnees['nomFournisseur'] ;

  $_SESSION['numeroMB']        = $donnees['numeroMB'] ; 
  $_SESSION['numeroAO']        = $donnees['numeroAO'] ; 
  $_SESSION['dateLivraison']   = $donnees['dateLivraison'] ;
  $_SESSION['designation']     = $donnees['designation'] ;
  $_SESSION['numeroLOT']       = $donnees['numeroLOT'] ;
  $_SESSION['quantiteLivree']  = $donnees['quantiteLivree'] ;
  $_SESSION['modele']          = $donnees['modele'] ;
  $_SESSION['numeroBL']        = $donnees['numeroBL'] ;
  $_SESSION['numeroInventaire']= $donnees['numeroInventaire'] ;
  $_SESSION['numeroDeSerie']   = $donnees['numeroDeSerie'] ;
  
            header('test2PV.php') ; 


       echo"LA SOCIETE :&nbsp ".$donnees['nomFournisseur']." &nbsp;&nbsp;&nbsp;&nbsp TITULAIRE DU MARCHE N° : ".$donnees['numeroMB']." " ; 
       echo"<br>" ; 
       echo"PASSE PAR APPEL D'OFFRE N° :  ".$donnees['numeroAO']." &nbsp;&nbsp;&nbsp;&nbsp  A LIVRE LE ".$donnees['dateLivraison']." " ; 

       echo"<br>" ;
       echo "A LA DELEGATION REGIONNAL DE SANTE DE LA PROVINCE SETTAT LE MATERIEL SUIVANT :" ; 
       echo"<br>" ;    
        ?>
          <div> IDENTIFICATIONS:</div>
         <br/>
        <?php
        echo "DESIGNATIONS : ".$donnees['designation']." ";
        echo"<br>" ;
        echo"N° DE LOT :    ".$donnees['numeroLOT']." QUANTITE : ".$donnees['quantiteLivree']."  "  ;  
        echo"MARQUE: ".$donnees['Marque'].""  ;  echo "MODELE :".$donnees['modele']." " ; echo"<br>" ; 
        echo"BLN :".$donnees['numeroBL']." " ; echo"<br>" ; 
       
      $_SESSION['numeroInventaire'] = $donnees['numeroInventaire'] ;
      echo"<br/>" ;
        echo"N° DE SERIE :   ".$donnees['numeroDeSerie']." " ;
         }
         $req2="SELECT * from  view_livraisons  where dateLivraison = '".$_SESSION['dateLivraison']."'";

         $result2 = $bdd->query($req2) ; 
         echo"N° D'INVENTAIRE :";
        while($donnees2=$result2->fetch()) {
      echo" ".$donnees2['numeroInventaire']." --->";  

	     }	
  ?>