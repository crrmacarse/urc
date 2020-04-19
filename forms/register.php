<?php

include('../db/connection.php');
$db = new db();


// form variables
$FORM_USERNAME = $_POST['USERNAME'];
$FORM_PASSWORD = password_hash(trim($_POST['PASSWORD']), PASSWORD_DEFAULT);
$FORM_EMAIL = $_POST['EMAIL'];
$FORM_FIRSTNAME = $_POST['FIRST_NAME'];
$FORM_LASTNAME = $_POST['LAST_NAME'];
$FORM_USERTYPE = 'user';





 try {
    // sql here
    $sql=("SELECT username, user_mail  FROM users WHERE username = :username  or user_mail = :email ");
    $stmt = $db->connection->prepare($sql);
        $stmt->execute(array(':username'=>$FORM_USERNAME, ':email'=>$FORM_EMAIL ));
        $row=$stmt->fetch(PDO::FETCH_ASSOC);
        
        //Check if username is existing in database
        if($row['username']==$FORM_USERNAME){
            echo json_encode(array(
                'error' => array(
                    'msg' => 'Username already exist',
                    'code' => 401,
                ),
            ));
        }//check if email is existing in database
        elseif($row['user_mail']==$FORM_EMAIL){ 
            echo json_encode(array(
                'error' => array(
                   'msg'  => 'Email already exist'
                ),
            ));
        }
        else
        { //if user or email is not existing in database run this code
            $sql = "INSERT INTO users (username, fName, lName, user_mail, user_type, user_pass) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $db->connection->prepare($sql);
            $stmt->bindParam(1, $FORM_USERNAME);
            $stmt->bindParam(2, $FORM_FIRSTNAME);
            $stmt->bindParam(3, $FORM_LASTNAME);
            $stmt->bindParam(4, $FORM_EMAIL);
            $stmt->bindParam(5, $FORM_USERTYPE);
            $stmt->bindParam(6, $FORM_PASSWORD); 
            $stmt->execute();
    
         echo json_encode(array('result' => 'User registered successfully' ));
        }
    }


 catch (PDOException $e) {
     echo json_encode(array(
         'error' => array(
             'msg' => $e->getMessage(),
             'code' => $e->getCode(),
         ),
     ));
 }


?> 