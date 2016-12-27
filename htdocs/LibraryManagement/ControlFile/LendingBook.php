<?php
/**
 * Created by PhpStorm.
 * User: NRV
 * Date: 11/14/2016
 * Time: 3:13 AM
 *
 */
include '../Utils/LendBook.php';
include '../DbConnection/DBLink.php';
$error = "";
if (!isset($_COOKIE["user"])) {
    //http_redirect();
    //ToDo implemnt this
} else {

    $uname = $_COOKIE["user"];
    $utype = $_COOKIE["type"];

    if ($utype != "lib") {
        //http_redirect()
        //ToDO implemnt this
    }
}


if (isset($_POST["hidededdata"])) {

    if (!isset($_POST["Book"]) or ! isset($_POST["typeuser"])) {
        $error = "All * Filed must be filled";
    } else {
        $bookid = $_POST["Book"];
        $TypeUser = $_POST["typeuser"];
        $Mem_ID = $_POST["member_id"];

        $book = new LendBook();
        $book->setCopyid($bookid);
        $book->setMembership_id($Mem_ID);
        $book->setUserType($TypeUser);


        $db = new DBLink();
        echo $db->LendBookAddToDB($book);
    }
}

$db = new DBLink();
$books = $db->getAllBooks();
?>

<div><?php echo $error ?></div>
<form id='register' action='LendingBook.php' method='post'
      accept-charset='UTF-8'>
    <fieldset >
        <legend>Add Book</legend>
        <input type='hidden' name='hidededdata' id='name' maxlength="50" value="subdata"/>
        <br>
        <select name="typeuser">
            <option value="st">Student</option>
            <option value="te">Teacher</option>
            <option value="staff">Staff</option>

        </select>
        <br>
        <label for='member_id' >Member ID: </label>
        <input type='text' name='member_id' id='member_id' maxlength="50" />
        <br>
        <label for='Book' >Book*:</label>
        <select name="Book">
<?php
foreach ($books as $book) {

    echo "<option value=" . $book[1] . ">" . $book[0] . ' - ' . $book[7] . "</option>";
}
?>


        </select>

        <br>
     

        <input type='submit' name='Submit' value='Submit' />

    </fieldset>
</form>

<?php ?>