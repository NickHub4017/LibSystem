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

    if(!isset($_POST["name"]) or !$_POST["email"] or !$_POST["username"] or !$_POST["password"] or !$_POST["address"] or !$_POST["telno"]   ){
        $error="All * Filed must be filled";
    }else{
        $name=$_POST["name"];
        $email=$_POST["email"];
        $username=$_POST["username"];
        $password=$_POST["password"];
        $address=$_POST["address"];
        $telno=$_POST["telno"];
        $typeuser=$_POST["typeuser"];

        $user=new User();
        $user->setName($name);
        $user->setEmail($email);
        $user->setUname($username);
        $user->setPwd($password);
        $user->setAddress($address);
        $user->setTelno($telno);
        $user->setType($typeuser);

        $db=new DBLink();
        $error=$db->reguser($user);

    }
}

?>

<div><?php echo $error ?></div>
<form id='register' action='Register.php' method='post'
    accept-charset='UTF-8'>
<fieldset >
<legend>Register</legend>
<input type='hidden' name='hidededdata' id='name' maxlength="50" value="subdata"/>

<label for='name' >Your Full Name*: </label>
<input type='text' name='name' id='name' maxlength="50" />
    <br>
<label for='email' >Email Address*:</label>
<input type='text' name='email' id='email' maxlength="50" />
    <br>
<label for='username' >UserName*:</label>
<input type='text' name='username' id='username' maxlength="50" />
    <br>
<label for='password' >Password*:</label>
<input type='password' name='password' id='password' maxlength="50" />
    <br>

<label for='address' >address*:</label>
<input type='text' name='address' id='address' maxlength="150" />
    <br>
<label for='telno' >telno*:</label>
<input type='text' name='telno' id='telno' maxlength="10" />
    <br>

    <select name="typeuser">
        <option value="st">Student</option>
        <option value="te">Teacher</option>
        <option value="lib">Librarian</option>
        <option value="audi">Audi</option>
    </select>
<br>
    <input type='submit' name='Submit' value='Submit' />

</fieldset>
</form>

<?php

?>