<?php
/**
 * Created by PhpStorm.
 * User: NRV
 * Date: 11/14/2016
 * Time: 9:15 AM
 */

class DBLink {
var $username = "root";
    var $password = "";
    var $hostname = "localhost";


    public function reguser(User $user)
    {
        //$dbhandle = mysql_connect($this->hostname, $this->username, $this->password);
        //$selected = mysql_select_db("libsystem",$dbhandle);
        $con=mysqli_connect($this->hostname, $this->username, $this->password,"libsystem");
        $sql = 'INSERT INTO User (uname, pwd, address, telno, name, email) VALUES ( ? , ? , ? , ? , ? , ? );';
        $stmt = $con->prepare($sql);
        $stmt->bind_param('ssssss', $user->getUname(),$user->getPwd(),$user->getAddress(),$user->getTelno(), $user->getName(),$user->getEmail());

        if ($stmt->execute()) {
            return "New User created successfully";
        } else {
            return $con->error;
        }
        mysqli_close($con);

    }
} 