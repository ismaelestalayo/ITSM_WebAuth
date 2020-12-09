<?php

header('HTTP/1.1 401 Unauthorized');
session_start();
unset($_SESSION["_name"]);
include('header.php');

?>

<html>
    <section>
    <form>
        <h3>Logout succesfully.</h3>
    </form>
    </section>

</html>