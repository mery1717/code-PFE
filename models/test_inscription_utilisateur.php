<?php
session_start() ;
 // empecher le retour à la page précédente lors de la deconnexion
 if(!isset($_SESSION['Utilisateur'])){ ?>
  <SCRIPT LANGUAGE="JavaScript">
history.forward()
</SCRIPT>
<?php
}
 include('C:\wamp64\www\codePFE\models\connexionBD_model.php'); ?>

 <head>
   <!-- change the include's link --> 
  <?php include '../codes_vues/header_vue.php' ?>
</head>
 <!-- add the style --> 
<body onmousemove="temps=0" onload='time_out();' style="margin-top: 0px ;background-color: gray;background-repeat:no-repeat;background-size: cover;">
  <!-- this= line too bellow--> 
 <?php  include 'C:\wamp64\www\CodePFE\codes_vues\hea.php'; ?>
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
                  <li><a href="/codePFE/models/deconnexion_model.php" name="deconnexion" class="btn btn-outline-danger" style="color:black;margin-left: 70vw;border-color: red;font-weight: bold;" role="button">se deconnecter</a></li>
              </ul>
          </div>
      </div>
    </nav>
<!-- the end of navbar-->

 <!-- (i comemented this)input type="button" name="deconnexion" value="Se deconnecter" onclick="window.location.href='/codePFE/models/deconnexion_model.php'" class="btn btn-outline-success" style="margin-left: 90vw;border-color: red;" role="button"-->
 <!--changing the style -->
 <hr width="50%">  <h2 style="font-family: arial;color: black;"><center>Ajoutez un nouveau utilisateur</center></h2> 
   <hr width="50%">
