<?php

    // form variables
    $form_USERNAME = $_POST['USERNAME'];
    $form_PASSWORD = $_POST['PASSWORD'];

    try {
        // sql here

        echo json_encode(array(
            'result' => $form_PASSWORD,
        ));
    } catch (Exception $e) {
        echo json_encode(array(
            'error' => array(
                'msg' => $e->getMessage(),
                'code' => $e->getCode(),
            ),
        ));
    }
