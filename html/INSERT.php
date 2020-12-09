<?php
$host = "mysql-server";
$user = "root";
$pass = "secret";
$db = "ITSM_L3";

$conn = new mysqli($host, $user, $pass, $db);
$conn->set_charset('utf8mb4');

if ($conn->connect_error) {
    echo "Connection failed: " . $conn->connect_error;
}

if(!empty($_POST['_name']) && !empty($_POST['_mail']) && !empty($_POST['_pass']) ) {
    $_name = $_POST['_name'];
    $_mail = $_POST['_mail'];
    $_pass = $_POST['_pass'];
    $_pass = password_hash($_pass, PASSWORD_BCRYPT, ['cost' => 11]);
    
    $sql = "INSERT INTO USERS (_name, _mail, _pass) VALUES ('$_name', '$_mail', '$_pass');";
    $result = $conn->query($sql, 1);
    print( $sql);
    if ($result) {
        echo "200 okay";
    } else {
        echo "400 error";
    }
} else {
    echo "need all fields!";
}


?>