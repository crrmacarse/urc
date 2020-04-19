<?php

include('../db/connection.php');
$db = new db();

// form variables
$form_USERNAME = $_POST['USERNAME'];
$form_PASSWORD = $_POST['PASSWORD'];

try {
    $sql = ("SELECT * FROM users WHERE username = :username");
    $stmt = $db->connection->prepare($sql);
    $stmt->execute(array(
        ':username' => $form_USERNAME
    ));
    $row=$stmt->fetch(PDO::FETCH_ASSOC);

    // Check if username is existing in database
    if ($form_USERNAME == $row['username']) {
        if (password_verify($form_PASSWORD, $row['password'])) {
            session_start();

            $_SESSION['loggedin'] = true;
            $_SESSION['userid'] = $row['user_id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['usertype'] = $row['user_type'];
            
            die(json_encode(array('result' => 'Succesfully logged in')));
        } else {
            die(json_encode(array(
                'error' => array(
                    'msg' => 'Invalid Username or password'
                ),
            )));
        }
    } else {
        die(json_encode(array(
            'error' => array(
                'msg' => 'User not found'
            ),
        )));
    }
} catch (Exception $e) {
    die(json_encode(array(
        'error' => array(
            'msg' => $e->getMessage(),
            'code' => $e->getCode(),
        ),
    )));
}
 ?> 