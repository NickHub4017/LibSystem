<?php
/**
 * Created by PhpStorm.
 * User: NRV
 * Date: 11/14/2016
 * Time: 3:13 AM
 *
 */
include '../Utils/User.php';
include '../DbConnection/DBLink.php';
$error="";

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
            $cookie_name2 = "type";
            setcookie($cookie_name, $res[0], time() + (86400 * 30), "/"); // 86400 = 1 day
            setcookie($cookie_name2, $res[6], time() + (86400 * 30), "/"); // 86400 = 1 day
            
            if($res[6] == "li"){
                header('Location: AdminHome.php');
            }else{
               
                header('Location: StudentHome.php');
            }
            
            

        }
        else{
            $error="Invalid credentials";
        }

    }
}

?>

    <div><?php echo $error ?></div>
    <form id='register' action='Login.php' method='post'
          accept-charset='UTF-8'>
        <fieldset >
            <legend>Register</legend>
            <input type='hidden' name='hidededdata' id='name' maxlength="50" value="subdata"/>


            <label for='username' >UserName*:</label>
            <input type='text' name='username' id='username' maxlength="50" />
            <br>
            <label for='password' >Password*:</label>
            <input type='password' name='password' id='password' maxlength="50" />
            <br>

            <input type='submit' name='Submit' value='Submit' />

        </fieldset>
    </form>

<?php

?>