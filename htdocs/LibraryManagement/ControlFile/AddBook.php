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
    //http_redirect();
    //ToDo implemnt this
} else {

    $uname=$_COOKIE["user"];
    $utype=$_COOKIE["type"];

    if($utype!="lib"){
        //http_redirect()
        //ToDO implemnt this
    }
}


if(isset($_POST["hidededdata"])){

    if(!isset($_POST["username"]) or !isset($_POST["password"])){
        $error="All * Filed must be filled";
    }else{
        $username=$_POST["username"];
        $password=$_POST["password"];

        $user=new User();
        $user->setUname($username);
        $user->setPwd($password);


        $db=new DBLink();
        $res=$db->login($user);
        if($res){
            $error="Login Done";
            $cookie_name = "user";

            setcookie($cookie_name, $res, time() + (86400 * 30), "/"); // 86400 = 1 day

        }
        else{
            $error="Invalid credentials";
        }

    }
}

$db=new DBLink();
$auths=$db->getAllAuthors();

?>

    <div><?php echo $error ?></div>
    <form id='register' action='Login.php' method='post'
          accept-charset='UTF-8'>
        <fieldset >
            <legend>Add Book</legend>
            <input type='hidden' name='hidededdata' id='name' maxlength="50" value="subdata"/>


            <label for='bookname' >BookName*:</label>
            <input type='text' name='bookname' id='bookname' maxlength="50" />
            <br>
            <label for='ISBN' >Password*:</label>
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