<?php
session_start() ;
?>
<h2> BULLETIN D'AFFECTATION </h2>
<?php
 include('C:\wamp64\www\codePFE\models\connexionBD_model.php') ;
   $sql= "SELECT nomFournisseur, livraisons.idFournisseur , materiels.idModele , modeles.idMarque ,familles.idFamille,affectation_materiels.idAffectation , affectation_materiels.idMateriel , dateAffectation , typeLivraisons.idTypeLivraison ,sousfamilles.idSousFamille , materiels.idMateriel ,numeroInventaire ,designation , materiels.idMagasin ,etat , essaiMiseService , numeroDeSerie ,  modele , Marque , famille ,sousFamille , nomMagasin ,dateLivraison , numeroBL , numeroMB , numeroLOT , numeroAO ,typeLivraison,niveau2,niveau1,niveau3  from (((((familles join familles_sousFamilles on familles.idFamille = familles_sousFamilles.idFamille join sousfamilles on familles_sousFamilles.idSousFamille = sousfamilles.idSousFamille inner join materiels on materiels.idSousFamille = sousfamilles.idSousFamille  join modeles on materiels.idModele =modeles.idModele join marques on  modeles.idMarque = marques.idMarque ) join livraisons on materiels.idLivraison = livraisons.idLivraison join typelivraisons on livraisons.idTypeLivraison = typelivraisons.idTypeLivraison) join fournisseurs on fournisseurs.idFournisseur = livraisons.idFournisseur )left join magasins on magasins.idMagasin = materiels.idMagasin)  left join affectation_materiels on affectation_materiels.idMateriel = materiels.idMateriel)left  join affectations on affectations.idAffectation = affectation_materiels.idAffectation where affectation_materiels.idMateriel ='".$_GET['identifiantMateriel']."'";
   $result = $bdd->query($sql)  ; 
while($donnees=$result->fetch()) {
  $_SESSION['dateAffectation'] = $donnees['dateAffectation'] ;
  echo $donnees['dateAffectation'] ; 
  $_SESSION['affectation_materiels.idAffectation'] = $donnees['affectation_materiels.idAffectation'] ; ?>

<table>
	<tr><td> Matériel : </td><td><?php echo $donnees['famille'] ;?></td></tr>
	<tr><td>Formation : </td><td>lieu????</td></tr>

	<tr><td> Programme: </td><td><?php echo $donnees['numeroMB'] ;?></td></tr>

</table>
 <?php }


  $req2="SELECT nomFournisseur, livraisons.idFournisseur , materiels.idModele , modeles.idMarque ,familles.idFamille ,     affectation_materiels.idAffectation , affectation_materiels.idMateriel ,dateAffectation , typeLivraisons.idTypeLivraison ,sousfamilles.idSousFamille , materiels.idMateriel ,numeroInventaire ,designation , materiels.idMagasin ,etat , essaiMiseService , numeroDeSerie ,  modele , Marque , famille ,sousFamille , nomMagasin ,dateLivraison , numeroBL , numeroMB , numeroLOT , numeroAO ,typeLivraison,niveau2,niveau1,niveau3  from (((((familles join familles_sousFamilles on familles.idFamille = familles_sousFamilles.idFamille join sousfamilles on familles_sousFamilles.idSousFamille = sousfamilles.idSousFamille inner join materiels on materiels.idSousFamille = sousfamilles.idSousFamille  join modeles on materiels.idModele =modeles.idModele join marques on  modeles.idMarque = marques.idMarque ) join livraisons on materiels.idLivraison = livraisons.idLivraison join typelivraisons on livraisons.idTypeLivraison = typelivraisons.idTypeLivraison) join fournisseurs on fournisseurs.idFournisseur = livraisons.idFournisseur )left join magasins on magasins.idMagasin = materiels.idMagasin)  left join affectation_materiels on affectation_materiels.idMateriel = materiels.idMateriel)left  join affectations on affectations.idAffectation = affectation_materiels.idAffectation  where dateAffectation='".$_SESSION['dateAffectation']."' AND affectation_materiels.idAffectation ='".$_SESSION['affectation_materiels.idAffectation']."'  ";?>
<table>
 <tr> 
 	  <td colspan="2">N° inventaire </td> 
 	  <td rowspan="2">Designation Materiel</td>
 	  <td rowspan="2">QuantitéLivrée</td>
     </tr>
     <tr>
     	<td>Délégation</td>
     	<td>formation</td>

     </tr>


   <?php      $result2 = $bdd->query($req2) ; 
         while($donnees2=$result2->fetch()) {
    echo'   <tr> 
 	  <td colspan="2">'; echo "'".$donnees2['numeroInventaire']."' </td> 
 	  <td rowspan='2'>" ;echo"'".$donnees2['designation']."' <br> Marque ::  '".$donnees2['Marque']."' <br> Modele : '".$donnees2['Marque']."' </td>
 	  <td rowspan='2'>01</td>
 	  <td>Délégation</td>
      <td>formation</td>

     </tr>"  ;

	     }	?>

  </table>

  <table>
  	<tr>
  	   <td> Délègue du ministère de la santé de Settat : </td>
  	   <td>Administrateur provincial : </td>
  	   <td> Responsable du BIM </td>
  	   <td> Accusé de réception </td>
  	</tr>
  </table>
