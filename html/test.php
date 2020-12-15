<?php

// $timeTarget = 0.1; // 100 mseg 

// $cost = 5;
// do {
//     $cost++;
//     $t0 = microtime(true);
//     password_hash("test", PASSWORD_BCRYPT, ['cost' => $cost, 'salt' => 'ITSM-webAuth-task-laboratory3']);
//     $t1 = microtime(true);
// } while (($t1 - $t0) < $timeTarget);

// echo "Maximum cost: " . $cost . "\n";

$a1 = password_hash("test", PASSWORD_BCRYPT, ['cost' => '4', 'salt' => 'ITSM-webAuth-task-laboratory3']);

$a11 = substr($a1, 0, 7);
$a12 = substr($a1, 7, 22);
$a13 = substr($a1, 29);

echo "a1  = " . $a1  . "<br>";
echo "a11 = " . $a11 . "<br>";
echo "a12 = " . $a12 . "<br>";
echo "a13 = " . $a13 . "<br>";
echo "<br>";

/*
a1  = $2y$04$SVRTTS13ZWJBdXRoLXRhcuQpykqTowcGkA5iHEw51s7aZUp.2ymRq
a11 = $2y$04$
a12 =        SVRTTS13ZWJBdXRoLXRhcu
a13 =                              QpykqTowcGkA5iHEw51s7aZUp.2ymRq
*/


$a = password_hash($a13, PASSWORD_BCRYPT, ['cost' => '4', 'salt' => 'ITSM-webAuth-task-laboratory3']);


$b = password_hash("test", PASSWORD_BCRYPT, ['cost' => '8', 'salt' => 'ITSM-webAuth-task-laboratory3']);

echo "a = " . $a . "<br>";
echo "b = " . $b . "<br>";




// include 'db.php';
// $db = new db();
// $account = $db->query('SELECT * FROM USERS WHERE _name = ? ', 'admin')->fetchArray();
// print_r($account);
?>