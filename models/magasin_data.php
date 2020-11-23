<?php

$mysqli = new mysqli('localhost', 'root', '', 'inventaire_materiels');

if (mysqli_connect_errno()) {
  echo json_encode(array('mysqli' => 'Failed to connect to MySQL: ' . mysqli_connect_error()));
  exit;
}

$page = isset($_GET['p'])? $_GET['p'] : '' ;
if($page=='view'){
    $result = $mysqli->query("SELECT * FROM magasins ");
    while($row = $result->fetch_assoc()){
        ?>
        <tr>
            <td><?php echo $row['idMagasin'] ?></td>
            <td><?php echo $row['nomMagasin'] ?></td>
            
        </tr>
        <?php
    }
} else{

    // Basic example of PHP script to handle with jQuery-Tabledit plug-in.
    // Note that is just an example. Should take precautions such as filtering the input data.

    header('Content-Type: application/json');

    $input = filter_input_array(INPUT_POST);



    if ($input['action'] == 'edit') {
        $mysqli->query("UPDATE magasins SET nomMagasin='" . $input['nomMagasin'] . "' WHERE idMagasin='" . $input['idMagasin'] . "'");
    } else if ($input['action'] == 'delete') {
        $mysqli->query("DELETE FROM magasins WHERE idMagasin='" . $input['idMagasin'] . "'");
    } else if ($input['action'] == 'restore') {
        $mysqli->query("UPDATE magasins SET nomMagasin='" . $input['nomMagasin'] . "' WHERE idMagasin='" . $input['idMagasin'] . "'");
    }

    mysqli_close($mysqli);

    echo json_encode($input);
    
}
?>