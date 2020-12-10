<?php

session_start();
include_once('analyze_digest.php');
$domain = 'PrivateDomain';    

include_once("db.php");
$db = new db();
$users = $db->query('SELECT _name, _pass FROM USERS')->fetchAll();
$names = array_column($users, "_name");
$passes = array_column($users, "_pass");
$users = array_combine($names, $passes);
// Format: array('user1' => 'pass1', 'user2' => 'pass2');

if (empty($_SERVER['PHP_AUTH_DIGEST'])) {
    header('HTTP/1.1 401 Unauthorized');
    header('WWW-Authenticate: Digest realm="'.$domain.
        '",qop="auth",nonce="'.uniqid().'",opaque="'.md5($domain).'"');
    $_SESSION['error'] = 'You cancelled the authentication.';
    return null;
}


// Analize PHP_AUTH_DIGEST variable
if (!($data = analyze_digest($_SERVER['PHP_AUTH_DIGEST'])) || !isset($users[$data['username']])){
    header('HTTP/1.1 401 Unauthorized');
    unset($_SESSION["_name"]);
    $_SESSION['error'] = 'Bad credentials.';
    return null;
} else {
    // Generate valid response
    $A1 = md5($data['username'] . ':' . $domain . ':' . $users[$data['username']]);
    $A2 = md5($_SERVER['REQUEST_METHOD'].':'.$data['uri']);
    $valid_response = md5($A1.':'.$data['nonce'].':'.$data['nc'].':'.$data['cnonce'].':'.$data['qop'].':'.$A2);

    if ($data['response'] != $valid_response){
        unset($_SESSION["_name"]);
        $_SESSION['error'] = 'Bad credentials.';
        return null;
    }
    
    // If everything is correct, redirect to /user
    $_SESSION["_name"] = $data['username'];
    header('Location: /user.php ');
}


    
?>
