<?php
if (!isset($_COOKIE["user"])) {
   header('Location: Login.php');
}else {

    $uname=$_COOKIE["user"];
    $utype=$_COOKIE["type"];

    if($utype!="st"){
         header('Location: Login.php');
        //ToDO implemnt this
    }
}
echo 'Hello '.($_COOKIE['user']!='' ? $_COOKIE['user'] : 'Guest');
?>

Welcome

<ul class="topnav" id="myTopnav">
    <li><a href="./BorrowedBooks.php">Show Borrowed Books</a></li>
    <li><a href="./Logout.php">Logout</a></li>
</ul>