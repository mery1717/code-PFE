
<?php
include('connect.php');
echo "string";
    if(isset($_GET["idMarque"])){ 
      echo '<script>
       alert("if is working");
      </script>';
  $idMarque=$donnees['idMarque'];

  $pdo = new PDO('mysql:host=localhost;dbname=inventaire_materiels;charset=utf8','root','');
  $delete = "DELETE FROM marques WHERE idMarque = '$idMarque'";

  $stmt = $pdo->prepare($delete);
  $result = $stmt->execute();
  echo json_encode($result);
  if(!$result) {
      echo json_encode(sqlsrv_errors());
  }
}
else{
  echo '<script>
        alert("if is not working");
      </script>';
}
?>
<!--<?php
  /* include('connect.php');
  if (isset($_POST['delpost'])) {
    $id=$_POST['id'];
    mysqli_query($conn,"delete from fournisseurs where idFournisseur='$id'") or die(mysqli_error())
  }
?>-->*/