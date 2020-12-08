<?php
    include 'digest.php';
    $domain = 'Area restringida';

    // usuario => contraseña
    $users = array('admin' => 'admin', 'guest' => 'guest');


    if (empty($_SERVER['PHP_AUTH_DIGEST'])) {
        header('HTTP/1.1 401 Unauthorized');
        header('WWW-Authenticate: Digest realm="'.$domain.
            '",qop="auth",nonce="'.uniqid().'",opaque="'.md5($domain).'"');

        die('Texto a enviar si el usuario pulsa el botón Cancelar');
    }


    // Analizar la variable PHP_AUTH_DIGEST
    if (!($data = analyze_digest($_SERVER['PHP_AUTH_DIGEST'])) ||
        !isset($users[$data['username']]))
        die('Credenciales incorrectas');


    // Generar una respuesta válida
    $A1 = md5($data['username'] . ':' . $domain . ':' . $users[$data['username']]);
    $A2 = md5($_SERVER['REQUEST_METHOD'].':'.$data['uri']);
    $respuesta_válida = md5($A1.':'.$data['nonce'].':'.$data['nc'].':'.$data['cnonce'].':'.$data['qop'].':'.$A2);

    if ($data['response'] != $respuesta_válida)
        die('Credenciales incorrectas');

    // Todo bien, usuario y contraseña válidos
    echo 'Se ha identificado como: ' . $data['username'];




    echo "<a href='logout.php'>Logout</a>";
?>





<html>
    <h2>YO</h2>
    <form method="post"> 
        <input type="submit" name="button1" class="button" value="Logout" /> 
    </form> 

</html>
