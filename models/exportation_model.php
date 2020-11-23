 <?php
 
  header('Content-type: application/text.csv'); 
  header('Content-Disposition: inline; filename=table d\'informations.xls');
  include('C:\wamp64\www\codePFE\models\connexionBD_model.php') ;
$sql ="SELECT nomFournisseur, materiels.idModele , modeles.idMarque ,familles.idFamille , typeLivraisons.idTypeLivraison ,sousfamilles.idSousFamille , materiels.idMateriel ,numeroInventaire ,designation , materiels.idMagasin ,etat , essaiMiseService , numeroDeSerie ,  modele , Marque , famille ,sousFamille , nomMagasin ,dateLivraison , numeroBL , numeroMB , numeroLOT , numeroAO ,typeLivraison,niveau2,niveau1,niveau3  from (((((familles join familles_sousFamilles on familles.idFamille = familles_sousFamilles.idFamille join sousfamilles on familles_sousFamilles.idSousFamille = sousfamilles.idSousFamille inner join materiels on materiels.idSousFamille = sousfamilles.idSousFamille  join modeles on materiels.idModele =modeles.idModele join marques on  modeles.idMarque = marques.idMarque ) join livraisons on materiels.idLivraison = livraisons.idLivraison join typelivraisons on livraisons.idTypeLivraison = typelivraisons.idTypeLivraison) join fournisseurs on fournisseurs.idFournisseur = livraisons.idFournisseur )left join magasins on magasins.idMagasin = materiels.idMagasin)  left join affectation_materiels on affectation_materiels.idMateriel = materiels.idMateriel)left  join affectations on affectations.idAffectation = affectation_materiels.idAffectation  where  materiels.idMateriel ='".$_GET['identifiantMateriel']."' ";
 $result=$bdd->query($sql); 

  while($donnees = $result->fetch())
       { 
   echo'<table>
    <tr>  

<td> Numero d\'inventaire : </td> <td>'; echo $donnees['numeroInventaire']  ;  echo'</td>
</tr>

<tr>  
<td>  Designation : </td> <td>' ;echo $donnees['designation'] ;  echo'</td>
</tr>


<tr>  
<td> Numero de serie : </td> <td>' ;echo $donnees['numeroDeSerie'] ;  echo'</td>
</tr>

<tr>  
<td> Modele : </td> <td>' ;echo $donnees['modele'] ;  echo'</td>
</tr>

<tr>  
<td> Marque : </td> <td>' ;echo $donnees['Marque'] ;  echo'</td>
</tr>

<tr>  
<td> Famille : </td> <td>' ;echo $donnees['famille'] ;  echo'</td>
</tr>



<tr>  
<td> Date de livraison : </td> <td>' ;echo $donnees['dateLivraison'] ;  echo'</td>
</tr>

<tr>  
<td> Fournisseur : </td> <td>' ;echo $donnees['nomFournisseur'] ;  echo'</td>
</tr>

 <tr>  
<td> lieu de stockage : </td> <td>' ;echo $donnees['nomMagasin'] ;  echo'</td>
</tr>

<tr>  
<td> N° de marche/bon de commande : </td> <td>' ;echo $donnees['numeroMB'] ;  echo'</td>
</tr>

<tr>  
<td> NumeroBL : </td> <td>' ;echo $donnees['numeroBL'] ;  echo'</td>
</tr>

<tr>  
<td> NumeroLOT : </td> <td>' ;echo $donnees['numeroLOT'] ;  echo'</td>
</tr>

<tr>
<td> numeroAO : </td> <td>' ;echo $donnees['numeroAO'] ;  echo'</td>
</tr>

</table>' ; 

}
      ?>