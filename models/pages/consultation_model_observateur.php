 <?php
 session_start() ;
  if(!isset($_SESSION['Utilisateur'])){ ?>
  <SCRIPT LANGUAGE="JavaScript">
history.forward()
</SCRIPT>
<?php
}
?>
<style>
.bonjour { color:blue; font-size : 30px; margin-left: 500px ; }
form{ margin-left : 300px; }

</style>
 <?php
echo"<div class='Bonjour'>Bonjour ".$_SESSION['Utilisateur']."</div>" ;

 ?>

 <input type='button' name='deconnexion' value='Se déconnecter' onclick="window.location.href='/codePFE/models/deconnexion_model.php'"class='seDeconnecter'/>
 <?php
  include('C:\wamp64\www\codePFE\models\connexionBD_model.php'); 
echo "<body>
     <form name='myForm' id='myForm' method='post' action='http://localhost/codePFE/models/consultation_resultat_observateur.php'> 
     <table> <tr> <td class='label'> numéro d'inventaire : </td>
          <td> <input type='text' name='numeroInventaire' id='numeroInventaire' class='input'/> </td>
          <td class='label'> Désignation : </td>
          <td> <input type='text' name='designation' id='designation' class='input'/> </td>
        </tr> ";?>
        <tr>
        
          <td class='label'> Marque : </td>
          <td> <select onchange ='selectchange()'name='marqueSelectionee' id='marqueSelectionee'>
           <option value='' class='center'>=====Marques=====</option>
           <?php 
           $sql= 'SELECT * FROM marques order by Marque' ;
           $resultat=$bdd->query($sql);
           while($donnees = $resultat->fetch())
    { 
   
  echo"<option value=".$donnees['idMarque'].">".$donnees['Marque']."</option>";

    } ?>
     
    </select> </td>
          
       


          <td class='label'> Modele : </td>
          <td> <select  name='modeleSelectione' id='modeleSelectione'>
          <option value='' class='center'>=====Modeles=====</option>

  </select> </td>
   <?php echo "</tr>
         <tr>
            <td class='label'> Famille : </td>
            <td> <select onchange='selectSousFamille()'  name='familleSelectionee' id='familleSelectionee'>
     <option value='' class='center'>=====Familles=====</option>" ;
      $sql= 'SELECT * FROM familles' ;
    $resultat=$bdd->query($sql);
    while($donnees = $resultat->fetch())
    {
   
    echo "<option value=".$donnees['idFamille']." name='selectionFamille'>".$donnees['famille']."</option>";
     } 

       echo "</select> </td>
<td class='label'>Sous famille : </td>
            <td> <select name='sousFamilleSelectionee' id='sousFamilleSelectionee'>
     <option value='' class='center'>=====sous Familles=====</option>" ;
       echo "</select> </td>
           
         </tr>
         <tr>
       
         <tr>
            <td class='label'> Type d'achat : </td>
            <td> <select name='typeAchatSelectione' id='typeAchat'>
     <option value='' class='center'>=====Types d'achat=====</option>" ;

            $sql= 'SELECT * FROM typeLivraisons' ;
    $resultat=$bdd->query($sql);
    while($donnees = $resultat->fetch())
    {
   
    echo "<option value=".$donnees['IdTypeLivraison']." name='selectionTypeAchat'>".$donnees['typeLivraison']."</option>";
     } 
     
    echo "</select>  </td>
            <td class='label'> lieu d'affectation : </td>
            <td> <select onchange='loadservice()' name='affectationSelectionee1'id='affectation1'>
     <option value='' class='center'>=====Lieux d'affectation=====</option>" ;

    $sql= 'SELECT DISTINCT niveau1  FROM affectations' ;
    $resultat=$bdd->query($sql);
    while($donnees = $resultat->fetch())
    {
   
    echo "<option value=".$donnees['niveau1']." name='selectionAffectation'>".$donnees['niveau1']."</option>";
     } 
   
     echo"  </select> </td>
          </tr>
          <tr>

     <td class='label'>Lieux affectation: </td>
            <td> <select  onchange='loadservice3()' name='affectationSelectionee2' id='affectation2'>
     <option value='' class='center'>=====Niveau2=====</option>" ;
       echo "</select> </td>

       <td class='label'>Lieux affectation: </td>
            <td> <select name='affectationSelectionee3' id='affectation3'>
     <option value='' class='center'>=====Niveau3=====</option>" ;
       echo "</select> </td>
           
         
         </tr>
         <tr>
            <td class='label'> DateLivriason : </td>
            <td> <input type='text' name='date' id='date' class='input'/> </td>
                <td class='label'> lieu de stockage : </td>
            <td> <select name='magasinSelectionee' id='affectation'>
            <option value='' class='center'>=====Lieux de stockage =====</option>";
       

    
    $sql= 'SELECT * FROM magasins' ;
    $resultat=$bdd->query($sql);
    while($donnees = $resultat->fetch())
    {
   
    echo "<option value=".$donnees['idMagasin']." name='selectionMagasin'>".$donnees['nomMagasin']."</option>";
     }  
      
   echo  "</select></td>
        </tr>
        <tr>
        </tr>
        <tr>
            <td> </td>
            <td> <input type='submit' name='rechercher' id='rechercher' value='Rechercher'/> </td>
            <td> <input type='reset' name='vider' id='vider' value='Vider les champs'/> </td>
          </tr>


   </table>

    </form>";
      ?>
      <script type="text/javascript">

      function selectchange()
      {
          
          var xhttp;
          var idmarque = document.getElementById('marqueSelectionee').value;
          xhttp=new XMLHttpRequest();
          xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              document.getElementById('modeleSelectione').innerHTML = xhttp.responseText;
            }
         };
          xhttp.open("GET", "/codePFE/models/modeles.php?idMarque="+idmarque , true);
          xhttp.send();
        
      }

       function loadservice()
      {
          
          var http;
          var niveau_1 = document.getElementById('affectation1').value;
          http=new XMLHttpRequest();
          http.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              document.getElementById('affectation2').innerHTML = http.responseText;
            }
         };
          http.open("GET", "/codePFE/models/service_niveau2.php?niveau1="+'"'+niveau_1+'"', true);
          http.send();
        
      }

      function loadservice3()
      {
          
          var mhttp;
          var niveau_2 = document.getElementById('affectation2').value;
          mhttp=new XMLHttpRequest();
          mhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              document.getElementById('affectation3').innerHTML = mhttp.responseText;
            }
         };
          mhttp.open("GET", "/codePFE/models/service_niveau3.php?niveau2="+'"'+niveau_2+'"', true);
          mhttp.send();
        
      }

      function selectSousFamille()
      { 
          
          var vhttp;
          var famille_id = document.getElementById('familleSelectionee').value;
          vhttp=new XMLHttpRequest();
          vhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              document.getElementById('sousFamilleSelectionee').innerHTML = vhttp.responseText;
            }
         };
          vhttp.open("GET", "/codePFE/models/sousFamille.php?idFamille="+famille_id, true);
          vhttp.send();
        
      }

    </script>
      <?php
    if(isset($_POST['rechercher'])){
      header("location:'consultation_resultat_observateur.php'") ;
    }

echo "</body>" ;
?>
