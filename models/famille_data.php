<?php

$mysqli = new mysqli('localhost', 'root', '', 'inventaire_materiels');

if (mysqli_connect_errno()) {
  echo json_encode(array('mysqli' => 'Failed to connect to MySQL: ' . mysqli_connect_error()));
  exit;
}

$page = isset($_GET['p'])? $_GET['p'] : '' ;
if($page=='view'){
    $result = $mysqli->query("SELECT * FROM familles ");
    while($row = $result->fetch_assoc()){
        ?>
        <tr>
            <td><?php echo $row['idFamille'] ?></td>
            <td><?php echo $row['famille'] ?></td>
            
        </tr>
        <?php
    }
} else{

    // Basic example of PHP script to handle with jQuery-Tabledit plug-in.
    // Note that is just an example. Should take precautions such as filtering the input data.

    header('Content-Type: application/json');

    $input = filter_input_array(INPUT_POST);



    if ($input['action'] == 'edit') {
        $mysqli->query("UPDATE familles SET famille='" . $input['famille'] . "' WHERE idFamille='" . $input['idFamille'] . "'");
    } else if ($input['action'] == 'delete') {
        $mysqli->query("DELETE FROM familles WHERE idFamille='" . $input['idFamille'] . "'");
    } else if ($input['action'] == 'restore') {
        $mysqli->query("UPDATE familles SET famille='" . $input['famille'] . "' WHERE idFamille='" . $input['idFamille'] . "'");
    }

    mysqli_close($mysqli);

    echo json_encode($input);
    
}
?>