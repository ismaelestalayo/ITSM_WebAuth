<?php

session_start();
$display="none";

// Just test the DB connectivity
include 'db.php';
$db = new db();

if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['someAction'])){
    if (include("login_digest.php"))
        echo "YIEEEEEEE";
    else
        $display = "block";
}

include('header.php');
?>

<html>    
    <section>
        <form method="post">
            <h3>Log into your account:</h3>
            <br>
            
            <div class="alert alert-danger" role="alert" style="display: <?= $display ?>">
                <?= $_SESSION["error"]; ?>
            </div>
            
            <div class="form-group">
                <label for="formGroupExampleInput">Username</label>
                <input type="text" class="form-control" id="formGroupExampleInput">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Password</label>
                <input type="password" class="form-control" id="formGroupExampleInput2">
            </div>

            <button type="submit" class="btn btn-outline-primary">Login</button>
            <a class="btn btn-outline-secondary" href="create_user.php">Create user</a>
            
            <hr>
            
            <input class="httpauth btn btn-outline-primary" type="submit" name="someAction" value="HTTP Digest login" />
        </form>
    </section>
    
    <br>
</html>