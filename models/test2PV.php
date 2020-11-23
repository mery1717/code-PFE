<?php
      include('C:\wamp64\www\codePFE\models\connexionBD_model.php') ;

       echo"LA SOCIETE : ".$_SESSION['nomFournisseur']." TITULAIRE DU MARCHE N° : ".$_SESSION['numeroMB']." " ; 
       echo"<br>" ; $_SESSION['numeroAO']." A LIVRE LE ".$_SESSION['dateLivraison']." " ; 
       // $_SESSION['dateLivraison']=$donnees livré['dateLivraison'] ; 

       echo"<br>" ;
       echo "A LA DELEGATION REGIONNAL DE SANTE DE LA PROVINCE SETTAT LE MATERIEL SUIVANT :" ; 
       echo"<br>" ;    
        ?>
          <div> IDENTIFICATION:</div>
         <br/>
        <?php
        echo "DESIGNATIONS : ".$_SESSION['designation']." ";
        echo"<br>" ;
        echo"N° DE LOT :    ".$_SESSION['numeroLOT']." QUANTITE : ".$_SESSION['quantiteLivree']."  "  ;  
        echo"MARQUE: ".$_SESSION['Marque'].""  ;  echo "MODELE :".$_SESSION['modele']." " ; echo"<br>" ; 
        echo"BLN :".$_SESSION['numeroBL']." " ; echo"<br>" ; 
       
      // $_SESSION['numeroInventaire'] = $donnees['numeroInventaire'] ;
      echo"N° D'INVENTAIRE : ".$_SESSION['numeroInventaire']." "; 
      echo"<br/>" ;
        echo"N° DE SERIE :  ".$_SESSION['numeroDeSerie']." " ;
         }
		   //    header('location:testPV.php') ;
      //     $date =  $donnees['dateLivraison'] ; 
      //     echo $date ;
         echo   $_SESSION['dateLivraison'];
                $req2="SELECT * from  view_livraisons  where dateLivraison=".$_SESSION['dateLivraison']." ";
      //    echo"N° D'INVENTAIRE : ";

         $result2 = $bdd->query($req2) ; 
        while($donnees2=$result2->fetch()) {
      echo "hello" ;
      // echo"->".$_SESSION['dateLivraison']." "; echo"<br/>" ;
      echo"->".$donnees2['dateLivraison']." ";

	     }		