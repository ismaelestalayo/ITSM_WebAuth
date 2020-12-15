<?php

session_start();
include_once('analyze_digest.php');
$domain = 'itsm_domain';

include_once("db.php");
$db = new db();
$users = $db->query('SELECT * FROM USERS')->fetchAll();
$names = array_column($users, "_name");
$digests = array_column($users, "_digest");
$user_creds = array_combine($names, $digests);


if (empty($_SERVER['PHP_AUTH_DIGEST'])) {
    header('HTTP/1.1 401 Unauthorized');
    header('WWW-Authenticate: Digest realm="'.$domain.
        '",qop="auth",nonce="'.uniqid().'",opaque="'.md5($domain).'"');
    unset($_SESSION["_name"]);
    $_SESSION['error'] = 'You cancelled the authentication.';
    return null;
}
// Analize PHP_AUTH_DIGEST variable
if (!($data = analyze_digest($_SERVER['PHP_AUTH_DIGEST'])) || !isset($user_creds[$data['username']])){
    header('HTTP/1.1 401 Unauthorized');
    unset($_SESSION["_name"]);
    $_SESSION['error'] = 'Bad credentials.';
    return null;
} else {
    $user = $data['username'];
    // Generate valid response
    // $A1 = md5($data['username'] . ':' . $domain . ':' . $users[$data['username']]);
    $A1 = $user_creds[$user];
    $A2 = md5($_SERVER['REQUEST_METHOD'].':'.$data['uri']);
    $valid_response = md5($A1.':'.$data['nonce'].':'.$data['nc'].':'.$data['cnonce'].':'.$data['qop'].':'.$A2);

    if ($data['response'] != $valid_response){
        header('HTTP/1.1 401 Unauthorized');
        unset($_SESSION["_name"]);
        $_SESSION['error'] = 'Bad credentials2.';
        return null;
    }
    
    // If everything is correct, redirect to /user
    $_SESSION["_name"] = $data['username'];
    // header('Location: /user.php ');
}


    
?>
