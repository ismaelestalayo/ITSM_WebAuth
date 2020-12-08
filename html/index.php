<?php
    
    $host = "mysql-server";
    $user = "root";
    $pass = "secret";
    $db = "ITSM_L3";
    
    $conn = new mysqli($host, $user, $pass, $db);
    
    if ($conn->connect_error) {
        echo "Connection failed: " . $conn->connect_error;
    }
    
    include('header.php');
?>

<html>
    <head>
        <link rel="stylesheet" href="style.css">
    </head>
    
    <section>
        <form>
            <b>Log into your account:</b> <br>
            
            <p>Username:</p>
            <input type="text" name="name"> <br>
            
            <p>Password:</p>
            <input type="password" name="password"> <br>
            <button type="submit">Login</button>
        </form>
        <a class="httpauth" id="private" href="private.php">Log in</a>
    </section>
    
    <br>
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