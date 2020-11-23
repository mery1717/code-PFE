<?php
session_start() ;
 // empecher le retour à la page précédente lors de la deconnexion
 if(!isset($_SESSION['Utilisateur'])){ ?>
  <SCRIPT LANGUAGE="JavaScript">
history.forward()
</SCRIPT>
<?php
 }
?>
<!doctype html>
<html>
  <head>
    <meta charset="utf-8" />
    <style type="text/css">
  .bonjour { margin-left: 0px;color:#20c1bd; font-size : 17px;border-color: blue; }
</style>
   <?php include '../codes_vues/header_vue.php' ?>

    <title>Magasins</title>
   <link href="../boot/css/bootstrap.css" rel="stylesheet"/>
    <link href="../boot/css/font-awesome.css" rel="stylesheet"/>
    
  </head>
  <?php
    include('connexionBD_model.php');
  ?>
  
 
 <body style="margin-top: 0px ;background-color: gray;background-repeat:no-repeat;background-size: cover;" onload="viewData()">
<?php include '../codes_vues/hea.php' ?>
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
                  <a><input type="button"  value ="Acceuil" class="btn btn-info" style="margin-left: 14%;margin-right: 2%;margin-top: 3%; border-color: red;width: 100px;" role="button" onclick="window.location.href='http://localhost/codePFE/controleurs/pageAcceuilAdmin_controleur'"></a>
                </li>
                  <li><a href="/codePFE/models/deconnexion_model.php" name="deconnexion" class="btn btn-outline-danger" style="color:black;margin-left: 75vw;border-color: red;" role="button">se deconnecter</a></li>
              </ul>

              </div>

      </div>
      </nav>

      <hr width="50%">
        <center><h3 style="font-weight: bold;color: black;font-size: 30px">Table des magasins</h3>
      <hr width="50%">            
        </center>
       <div class="container">
         <center>
        <form id="materiel-form" method="post" action="" role="form" style="background:rgba(255,255,255,0.38) ;color: black">
                  <div class="container" style="margin-top: 6px;padding-top: 6%;margin-right: 0px;">

<div class="example">
      <table id="editing-example" class="table table-striped" data-paging="true" data-filtering="true" data-sorting="true" style="width: 70%;">
        <thead>
        <tr>
          <th data-name="idMagasin" data-breakpoints="xs" data-type="number" scope="col">idMagasin</th>
          <th data-name="nomMagasin" scope="col">Magasin</th>
        </tr>

        </thead>
        <tbody>
          
        </tbody>
      </table>
      <div class="container" style="margin-top:35px">
        <button type="button" class="btn btn-default btn-sm" id="ajouterMagasin" style="background-color: green; color: white;">
          <span class="glyphicon glyphicon-paperclip" style=" color: white;"></span>&nbsp; Ajouter magasin
        </button>
      </div>

      <dialog id="zeroDialog" >
          <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ;?>" id="ajouter" >
           <label for="ajout">Veuillez saisir la nouvelle magasin:</label>
              <input type="text"  name = "magasin" required="true" />

            <menu>
                <button id="annule0" type="reset" name=annule0>annuler</button>
                 <button type="submit" name="ajouter" id="ajout" >Enregistrer</button>
                 <input type='submit'  name='valider' value='Enregistrer'  class='button' hidden="hidden" />

            </menu>
         </form>
      </dialog>

    </div>


        </form>
         </center>
     </div>
     

  </body>
</html>
<script src="../boot/js/jquery.min.js"></script>
    <script src="../boot/js/bootstrap.js"></script>
    <script src="../boot/js/jquery.tabledit.js"></script>
<script type="text/javascript">
function viewData(){
        $.ajax({
            url: 'magasin_data.php?p=view',
            method: 'GET'
        }).done(function(data){
            $('tbody').html(data)
            tableData()
        })
    }
    function tableData(){
        $('#editing-example').Tabledit({
            url: 'magasin_data.php',
            eventType: 'dblclick',
            editButton: true,
            deleteButton: true,
            hideIdentifier: false,
            buttons: {
                edit: {
                    class: 'btn btn-sm btn-warning',
                    html: '<span class="glyphicon glyphicon-pencil"></span> Edit',
                    action: 'edit'
                },
                delete: {
                    class: 'btn btn-sm btn-danger',
                    html: '<span class="glyphicon glyphicon-trash"></span> Trash',
                    action: 'delete'
                },
                save: {
                    class: 'btn btn-sm btn-success',
                    html: 'Save'
                },
                restore: {
                    class: 'btn btn-sm btn-warning',
                    html: 'Restore',
                    action: 'restore'
                },
                confirm: {
                    class: 'btn btn-sm btn-default',
                    html: 'Confirm'
                }
            },
            columns: {
                identifier: [0, 'idMagasin'],
                editable: [[1, 'nomMagasin']]
            },
            onSuccess: function(data, textStatus, jqXHR) {
                viewData()
            },
            onFail: function(jqXHR, textStatus, errorThrown) {
                console.log('onFail(jqXHR, textStatus, errorThrown)');
                console.log(jqXHR);
                console.log(textStatus);
                console.log(errorThrown);
            },
            onAjax: function(action, serialize) {
                console.log('onAjax(action, serialize)');
                console.log(action);
                console.log(serialize);
            }
        });
    }

//ajouter nouvelle famille
(function() {
    var updateButton = document.getElementById('ajouterMagasin');
    var cancelButton = document.getElementById('annule0');

    // Update button opens a modal dialog
    updateButton.addEventListener('click', function() {
      document.getElementById('zeroDialog').showModal();
    });

    // Bouton pour fermer la boîte de dialogue
    cancelButton.addEventListener('click', function() {
      document.getElementById('zeroDialog').close();
    });

  })();
  </script>
  <?php
if(isset($_POST['ajouter']))
{


 //   <?php
 // session_start() ;
  if(!empty($_POST['magasin']))
  { $idMagasin=$_POST['magasin']{0};
  
   include('C:\wamp64\www\codePFE\models\connexionBD_model.php'); 
   $sql2 ="SELECT * FROM magasins where nomMagasin='".$_POST['magasin']."'";
   
    $resultat2 =$bdd->query($sql2) ;
    if($datas=$resultat2->fetch()) { ?>
     <script>
        alert("Ce magasin existe déjà!");
      </script>    ';
    <?php }
    else{

  $p = $bdd->prepare('INSERT INTO `magasins` (`idMagasin`, `nomMagasin`) VALUES (?,?);');
     $p->execute([$idMagasin,$_POST['magasin']]);
    
     $repo=$bdd->query('SELECT * from magasins where nomMagasin="'.$_POST['magasin'].'"');
     while ($data=$repo->fetch()) {
     $idMagasin=$idMagasin.'_'.$data['conteur'];
}
     $stmt = $bdd->prepare('UPDATE `magasins` SET `idMagasin`="'.$idMagasin.'" where `nomMagasin`="'.$_POST['magasin'].'"');
        $stmt->execute();


     echo '
    <script>
        alert("la nouvelle magasin a bien été enregistré!");
      </script>    ';
    }}
    else echo '
    <script>
        alert("la nouvelle magasin n\'a pas bien été enregistré, Veuillez reéssayer plut tard!");
      </script>    ';
  }

?>