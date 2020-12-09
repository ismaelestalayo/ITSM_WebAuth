<?php
session_start();
$host = "mysql-server";
$user = "root";
$pass = "secret";
$db = "ITSM_L3";

$conn = new mysqli($host, $user, $pass, $db);
$conn->set_charset('utf8mb4');

if ($conn->connect_error) {
    echo "Connection failed: " . $conn->connect_error;
}
else{
    include('header.php');
    
    $sql = "SELECT _id, _name, _mail, _pass FROM USERS WHERE _name='admin'";
    $result = $conn->query($sql, 1);
    if ($result) {
        $row = $result->fetch_assoc();
    } else {
        echo "0 results";
        $row["_name"] = "error";
        $row["_pass"] = "error";
    }
}

?>


<html>
    <section>
    <form>
        <h3>Your account details:</h3>
        <br>
        
        <div class="form-group">
            <label for="formGroupExampleInput">Username</label>
            <input type="text" class="form-control" id="formGroupExampleInput" disabled placeholder="<?php echo $row["_pass"];?>">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Email</label>
            <input type="text" class="form-control" id="formGroupExampleInput2" disabled placeholder="<?php echo $row["_mail"];?>">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Password</label>
            <input type="password" class="form-control" id="formGroupExampleInput2" disabled placeholder="<?php echo $row["_pass"];?>">
        </div>
    </form>
    </section>

</html>