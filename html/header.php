<html>
<head>
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
            <li>
                <a href="/user">User</a>
            </li>
            <li>
                <a href="#">Logout</a>
            </li>
        </ul>
    </nav>
</body>

</html>

<?php
    include 'digest.php';
    echo "TESTT: ";
    echo analyze_digest($_SERVER['PHP_AUTH_DIGEST'])['username'];
?>