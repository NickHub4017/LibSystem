<?php
if (!isset($_COOKIE["user"])) {
   header('Location: Login.php');
}else {

    $uname=$_COOKIE["user"];
    $utype=$_COOKIE["type"];

    if($utype!="li"){
         header('Location: Login.php');
        //ToDO implemnt this
    }
}
echo 'Hello '.($_COOKIE['user']!='' ? $_COOKIE['user'] : 'Guest');
?>


<ul class="topnav" id="myTopnav">
    <li><a href="./AddBook.php">Add Book</a></li>
    <li><a href="./Register.php">Register User</a></li>
    <li><a href="./AddCopyBook.php">Add Copy Book</a></li>
    <li><a href="./AddAuthor.php">Add Author</a></li>
    <li><a href="./LendingBook.php">Lend Book</a></li>
    <li><a href="./ReturnBook.php">Return Book</a></li>
    <li><a href="./EditBook.php">Edit Book</a></li>
     <li><a href="./Logout.php">Logout</a></li>

</ul>
      