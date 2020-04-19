<?php
session_start();
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
    if($_SESSION['usertype'] == 'user'){
        header("location: ../user-home.php");
    }
    elseif($_SESSION['usertype'] == 'admin'){
        header("location: ../admin-home.php");
        
        exit();
    }
    
    
}
include('../db/connection.php');

$db = new db();

    // form variables
    $form_USERNAME = $_POST['USERNAME'];
    $form_PASSWORD = $_POST['PASSWORD'];

    try {
        // sql here
        $sql = ("SELECT * FROM users WHERE username = :username");
        $stmt = $db->connection->prepare($sql);
        $stmt->execute(array(
            ':username' => $form_USERNAME
        ));
        $row=$stmt->fetch(PDO::FETCH_ASSOC);

        //check if username is existing in database
        if($form_USERNAME == $row['username']){
            if(password_verify($form_PASSWORD, $row['user_pass'])){
                session_start();

                $_SESSION['loggedin'] = true;
                $_SESSION['userid'] = $row['user_id'];
                $_SESSION['username'] = $row['username'];
                $_SESSION['usertype'] = $row['user_type'];
                
                echo json_encode(array('result' => 'ok'));
            }
            else{
                echo json_encode(array(
                    'error' => array(
                        'msg' => 'Invalid Username or password'
                    ),
                ));
            }

        }
        else{
            echo json_encode(array(
                'error' => array(
                    'msg' => 'User not found'
                ),
            ));
        }

    } catch (Exception $e) {
        echo json_encode(array(
            'error' => array(
                'msg' => $e->getMessage(),
                'code' => $e->getCode(),
            ),
        ));
    }
 ?> 