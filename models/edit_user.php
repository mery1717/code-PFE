<?php

if(isset($_POST['modifier'])) {


 //   <?php
 // session_start() ;
  if(!empty($_POST['PPR'])) {
  
   include('C:\wamp64\www\mini_projet_BDR\models\connexionBD_model.php'); 
  $sql= "SELECT * FROM users WHERE users.PPR ='".$_POST['PPR']."' ";
    $resultat=$bdd->query($sql);
    

 while($donnees = $resultat-> fetch())

    {
   
$nom         = $donnees['nom'] ;
$prenom      = $donnees['prenom'] ;
$profile     = $donnees['profile'] ;
$email       = $donnees['adresseMail'] ;
$login       = $donnees['login'] ;
$password    = md5($donnees['password']) ;
 
 }}}
?>

<?php
session_start() ;
 // empecher le retour à la page précédente lors de la deconnexion
 if(!isset($_SESSION['Utilisateur'])){ ?>
  <SCRIPT LANGUAGE="JavaScript">
history.forward()
</SCRIPT>
<?php
}
 include('C:\wamp64\www\mini_projet_BDR\models\connexionBD_model.php'); ?>

 <head>
   <!-- change the include's link --> 
  <?php include '../codes_vues/header_vue.php' ?>
</head>
 <!-- add the style --> 
<body onmousemove="temps=0" onload='time_out();' style="margin-top: 0px ;background-color: gray;background-repeat:no-repeat;background-size: cover;">
  <!-- this= line too bellow--> 
 <?php  include 'C:\wamp64\www\mini_projet_BDR\codes_vues\hea.php'; ?>
 <!-- the nav bar -->
 <hr style="background: gray; color :black;height: 5px; margin-bottom: 0px;margin-top: 0px;">
      <nav class="navbar" style="margin-bottom: 0px;margin-right: 0 auto;margin-left: 0px auto;margin-top: 0px;background:white" >
        <div class="fluid">
          <div class="navbar-header">
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
                  <a><input type="button"  value ="Acceuil" class="btn btn-info" style="margin-left: 14%;margin-right: 2%;margin-top: 3%; border-color: red;width: 100px;" role="button" onclick="window.location.href='http://localhost/mini_projet_BDR/controleurs/pageAcceuilAdmin_controleur'"></a>
                </li>
                  <li><a href="/mini_projet_BDR/models/deconnexion_model.php" name="deconnexion" class="btn btn-outline-danger" style="color:black;margin-left: 75vw;border-color: red;" role="button">se deconnecter</a></li>
              </ul>
          </div>
      </div>
    </nav>
<!-- the end of navbar-->

 <!-- (i comemented this)input type="button" name="deconnexion" value="Se deconnecter" onclick="window.location.href='/mini_projet_BDR/models/deconnexion_model.php'" class="btn btn-outline-success" style="margin-left: 90vw;border-color: red;" role="button"-->
 <!--changing the style -->
 <hr width="50%">  <h2 style="font-family: arial;color: black;"><center>Modification d'utilisateur</center></h2> 
   <hr width="50%">
