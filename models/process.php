<?php

$mysqli = new mysqli('localhost', 'root', '', 'inventaire_materiels');

if (mysqli_connect_errno()) {
  echo json_encode(array('mysqli' => 'Failed to connect to MySQL: ' . mysqli_connect_error()));
  exit;
}

$page = isset($_GET['p'])? $_GET['p'] : '' ;
if($page=='view'){
    $result = $mysqli->query("SELECT * FROM marques ");
    while($row = $result->fetch_assoc()){
        ?>
        <tr>
            <td><?php echo $row['idMarque'] ?></td>
            <td><?php echo $row['Marque'] ?></td>
            
        </tr>
        <?php
    }
} else{

    // Basic example of PHP script to handle with jQuery-Tabledit plug-in.
    // Note that is just an example. Should take precautions such as filtering the input data.

    header('Content-Type: application/json');

    $input = filter_input_array(INPUT_POST);



    if ($input['action'] == 'edit') {
        $mysqli->query("UPDATE marques SET Marque='" . $input['Marque'] . "' WHERE idMarque='" . $input['idMarque'] . "'");
    } else if ($input['action'] == 'delete') {
        $mysqli->query("DELETE FROM marques WHERE idMarque='" . $input['idMarque'] . "'");
    } else if ($input['action'] == 'restore') {
        $mysqli->query("UPDATE marques SET Marque='" . $input['Marque'] . "' WHERE idMarque='" . $input['idMarque'] . "'");
    }

    mysqli_close($mysqli);

    echo json_encode($input);
    
}
?>