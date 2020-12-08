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
    <section>
        <form>
            <h3>Log into your account:</h3> <br>
            
            <b>Username:</b> <br>
            <input type="text" name="name"> <br>
            
            <b>Password:</b> <br>
            <input type="password" name="password"> <br>
            
            <button type="submit" class="btn btn-outline-primary">Login</button>
            <br>
            <hr>
            <button class="btn btn-outline-primary">
                <a class="httpauth" id="private" href="login_digest.php">HTTP Digest login</a>
            </button>
        </form>
    </section>
    
    <br>
</html>