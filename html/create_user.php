<?php  
include('header.php');
?>


<html>
    <section>
    <form action="INSERT.php" method="post">
        <h3>Create a user account:</h3>
        <br>
        
        <div class="form-group">
            <label for="formGroupExampleInput">Username</label>
            <input type="text" class="form-control" name="_name" required>
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Email</label>
            <input type="email" class="form-control" name="_mail" required>
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Password</label>
            <input type="password" class="form-control" name="_pass" required>
        </div>
        
        <br>
        <button type="submit" class="btn btn-outline-primary">Create account</button>
    </form>
    </section>

</html>