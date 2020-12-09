<?php
    include 'analyze_digest.php';
    $user =  analyze_digest($_SERVER['PHP_AUTH_DIGEST'])['username'];
    $visib = ( is_null($user) ? "hidden" : "visible");
?>

<html>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav>
        <div style="display: inline-flex; place-items: center;">
            <a class="logo-text" href="/">
                <h1>ITSM_L3</h1>
            </a>
        </div>

        <ul>
            <li style="visibility: <?php echo $visib ?>">
                <a href="/user.php"><?php echo $user;?></a>
            </li>
            <li style="visibility: <?php echo $visib ?>">
                <a href="/logout.php" class="btn btn-danger">Logout</a>
            </li>
        </ul>
    </nav>
</body>

</html>

