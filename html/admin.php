<?php

session_start();
$user = $_SESSION["_name"];

if ($user != "admin")
    header("Location: /");

include('header.php');
include('db.php');

$name = $_SESSION['_name'];
$sql = "SELECT * FROM USERS";
$db = new db();
$users = $db->query($sql)->fetchAll();



echo "<section><form style='width: max-content'>";
echo "<table border='1' class='table table-bordered'>";
echo "<thead class='thead-dark'><tr>";
echo "<th>Id</th>";
echo "<th>Name</th>";
echo "<th>Domain</th>";
echo "<th>Mail</th>";
echo "<th>Pass</th>";
echo "</tr></thead>";

foreach ($users as &$user) {
    echo "<tr>";
    echo "<td>".$user["_id"]."</td>";
    echo "<td>".$user["_name"]."</td>";
    echo "<td>".$user["_domain"]."</td>";
    echo "<td>".$user["_mail"]."</td>";
    echo "<td>".$user["_pass"]."</td>";
}

echo "</tr>";
echo "</form></section>";

?>


