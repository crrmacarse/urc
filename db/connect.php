<?php

require_once('config.php');

$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

if ($conn == false) {
    die("ERROR: could not connect" . mysqli_connect_error());
}