<!-- add a style to thee form bellow-->  
   <div class="container">
 <form method='POST'  name='myForm' id='myForm'  style="background:rgba(255,255,255,0.38);height:550px ;color: black ;" action= <?php echo $_SERVER['PHP_SELF'] ;?>>
  <!-- add div -->
  <div class="container" style="margin-top: 6px;padding-top: 6%;margin-right: 0px;margin-left: 20%">
   <table>
  <tr>
    <td class='td'>
    
  <tr>
   <td> <h3 style="color: black;font-size: 21px;padding-left: 20%;"> Nom : </h3></td>
    <td>
    <input type='text' name='Nom' id='Nom' placeholder="Au moins 2 caractères" style="height: 34px; font-size: 17px;width: 100%" required='required'>
    </td><td>  
   <div class='tool' id="Nom_error" ></div> </td>
  </tr>
  <tr>
    <td> <h3 style="color: black;font-size: 21px;padding-left: 20%;"> Prénom :</h3> </td> 
    <td>
      <input type='text' name='Prenom' id='Prenom' placeholder="Au moins 2 caractères" style="height: 34px; font-size: 17px;width: 100%" required='required'>
      </td><td>  
	    <div class='tool' id="Prenom_error"></div> </td>
  </tr>
   <tr>
   <td> <h3 style="color: black;font-size: 21px;padding-left: 20%;"> Login: </h3> </td>
    <td>
    <input type='text' name='login' id='login' placeholder="Au moins 4 caractères" style="height: 34px; font-size: 17px;width: 100%" required='required'>
      </td><td>  
   <div class='tool' id="login_error"></div> </td>
  </tr>
  <tr>
   <td> <h3 style="color: black;font-size: 21px;padding-left: 20%;"> Profile: </h3> </td>
    <td>
     <select name='profileSelectionne' id='profile'  style="height: 34px; font-size: 17px;width: 100%" required='required'>
       <option value='' class='center'>=======Profiles========</option>
       <option value='observateur' class='center'>observateur</option>
       <option value='utilisateur' class='center'>utilisateur</option>
       <option value='administrateur' class='center'>administrateur</option>
      </select>
    </td>
  </tr>
   <tr>
   <td> <h3 style="color: black;font-size: 21px;padding-left: 20%;"> Adresse mail :</h3> </td>
    <td>
    <input type='email' name='email' id='email' placeholder="Veuillez entrer un email valide" style="height: 34px; font-size: 17px;width: 100%" required='required'>
    </td><td>  
     <div class='tool' id="email_error" ></div></td>
  </tr>
  <tr>
    <td>  <h3 style="color: black;font-size: 21px;padding-left: 20%;"> Mot de passe :</h3> </td>
    <td>
    <input type='password' name='mot_pass' id='mot_pass' placeholder="Au moins 6 caractères" style="height: 34px; font-size: 17px;width: 100%" required='required'>
    </td><td>  
     <div class='tool' id="mot_pass_error" ></div></td>
  </tr>
  <tr>
   <td> <h3 style="color: black;font-size: 21px;padding-left: 20%;"> Confirmer mot de passe :</h3> </td>
    <td>
      <input type='password' name='mot_pass_con' id='mot_pass_con' placeholder="Identique à celui d'origine" style="height: 34px; font-size: 17px;width: 100%" required='required'>
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
    if($_SERVER['REQUEST_METHOD']=='POST'){
      /*if() heeeeeeeeere!*/
    
      if(isset($_POST['valider'])) 
 {     if (!empty($_POST['Nom']) && !empty($_POST['Prenom']) && !empty($_POST['email']) 
       && !empty($_POST['mot_pass']) &&!empty($_POST['mot_pass_con']) && !empty($_POST['profileSelectionne']) && !empty($_POST['login'])){

   	$sql2 ="SELECT * FROM users where login ='".$_POST['login']."'" ;
   	$resultat2 =$bdd->query($sql2) ;
   	if($donnees=$resultat2->fetch()) { ?>
      <script>
        alert("ce login existe déjà, veuillez chosir un autre ");
      </script>
     <!--<div style="margin-left :200px ;color:red ;"> ce login existe déjà, veuillez chosir un autre </div>-->
 <?php 
	}
  elseif(empty($_POST['Nom']) || empty($_POST['Prenom']) || empty($_POST['email']) 
   || empty($_POST['mot_pass']) ||empty($_POST['mot_pass_con']) || empty($_POST['profileSelectionne']) || empty($_POST['login'])) { ?>
              <div style="margin-left :200px ;color:red ;" > veuillez renseigner tout les champs</div> 
          <?php    } 
          elseif (strlen($_POST['Nom'])<2) {
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
             $Nom =$_POST['Nom'];
             $Prenom=$_POST['Prenom'];
             $email=$_POST['email'];
             $login=$_POST['login'];
             $profileSelectionne=$_POST['profileSelectionne'];
            $mot_pass=$_POST['mot_pass'];
            $password_md5=md5($mot_pass);
  $p = $bdd->prepare(' INSERT INTO users (nom , prenom , login , password ,profile ,adresseMail)
     VALUES (?, ?, ?, ?, ?,?)');
     $p->execute([$Nom, $Prenom, $login, $password_md5,$profileSelectionne,$email]);
/*values(:Nom,:Prenom ,:login, :$mot_pass , :profile , :email )'/*);
  $p ->execute(Array(

  'Nom'     =>$_POST['Nom'],
 'Prenom'  =>$_POST['Prenom'],
 'email'   =>$_POST['email'],
 'mot_pass'=>$mot_pass ,
 'login'   =>$_POST['login'],
 'profile' =>$_POST['profileSelectionne']
  )); */
$sql3 ="SELECT * FROM users where login ='".$_POST['login']."'" ;
    $resultat3 =$bdd->query($sql3) ;
    if($donnees=$resultat3->fetch()) { 
      echo '
    <script>
        alert("le nouveau utilisateur a bien été enregistré ");
      </script>    ';}

      else 
        echo '
    <script>
        alert("le nouveau utilisateur n\'a pas été enregistré, veuillez réessayer ");
      </script>    ';
 }

    }


            
   		
}
  }
?>

</body> 
<!--
<script type="text/javascript">
  //getting all input text object
  var Nom=document.forms["myForm"]["Nom"];
  var Prenom=document.forms["myForm"]["Prenom"];
  var login=document.forms["myForm"]["login"];
  var profileSelectionne=document.forms["myForm"]["profileSelectionne"];
  var email=document.forms["myForm"]["email"];
  var mot_pass=document.forms["myForm"]["mot_pass"];
  var mot_pass_con=document.forms["myForm"]["mot_pass_con"];
  //getting all error display object
  var Nom_error=document.getElementById("Nom_error");
  var Prenom_error=document.getElementById("Prenom_error");
  var login_error=document.getElementById("login_error");
  var email_error=document.getElementById("email_error");
  var mot_pass_error=document.getElementById("mot_pass_error");
  var mot_pass_con_error=document.getElementById("mot_pass_con_error");
  //setting all event listeners
  Nom.addEventListener("blur", NomVerify, true);
  Prenom.addEventListener("blur", PrenomVerify, true);
  login.addEventListener("blur", loginVerify, true);
  email.addEventListener("blur", emailVerify, true);
  mot_pass.addEventListener("blur", mot_passVerify, true);
  //validate function
  function Validate(){
    //Nom validation
    if(Nom.value.length<2){
      Nom.style.border="1px solid red";
      Nom_error.textContent="Au moins 2 caractères";
      Nom.focus();
      return false;
    }
     //Prenom validation
    if(Prenom.value.length<2){
      Prenom.style.border="1px solid red";
      Prenom_error.textContent="Au moins 2 caractères";
      Prenom.focus();
      return false;
    }
    //login validation
    if(login.value.length<2){
      login.style.border="1px solid red";
      login_error.textContent="4 caractères au minimum";
      login.focus();
      return false;
    }
    //email validation
    if(email.value==""){
      email.style.border="1px solid red";
      email_error.textContent="Veuillez entrer un email valide";
      email.focus();
      return false;
    }
    //mot_pass validation
    if(mot_pass.value<6){
      mot_pass.style.border="1px solid red";
      mot_pass_error.textContent="6 caractères au minimum";
      mot_pass.focus();
      return false;
    }
  }
//check if two passwords match
       if(mot_pass.value!= mot_pass_con.value){
        mot_pass.style.border="1px solid red";
        mot_pass_con.style.border="1px solid red";
        mot_pass_error.innerHtml="les deux mdp doivent etre identique";
        return false;
       }
  //function NomVerify
    function NomVerify(){
      if(Nom.value.length>=2){
        Nom.style.border="1px solid #5E6E66";
        Nom_error.innerHtml="";
        return true;
      }
    }
    //function PrenomVerify
    function PrenomVerify(){
      if(Prenom.value.length>=2){
        Prenom.style.border="1px solid #5E6E66";
        Prenom_error.innerHtml="";
        return true;
      }
    }
    //function emailVerify
    function emailVerify(){
      if(email.value.length!=""){
        email.style.border="1px solid #5E6E66";
        email_error.innerHtml="";
        return true;
      }
    }
     //function emailVerify
    function loginVerify(){
      if(login.value.length>=6){
        login.style.border="1px solid #5E6E66";
        login_error.innerHtml="";
        return true;
      }
    }
     //function emailVerify
    function mot_passVerify(){
      if(mot_pass.value.length>=6){
        mot_pass.style.border="1px solid #5E6E66";
        mot_pass_error.innerHtml="";
        return true;
      }
    }
</script>-->