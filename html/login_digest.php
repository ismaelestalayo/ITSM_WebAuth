<?php
    include('analyze_digest.php');
    $domain = 'Area restringida';    
    
    // user => password
    $users = array('admin' => 'admin', 'guest' => 'guest');


    if (empty($_SERVER['PHP_AUTH_DIGEST'])) {
        header('HTTP/1.1 401 Unauthorized');
        header('WWW-Authenticate: Digest realm="'.$domain.
            '",qop="auth",nonce="'.uniqid().'",opaque="'.md5($domain).'"');

        die('You cancelled the authentication.');
    }


    // Analize PHP_AUTH_DIGEST variable
    if (!($data = analyze_digest($_SERVER['PHP_AUTH_DIGEST'])) ||
        !isset($users[$data['username']]))
        die('Bad credentials');


    // Generar una respuesta válida
    $A1 = md5($data['username'] . ':' . $domain . ':' . $users[$data['username']]);
    $A2 = md5($_SERVER['REQUEST_METHOD'].':'.$data['uri']);
    $valid_response = md5($A1.':'.$data['nonce'].':'.$data['nc'].':'.$data['cnonce'].':'.$data['qop'].':'.$A2);

    if ($data['response'] != $valid_response)
        die('Bad credentials');
    
    // If everything is correct, redirect to /user
    header('Location: /user.php ');
?>
