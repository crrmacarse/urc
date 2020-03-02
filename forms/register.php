<?php

include('../db/connection.php');
$db = new db();

// form variables
$FORM_USERNAME = $_POST['USERNAME'];
$FORM_PASSWORD = password_hash(trim($_POST['PASSWORD']), PASSWORD_DEFAULT);
$FORM_EMAIL = $_POST['EMAIL'];
$FORM_FIRSTNAME = $_POST['FIRST_NAME'];
$FORM_LASTNAME = $_POST['LAST_NAME'];
$FORM_USERTYPE = $_POST['USER_TYPE'];

 try {
    // sql here
    $sql = "INSERT INTO users (username, fName, lName, email, user_type, password) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $db->connection->prepare($sql);
    $stmt->bindParam(1, $FORM_USERNAME);
    $stmt->bindParam(2, $FORM_FIRSTNAME);
    $stmt->bindParam(3, $FORM_LASTNAME);
    $stmt->bindParam(4, $FORM_EMAIL);
    $stmt->bindParam(5, $FORM_USERTYPE);
    $stmt->bindParam(6, $FORM_PASSWORD); 
    $stmt->execute();

    echo json_encode(array(
        'result' => 'Succesfully registered a user',
    ));
} catch (PDOException $e) {
     echo json_encode(array(
         'error' => array(
             'msg' => $e->getMessage(),
             'code' => $e->getCode(),
         ),
     ));
 }

?> 