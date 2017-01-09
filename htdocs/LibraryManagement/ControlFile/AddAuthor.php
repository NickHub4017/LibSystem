<?php
/**
 * Created by PhpStorm.
 * User: NRV
 * Date: 11/14/2016
 * Time: 3:13 AM
 *
 */
include '../Utils/Author.php';
include '../DbConnection/DBLink.php';
$error="";
if(!isset($_COOKIE["user"])) {
     header('Location: Login.php');
    //ToDo implemnt this
} else {

    $uname=$_COOKIE["user"];
    $utype=$_COOKIE["type"];

    if($utype!="li"){
         header('Location: Login.php');
        //ToDO implemnt this
    }
}


if(isset($_POST["hidededdata"])){

    if(!isset($_POST["authorname"])  ){
        $error="All * Filed must be filled";
    }else{
        $authorname=$_POST["authorname"];
       
        $author=new Author();
        $author->setAuthor($authorname);
        $db=new DBLink();
        echo $db->AuthorAddToDB($author);



    }
}

$db=new DBLink();
$auths=$db->getAllAuthors();

?>

    <div><?php echo $error ?></div>
    <form id='register' action='AddAuthor.php' method='post'
          accept-charset='UTF-8'>
        <fieldset >
            <legend>Add Book</legend>
            <input type='hidden' name='hidededdata' id='name' maxlength="50" value="subdata"/>


            <label for='authorname' >AuthorName*:</label>
            <input type='text' name='authorname' id='authorname' maxlength="50" />
            

          
            <input type='submit' name='Submit' value='Submit' />

        </fieldset>
    </form>

<?php

?>