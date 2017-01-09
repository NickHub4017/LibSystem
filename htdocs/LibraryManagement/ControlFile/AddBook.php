<?php
/**
 * Created by PhpStorm.
 * User: NRV
 * Date: 11/14/2016
 * Time: 3:13 AM
 *
 */
include '../Utils/Book.php';
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

    if(!isset($_POST["bookname"]) or !isset($_POST["ISBN"]) or !isset($_POST["Author"]) or !isset($_POST["Edition"])   ){
        $error="All * Filed must be filled";
    }else{
        $bookname=$_POST["bookname"];
        $ISBN=$_POST["ISBN"];
        $Author=$_POST["Author"];
        $Edition=$_POST["Edition"];

        $book=new Book();
        $book->setName($bookname);
        $book->setAuthor($Author);
        $book->setEdition($Edition);
        $book->setISBN($ISBN);


        $db=new DBLink();
        echo $db->bookAddToDB($book);



    }
}

$db=new DBLink();
$auths=$db->getAllAuthors();

?>

    <div><?php echo $error ?></div>
    <form id='register' action='AddBook.php' method='post'
          accept-charset='UTF-8'>
        <fieldset >
            <legend>Add Book</legend>
            <input type='hidden' name='hidededdata' id='name' maxlength="50" value="subdata"/>


            <label for='bookname' >BookName*:</label>
            <input type='text' name='bookname' id='bookname' maxlength="50" />
            <br>
            <label for='ISBN' >ISBN*:</label>
            <input type='text' name='ISBN' id='ISBN' maxlength="11" />
            <br>


            <label for='Author' >Author*:</label>
            <select name="Author">
                <?php
                foreach($auths as $anauths){

                    echo "<option value=".$anauths[0].">".$anauths[1]."</option>";
                }
                ?>


            </select>

            <br>
            <label for='Edition' >Edition*:</label>
            <input type='text' name='Edition' id='Edition' maxlength="11" />
            <br>

            <input type='submit' name='Submit' value='Submit' />

        </fieldset>
    </form>

<?php

?>