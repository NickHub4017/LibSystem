<?php
 setcookie('user', $_COOKIE['user'], 1, "/"); 
 setcookie('type', $_COOKIE['type'], 1, "/");
 header('Location: Login.php');
?>
