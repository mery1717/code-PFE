<?php

$mysqli = new mysqli('localhost', 'root', '', 'inventaire_materiels');

if (mysqli_connect_errno()) {
  echo json_encode(array('mysqli' => 'Failed to connect to MySQL: ' . mysqli_connect_error()));
  exit;
}

$page = isset($_GET['p'])? $_GET['p'] : '' ;
if($page=='view'){
    $result = $mysqli->query("select * from familles, sousfamilles, familles_sousfamilles WHERE familles.idFamille=familles_sousfamilles.idFamille and sousfamilles.idSousFamille=familles_sousfamilles.idSousFamille order by famille");
    while($row = $result->fetch_assoc()){
        ?>
        <tr>
            <td><?php echo $row['idSousFamille'] ?></td>
            <td><?php echo $row['famille'] ?></td>
            <td><?php echo $row['sousFamille'] ?></td>
            
        </tr>
        <?php
    }
} else{

    // Basic example of PHP script to handle with jQuery-Tabledit plug-in.
    // Note that is just an example. Should take precautions such as filtering the input data.

    header('Content-Type: application/json');

    $input = filter_input_array(INPUT_POST);



    if ($input['action'] == 'edit') {
        $mysqli->query("UPDATE sousfamilles SET  sousFamille='" . $input['sousFamille'] . "' WHERE idSousFamille='" . $input['idSousFamille'] . "'");
        $mysqli1->query("UPDATE familles_sousfamilles SET  idFamille=(select idFamille from familles where famille='" . $input['famille'] . "') WHERE idSousFamille='" . $input['idSousFamille'] . "'");
    } else if ($input['action'] == 'delete') {
        $mysqli->query("DELETE FROM sousfamilles WHERE idSousFamille='" . $input['idSousFamille'] . "'");
    } else if ($input['action'] == 'restore') {
        $mysqli->query("UPDATE sousfamilles SET  sousFamille='" . $input['sousFamille'] . "' WHERE idSousFamille='" . $input['idSousFamille'] . "'");
    }

    mysqli_close($mysqli);

    echo json_encode($input);
    
}
?>