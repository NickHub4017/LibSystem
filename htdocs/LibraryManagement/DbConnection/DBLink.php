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
        if($this->checkUser($user)){
            return "User Exsists";
        }
        $con=mysqli_connect($this->hostname, $this->username, $this->password,"libsystem");
        $sql = 'INSERT INTO User (uname, pwd, address, telno, name, email,type) VALUES ( ? , ? , ? , ? , ? , ?,? );';
        $stmt = $con->prepare($sql);
        $stmt->bind_param('sssssss', $user->getUname(),$user->getPwd(),$user->getAddress(),$user->getTelno(), $user->getName(),$user->getEmail(),$user->getType());

        if ($stmt->execute()) {
            mysqli_close($con);
            return "New User created successfully";
        } else {
            mysqli_close($con);
            return $con->error;
        }


    }

    public function login(User $user)
    {
        //$dbhandle = mysql_connect($this->hostname, $this->username, $this->password);
        //$selected = mysql_select_db("libsystem",$dbhandle);
        $con=mysqli_connect($this->hostname, $this->username, $this->password,"libsystem");
        $sql = 'SELECT * FROM User where uname = ? and  pwd = ?;';

        $stmt = $con->prepare($sql);

        $stmt->bind_param('ss', $user->getUname(),$user->getPwd());


        $no_rows=0;
        $stmt->execute();

        $returned_name=null;
        $returned_name2=null;
        $result=$stmt->get_result();
        $rows=$result->fetch_all();


        if(sizeof($rows)==1){
            mysqli_close($con);
            return $rows[0];
        }
        mysqli_close($con);
        return false;


    }

    public function checkUser(User $user)
    {
        //$dbhandle = mysql_connect($this->hostname, $this->username, $this->password);
        //$selected = mysql_select_db("libsystem",$dbhandle);
        $con=mysqli_connect($this->hostname, $this->username, $this->password,"libsystem");
        $sql = 'SELECT * FROM User where uname = ?;';

        $stmt = $con->prepare($sql);

        $stmt->bind_param('ss', $user->getUname());


        $no_rows=0;
        $stmt->execute();

        $returned_name=null;
        $returned_name2=null;
        $result=$stmt->get_result();
        $rows=$result->fetch_object();


        if(sizeof($rows)==0){
            mysqli_close($con);
            return true;
        }
        mysqli_close($con);
        return false;


    }

    public function bookAddToDB(Book $book)
    {
        //$dbhandle = mysql_connect($this->hostname, $this->username, $this->password);
        //$selected = mysql_select_db("libsystem",$dbhandle);
        if($this->checkBook($book)){
            return "User Exsists";
        }
        $con=mysqli_connect($this->hostname, $this->username, $this->password,"libsystem");
        $sql = 'INSERT INTO book (bookname, ISBN, Author, Edition) VALUES ( ? , ? , ? , ? );';
        $stmt = $con->prepare($sql);
        $stmt->bind_param('ssss',$book->getName(),$book->getISBN(),$book->getAuthor(),$book->getEdition() );

        if ($stmt->execute()) {
            mysqli_close($con);
            return "New Book created successfully";
        } else {
            mysqli_close($con);
            return $con->error;
        }

    }

    public function checkBook(Book $book)
    {
        //$dbhandle = mysql_connect($this->hostname, $this->username, $this->password);
        //$selected = mysql_select_db("libsystem",$dbhandle);
        $con=mysqli_connect($this->hostname, $this->username, $this->password,"libsystem");
        $sql = 'SELECT * FROM book where bookname = ?;';

        $stmt = $con->prepare($sql);

        $stmt->bind_param('ss', $book->getISBN());


        $no_rows=0;
        $stmt->execute();

        $returned_name=null;
        $returned_name2=null;
        $result=$stmt->get_result();
        $rows=$result->fetch_object();


        if(sizeof($rows)==0){
            mysqli_close($con);
            return true;
        }
        mysqli_close($con);
        return false;


    }

    public function getAllAuthors()
    {
        //$dbhandle = mysql_connect($this->hostname, $this->username, $this->password);
        //$selected = mysql_select_db("libsystem",$dbhandle);
        $con=mysqli_connect($this->hostname, $this->username, $this->password,"libsystem");
        $sql = 'SELECT * FROM author';

        $stmt = $con->prepare($sql);




        $no_rows=0;
        $stmt->execute();

        $returned_name=null;
        $returned_name2=null;
        $result=$stmt->get_result();
        $rows=$result->fetch_all();


        mysqli_close($con);
        return $rows;


    }


} 