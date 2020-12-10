<?php

session_start();

include('header.php');
include('db.php');

$name = $_SESSION['_name'];
$sql = "SELECT * FROM USERS WHERE _name= '$name'";
$db = new db();
$user = $db->query($sql)->fetchArray();

?>


<html>
    <section>
    <form>
        <h3>Your account details:</h3>
        <br>
        
        <div class="form-group">
            <label for="formGroupExampleInput">Username</label>
            <input type="text" class="form-control" id="formGroupExampleInput" disabled placeholder="<?php echo $user["_name"];?>">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Email</label>
            <input type="text" class="form-control" id="formGroupExampleInput2" disabled placeholder="<?php echo $user["_mail"];?>">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Password</label>
            <input type="password" class="form-control" id="formGroupExampleInput2" disabled placeholder="<?php echo $user["_pass"];?>">
        </div>
    </form>
    </section>

</html>