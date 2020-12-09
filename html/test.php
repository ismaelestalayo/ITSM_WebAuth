<?php

// $timeTarget = 0.1; // 50 milisegundos 

// $coste = 8;
// do {
//     $coste++;
//     $inicio = microtime(true);
//     password_hash("test", PASSWORD_BCRYPT, ["cost" => $coste]);
//     $fin = microtime(true);
// } while (($fin - $inicio) < $timeTarget);

// echo "Coste apropiado encontrado: " . $coste . "\n";

include 'db.php';
$db = new db();
$account = $db->query('SELECT * FROM USERS WHERE _name = ? ', 'admin')->fetchArray();
print_r($account);
?>