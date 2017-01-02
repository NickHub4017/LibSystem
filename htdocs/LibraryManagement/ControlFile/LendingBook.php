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

if (isset($_POST['action'])) {


    $book_id = $_POST['action'];
    $db = new DBLink();
    $res = $db->getCopyBooksbybookId($book_id);
    if ($res != false) {
        echo json_encode($res);
    } else {
        echo false;
    }

    exit();
}
if (isset($_POST["hidededdata"])) {

    if (!isset($_POST["Book"]) or !isset($_POST["typeuser"]) or !isset($_POST["CopyBook"])) {
        $error = "All * Filed must be filled";
    } else {
        $bookid = $_POST["CopyBook"];
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
<head>
    <script
        src="https://code.jquery.com/jquery-1.12.4.min.js"
        integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
    crossorigin="anonymous"></script>
</head>
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
        <select id="book" name="Book">
            <option value="">Select a book</option>
            <?php
            foreach ($books as $book) {

                echo "<option value=" . $book[1] . ">" . $book[0] . ' - ' . $book[7] . "</option>";
            }
            ?>


        </select>
        <br>
        <label for='CopyBook' >Book Copy*:</label>
        <select id="copybook" name="CopyBook">

        </select>
        <br>


        <input type='submit' name='Submit' value='Submit' />

    </fieldset>
</form>
<script>
   
    $('#book').on('change', function() {
        var book_id = $("#book").val();
        $('#copybook').empty();
        if(book_id!= null || book_id !=""){
            $.ajax({ url: 'LendingBook.php',
                data: {action : book_id},
                type: 'post',
                success: function(output) {
                    if(!output==""){
                        var obj = jQuery.parseJSON( output );
                        for($i = 0 ; $i<obj.length; $i++){
                                
                            $('#copybook').append($('<option>', {
                                value: obj[$i].idCopyBook,
                                text: obj[$i].idCopyBook +' - '+ obj[$i].bookname
                            }));
                            console.log(obj);
                        }
                    }
                      
                    /* for($i = 0 ; obj.size(); $i++){
                             console.log(obj);
                        }*/
                       
                }
            });
        }
    });

    

  
    /* function mm(){
        var book_id = $("#book").val();
        if(book_id!= null || book_id !=""){
            $.ajax({ url: 'LendingBook.php',
                data: {action : book_id},
                type: 'post',
                success: function(output) {
                    console.log(output);
                }
            });
        }

    }*/
    
</script>
<?php ?>