<?php
include '../Utils/User.php';
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

    if (!isset($_POST["member_id"]) or !isset($_POST["Book"]) or !isset($_POST["fine"])) {
        $error = "All * Filed must be filled";
    } else {
        $lendingrecord_id = $_POST["Book"];
        $fine = $_POST["fine"];
        $member_id = $_POST["member_id"];



        $db = new DBLink();
        echo $db->ReturningBook($lendingrecord_id, $fine);
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
<form id='register' action='EditBook.php' method='post'
      accept-charset='UTF-8'>
    <fieldset >
        <legend>Return Book</legend>

        <label for='Book' >Book*:</label>
        <select id="book" name="Book">
            <option value="">Select a book</option>
            <?php
            foreach ($books as $book) {

                echo "<option value=" . $book[1] . ">" . $book[0] . ' - ' . $book[7] . "</option>";
            }
            ?>


        </select>
        <input type='hidden' name='hidededdata' id='name' maxlength="50" value="subdata"/>

        <br>
        <label for='member_id' >Member ID: </label>
        <input type='text' name='member_id' id='member_id' maxlength="50" />
        <br>
        <input type='button' id="lendbook" name='lendbook' value='Get Lend Books' />
        <br>
        <label for='Book' >Lend Books *:</label>
        <select id="book" name="Book">
            <option value="">Select a book</option>



        </select>
        <br>
        <label for='fine' >Fine: </label>
        <input type='text'readonly="true" name='fine' id='fine' maxlength="50" />
        <br>

        <input type='submit' name='Submit' value='Submit' />

    </fieldset>
</form>
<script>
   
    $('#lendbook').on('click', function() {
        var member_id = $("#member_id").val();
        console.log(member_id);
       
        if(member_id!= null || member_id !=""){
            $.ajax({ url: 'ReturnBook.php',
                data: {action : member_id},
                type: 'post',
                success: function(output) {
                    console.log(jQuery.parseJSON(output));
                    if(!output==""){
                        var obj = jQuery.parseJSON( output );
                        // console.log(obj);
                        for($i = 0 ; $i<obj.length; $i++){
                                
                            $('#book').append($('<option>', {
                                value: obj[$i].idLendingRecord,
                                text: obj[$i].bookname,
                                dcount:  obj[$i].dateCount,
                                booktype:  obj[$i].BookType
                            }));
                            console.log(obj);
                        }
                    }
                      
            
                       
                }
            });
        }
    });
    
    $('#book').on('change', function() {
        var fil = $(this).attr("dcount");
        var booktype = $( "#book option:selected" ).attr("booktype");
        if (booktype != "" || booktype != null || booktype!= 'undefined'){
            if(booktype == "ref"){
                var days = $( "#book option:selected" ).attr("dcount");
                if(days > 0){
                    $("#fine").val((days - 1)*2);
                }else{
                    $("#fine").val(0);
                }
            }else if(booktype == "len"){
                var days = $( "#book option:selected" ).attr("dcount");
                if(days > 7){
                    $("#fine").val((days - 7)*10);
                }else{
                    $("#fine").val(0);
                }
            }
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