<?php
    $host = "mysql-server";
    $user = "root";
    $pass = "secret";
    $db = "ITSM_L3";
    
    $conn = new mysqli($host, $user, $pass, $db);
    
    if ($conn->connect_error) {
        echo "Connection failed: " . $conn->connect_error;
    }
?>

<html>
    <h1>ITSM L3</h1>

</html>

<?php
try{
    $sql = "SELECT _id, _name, _pass FROM USERS WHERE _name='admin'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        echo "Yieee";
        while($row = $result->fetch_assoc()) {
            echo "id: " . $row["_id"]. " - Name: " . $row["_name"]. " " . $row["_pass"]. "<br>";
        }
      } else {
        echo "0 results";
      }
} catch(PDOException $e) {
    echo "oooopsies: " . $e->getMessage();
}

$conn->close();
?>