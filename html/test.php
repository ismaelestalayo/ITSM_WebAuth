<?php

$timeTarget = 0.1; // 100 mseg 

$cost = 5;
do {
    $cost++;
    $t0 = microtime(true);
    password_hash("test", PASSWORD_BCRYPT, ['cost' => $cost, 'salt' => 'ITSM-webAuth-task-laboratory3']);
    $t1 = microtime(true);
} while (($t1 - $t0) < $timeTarget);

echo "Maximum cost: " . $cost . "\n";

// include 'db.php';
// $db = new db();
// $account = $db->query('SELECT * FROM USERS WHERE _name = ? ', 'admin')->fetchArray();
// print_r($account);
?>