<!-- add a style to thee form bellow-->  
   <div class="container">
 <form method='POST'  name='myForm' id='myForm'  style="background:rgba(255,255,255,0.38);height:550px ;color: black ;" action= "<?php echo $_SERVER['PHP_SELF']; ?>">
  <!-- add div -->
  <div class="container" style="margin-top: 6px;padding-top: 6%;margin-right: 0px;margin-left: 20%">
   <table>
  <tr>
    <td class='td'>
    
  <tr>
   <td> <h3 style="color: black;font-size: 21px;padding-left: 20%;"> Nom : </h3></td>
    <td>
    <input type='text' name='Nom' id='Nom' placeholder="Au moins 2 caractères" value="<?php echo $nom ;?>" style="height: 34px; font-size: 17px;width: 100%" required='required'>
    </td><td>  
   <div class='tool' id="Nom_error" ></div> </td>
  </tr>
  <tr>
    <td> <h3 style="color: black;font-size: 21px;padding-left: 20%;"> Prénom :</h3> </td> 
    <td>
      <input type='text' name='Prenom' id='Prenom' placeholder="Au moins 2 caractères" value="<?php echo $prenom ;?>" style="height: 34px; font-size: 17px;width: 100%" required='required'>
      </td><td>  
      <div class='tool' id="Prenom_error"></div> </td>
  </tr>
   <tr>
   <td> <h3 style="color: black;font-size: 21px;padding-left: 20%;"> Login: </h3> </td>
    <td>
    <input type='text' name='login' id='login' placeholder="Au moins 4 caractères" value="<?php echo $login ;?>" style="height: 34px; font-size: 17px;width: 100%" required='required'>
      </td><td>  
   <div class='tool' id="login_error"></div> </td>
  </tr>
  <tr>
   <td> <h3 style="color: black;font-size: 21px;padding-left: 20%;"> Profile: </h3> </td>
    <td>
     <select name='profileSelectionne' id='profile'  style="height: 34px; font-size: 17px;width: 100%" required='required'>
       <option value='<?php echo $profile ;?>' class='center'><?php echo $profile ;?></option>
       <option value='observateur' class='center'>observateur</option>
       <option value='utilisateur' class='center'>utilisateur</option>
       <option value='administrateur' class='center'>administrateur</option>
      </select>
    </td>
  </tr>
   <tr>
   <td> <h3 style="color: black;font-size: 21px;padding-left: 20%;"> Adresse mail :</h3> </td>
    <td>
    <input type='email' name='email' id='email' placeholder="Veuillez entrer un email valide" value="<?php echo $email ;?> " style="height: 34px; font-size: 17px;width: 100%" required='required'>
    </td><td>  
     <div class='tool' id="email_error" ></div></td>
  </tr>
  <tr>
    <td>  <h3 style="color: black;font-size: 21px;padding-left: 20%;"> Mot de passe :</h3> </td>
    <td>
    <input type='password' name='mot_pass' id='mot_pass' placeholder="Au moins 6 caractères" value="<?php echo $password ;?> " style="height: 34px; font-size: 17px;width: 100%" required='required'>
    </td><td>  
     <div class='tool' id="mot_pass_error" ></div></td>
  </tr>
  <tr>
   <td> <h3 style="color: black;font-size: 21px;padding-left: 20%;"> Confirmer mot de passe :</h3> </td>
    <td>
      <input type='password' name='mot_pass_con' id='mot_pass_con' placeholder="Identique à celui d'origine" value="<?php echo $password ;?> " style="height: 34px; font-size: 17px;width: 100%" required='required'>
      </td><td>  
     <div class='tool'id="mot_pass_con_error" ></div> </td>
   </tr>
    <tr>
       <td>
     </td>
     <td style="padding-top: 2%;">
      <input type='submit'  name='valider' value='valider' style="color: black;background: #4fb783;height: 35px;width: 100px; border-color: transparent;padding-left: 10%;font-weight: bold;" class='button' />
      <input type ='reset' name='réinitialiser' style="color: black;background: #f67280;height: 35px;width: 100px; border-color:transparent;margin-left: 10%;font-weight: bold;" value='réinitialiser' class='button'/>
       </td>
   </tr>
   </table>
</form>
</div>
<?php 
    
      /*if() heeeeeeeeere!*/
    
      if(isset($_POST['valider'])) 
 {     

   
    
  
   
          if (strlen($_POST['Nom'])<2) {
            echo'<script>
                alert("Le nom doit contenir au moins 2 caractères");
            </script>';
            
          }
          elseif (strlen($_POST['Prenom'])<2) {
            echo'<script>
                alert("Le prenom doit contenir au moins 2 caractères");
            </script>';
            
          }
          elseif (strlen($_POST['login'])<4) {
            echo'<script>
                alert("Le login doit contenir au moins 4 caractères");
            </script>';
            
          }
          elseif (strlen($_POST['mot_pass'])<4) {
            echo'<script>
                alert("Le mot de passe doit contenir au moins 6 caractères");
            </script>';
            
          }
          elseif ($_POST['mot_pass']!=$_POST['mot_pass_con']) {
             echo '<script> alert("Les deux mots de passe ne sont pas identique"); </script>';
           } 
          else{
             $nom =$_POST['Nom'];
             $prenom=$_POST['Prenom'];
             $email=$_POST['email'];
             $login=$_POST['login'];
             $profile=$_POST['profileSelectionne'];
            $mot_pass=$_POST['mot_pass'];
            $password=md5($mot_pass);

            $stmt = $bdd->prepare('UPDATE `users` SET `nom`="'.$nom.'",`prenom`="'.$prenom.'",`login`="'.$login.'",`password`="'.$password.'",`profile`="'.$profile.'",`email`="'.$email.'", where users.PPR='.$_SESSION['PPR'].'');
        $stmt->execute();
  
  
    echo '
    <script>
        alert("l\'utilisateur a bien été modifié");
      </script>    ';
      
    } 
/*
$sql2 ="UPDATE users SET

    nom ='".$nom."', prenom ='".$Prenom."', login ='". $login."', password ='".$password."' , adresseMail ='".$email."' , profile ='".$profile."'
    WHERE users.PPR ='".$_SESSION['PPR']."' " ;
    $req = $bdd->query($sql2) ;

values(:Nom,:Prenom ,:login, :$mot_pass , :profile , :email )'/*);
  $p ->execute(Array(

  'Nom'     =>$_POST['Nom'],
 'Prenom'  =>$_POST['Prenom'],
 'email'   =>$_POST['email'],
 'mot_pass'=>$mot_pass ,
 'login'   =>$_POST['login'],
 'profile' =>$_POST['profileSelectionne']
  )); */

 


            
      

  }
?>

</body> 