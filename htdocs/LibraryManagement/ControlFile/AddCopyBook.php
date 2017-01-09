<?php
/**
 * Created by PhpStorm.
 * User: NRV
 * Date: 11/14/2016
 * Time: 3:13 AM
 *
 */
include '../Utils/CopyBook.php';
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

    if(!isset($_POST["Book"]) or !isset($_POST["typebook"]) ){
        $error="All * Filed must be filled";
    }else{
        $bookid=$_POST["Book"];
        $TypeBook=$_POST["typebook"];

        $book=new CopyBook();
        $book->setBookdata($bookid);
        $book->setTypeBook($TypeBook);


        $db=new DBLink();
        echo $db->copyBookAddToDB($book);



    }
}

$db=new DBLink();
$books=$db->getAllBooks();

?>

    <div><?php echo $error ?></div>
    <form id='register' action='AddCopyBook.php' method='post'
          accept-charset='UTF-8'>
        <fieldset >
            <legend>Add Book</legend>
            <input type='hidden' name='hidededdata' id='name' maxlength="50" value="subdata"/>

             <label for='Book' >Book*:</label>
            <select name="Book">
                <?php
                foreach($books as $book){

                    echo "<option value=".$book[1].">".$book[0].' - '.$book[7]."</option>";
                }
                ?>


            </select>
             
            <br>
            <label for='typebook' >Book Type*:</label>
                <select name="typebook">
                   <option value="ref">Reference</option>
                   <option value="len">Lending</option>
                   <option value="dam">Damaged</option>
                </select>
            <br>
            <input type='submit' name='Submit' value='Submit' />

        </fieldset>
    </form>

<?php

?>