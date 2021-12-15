<?php session_start(); ?>
<?php
    $_SESSION['user_name'] = null;
    $_SESSION['firstname'] = null;
    $_SESSION['lastname'] = null;
    $_SESSION['position'] = null;
    $_SESSION['password'] = null;

    header("Location: index.php");

?>