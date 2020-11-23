<?php

$mysqli = new mysqli('localhost', 'root', '', 'inventaire_materiels');

if (mysqli_connect_errno()) {
  echo json_encode(array('mysqli' => 'Failed to connect to MySQL: ' . mysqli_connect_error()));
  exit;
}

$page = isset($_GET['p'])? $_GET['p'] : '' ;
if($page=='view'){
    $result = $mysqli->query("SELECT * FROM users ");
    while($row = $result->fetch_assoc()){
        ?>
        <tr>
            <td><?php echo $row['PPR'] ?></td>
            <td><?php echo $row['nom'] ?></td>
            <td><?php echo $row['prenom'] ?></td>
            <td><?php echo $row['login'] ?></td>
            <td><?php echo $row['password'] ?></td>
            <td><?php echo $row['profile'] ?></td>
            <td><?php echo $row['adresseMail'] ?></td>
            
        </tr>
        <?php
    }
} else{

    // Basic example of PHP script to handle with jQuery-Tabledit plug-in.
    // Note that is just an example. Should take precautions such as filtering the input data.

    header('Content-Type: application/json');

    $input = filter_input_array(INPUT_POST);



    if ($input['action'] == 'edit') {
        $mysqli->query("UPDATE users SET nom='" . $input['nom'] . "', prenom='" . $input['prenom'] . "' ,login='". $input['login'] ."',password='". md5($input['password']) ."' ,profile='". $input['profile'] ."' ,adresseMail='". $input['email'] ."' WHERE PPR='" . $input['PPR'] . "'");
    } else if ($input['action'] == 'delete') {
        $mysqli->query("DELETE FROM users WHERE PPR='" . $input['PPR'] . "'");
    } else if ($input['action'] == 'restore') {
        $mysqli->query("UPDATE users SET nom='" . $input['nom'] . "', prenom='" . $input['prenom'] . "' ,login='". $input['login'] ."',password='". md5($input['password']) ."' ,profile='". $input['profile'] ."' ,adresseMail='". $input['email'] ."' WHERE PPR='" . $input['PPR'] . "'");
    }

    mysqli_close($mysqli);

    echo json_encode($input);
    
}
?>