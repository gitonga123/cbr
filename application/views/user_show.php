<?php
defined('BASEPATH') or exit('No direct script access is allowed');
require_once 'header.php';
?>
<body>
    <?php
        if($_SESSION['is_logged_in'] == TRUE){
            echo 'User Logged in';
            echo $_SESSION['user_name']. "<br />";
            echo $_SESSION['user_id']. "<br />";
            echo $_SESSION['first_name']. "<br />";
            echo $_SESSION['surname']. "<br />";
            echo $_SESSION['email']. "<br />";
        }
    ?>
    <a href="logout" ><button class="btn btn-disabled">Logout</button></a>
</body>
</html>
