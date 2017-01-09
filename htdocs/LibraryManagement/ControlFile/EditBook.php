<?php
include '../Utils/User.php';
include '../Utils/Book.php';
include '../DbConnection/DBLink.php';
$error = "";



if (!isset($_COOKIE["user"])) {
   header('Location: Login.php');
    //ToDo implemnt this
} else {

    $uname = $_COOKIE["user"];
    $utype = $_COOKIE["type"];

    if ($utype != "li") {
       header('Location: Login.php');
        //ToDO implemnt this
    }
}
if (isset($_POST['action'])) {


    $mem_id = $_POST['action'];
    $db = new DBLink();
    $res = $db->getLendBooksbyMemID($mem_id);

    if ($res != false) {
        echo json_encode($res);
    } else {
        echo false;
    }

    exit();
}
if (isset($_POST["hidededdata"])) {

    if (!isset($_POST["Book"]) or !isset($_POST["bookname"]) or !isset($_POST["ISBN"])or !isset($_POST["Author"]) ) {
        $error = "All * Filed must be filled";
    } else {
        $book_id = $_POST["Book"];
        $book_name = $_POST["bookname"];
        $isbn = $_POST["ISBN"];
        $author = $_POST["Author"];
        $edition = $_POST["Edition"];
        
        print_r($book_id);
        print_r($book_name);
        print_r($isbn);
        print_r($author);

        $book = new Book();
        $book->setBook_id($book_id);
        $book->setName($book_name);
        $book->setAuthor($author);
        $book->setEdition($edition);
        $book->setISBN($isbn);
        $db = new DBLink();
       echo $db->updateBookByID($book);
    }
}

$db = new DBLink();
$books = $db->getAllBooks();

$auths=$db->getAllAuthors();
?>
<head>
    <script
        src="https://code.jquery.com/jquery-1.12.4.min.js"
        integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
    crossorigin="anonymous"></script>
</head>
<div><?php echo $error ?></div>
<form id='register' action='EditBook.php' method='post'
      accept-charset='UTF-8'>
    <fieldset >
        <legend>Edit Book</legend>
  <input type='hidden' name='hidededdata' id='name' maxlength="50" value="subdata"/>
        <label for='Book' >Book*:</label>
        <select id="book" name="Book">
            <option value="">Select a book</option>
            <?php
            
            foreach ($books as $book) {

                echo "<option value=" . $book[1] . ">" . $book[0] . ' - ' . $book[7] . "</option>";
            }
            ?>


        </select>
      

        <label for='bookname' >BookName*:</label>
        <input type='text' name='bookname' id='bookname' maxlength="50" />
        <br>
        <label for='ISBN' >ISBN*:</label>
        <input type='text' name='ISBN' id='ISBN' maxlength="11" />
        <br>


        <label for='Author' >Author*:</label>
        <select name="Author" id="Author">
            <?php
            foreach ($auths as $anauths) {

                echo "<option value=" . $anauths[0] . ">" . $anauths[1] . "</option>";
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
<script>
   
    
    $('#book').on('change', function() {
        var book_id = $( "#book" ).val();
        if (book_id != "" || book_id != null || book_id!= 'undefined'){ 
            var books = jQuery.parseJSON('<?php echo json_encode($books);?>');
           
            for($i = 0 ; $i<books.length ; $i++){
                if(book_id == books[$i][1] ){
                    $("#bookname").val(books[$i][0]);
                     $("#ISBN").val(books[$i][2]);
                     $("#Edition").val(books[$i][4]);
                     $("#Author").val(books[$i][6]);
                    
                }
                
            }
      
        }
       
    });


</script>