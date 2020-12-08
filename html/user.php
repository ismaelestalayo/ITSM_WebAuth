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

<?php
    $user =  analyze_digest($_SERVER['PHP_AUTH_DIGEST'])['username'];
    $visib = ( is_null($user) ? "hidden" : "visible");
?>

<html>
    <section>
    <form>
        <h3>Your account details:</h3>
        
        <b>Username:</b>
        <p> <?php echo $user;?> </p>
        
        <b>Password:</b> <br>
        <p></p>
        
        <button type="submit" class="btn btn-outline-primary">Login</button>
        <br>
    </form>
    </section>

</html>