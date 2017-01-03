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

    public function reguser(User $user) {
        //$dbhandle = mysql_connect($this->hostname, $this->username, $this->password);
        //$selected = mysql_select_db("libsystem",$dbhandle);
        if ($this->checkUser($user)) {
            return "User Exsists";
        }
        $con = mysqli_connect($this->hostname, $this->username, $this->password, "libsystem");
        $sql = 'INSERT INTO User (uname, pwd, address, telno, name, email,type) VALUES ( ? , ? , ? , ? , ? , ?,? );';
        $stmt = $con->prepare($sql);
        $stmt->bind_param('sssssss', $user->getUname(), $user->getPwd(), $user->getAddress(), $user->getTelno(), $user->getName(), $user->getEmail(), $user->getType());

        if ($stmt->execute()) {
          $uid = $con->insert_id;
            
            mysqli_close($con);
            $this-> createMember($uid);
            return "New User created successfully ";
        } else {
            mysqli_close($con);
            return $con->error;
        }
    }

    public function login(User $user) {
        //$dbhandle = mysql_connect($this->hostname, $this->username, $this->password);
        //$selected = mysql_select_db("libsystem",$dbhandle);
        $con = mysqli_connect($this->hostname, $this->username, $this->password, "libsystem");
        $sql = 'SELECT * FROM User where uname = ? and  pwd = ?;';

        $stmt = $con->prepare($sql);

        $stmt->bind_param('ss', $user->getUname(), $user->getPwd());


        $no_rows = 0;
        $stmt->execute();

        $returned_name = null;
        $returned_name2 = null;
        $result = $stmt->get_result();
        $rows = $result->fetch_all();


        if (sizeof($rows) == 1) {
            mysqli_close($con);
            return $rows[0];
        }
        mysqli_close($con);
        return false;
    }

    public function checkUser(User $user) {
        //$dbhandle = mysql_connect($this->hostname, $this->username, $this->password);
        //$selected = mysql_select_db("libsystem",$dbhandle);
        $con = mysqli_connect($this->hostname, $this->username, $this->password, "libsystem");
        $sql = 'SELECT * FROM User where uname = ?;';

        $stmt = $con->prepare($sql);

        $stmt->bind_param('s', $user->getUname());


        $no_rows = 0;
        $stmt->execute();

        $returned_name = null;
        $returned_name2 = null;
        $result = $stmt->get_result();
        $rows = $result->fetch_object();


        if (sizeof($rows) != 0) {
            mysqli_close($con);
            return true;
        }
        mysqli_close($con);
        return false;
    }

    public function bookAddToDB(Book $book) {
        //$dbhandle = mysql_connect($this->hostname, $this->username, $this->password);
        //$selected = mysql_select_db("libsystem",$dbhandle);
        if ($this->checkBook($book)) {
            return "Book Exsists";
        }
        $con = mysqli_connect($this->hostname, $this->username, $this->password, "libsystem");
        $sql = 'INSERT INTO book (bookname, ISBN, Author, Edition) VALUES ( ? , ? , ? , ? );';
        $stmt = $con->prepare($sql);
        $stmt->bind_param('ssss', $book->getName(), $book->getISBN(), $book->getAuthor(), $book->getEdition());

        if ($stmt->execute()) {
            mysqli_close($con);
            return "New Book created successfully";
        } else {
            mysqli_close($con);
            return $con->error;
        }
    }

    public function copyBookAddToDB(CopyBook $book) {
        //$dbhandle = mysql_connect($this->hostname, $this->username, $this->password);
        //$selected = mysql_select_db("libsystem",$dbhandle);

        $con = mysqli_connect($this->hostname, $this->username, $this->password, "libsystem");
        $sql = 'INSERT INTO copyBook (BookID,BookType) VALUES ( ? , ? );';
        $stmt = $con->prepare($sql);
        $stmt->bind_param('ss', $book->getBookdata(), $book->getTypeBook());

        if ($stmt->execute()) {
            mysqli_close($con);
            return "New Copy Book created successfully";
        } else {
            mysqli_close($con);
            return $con->error;
        }
    }

    public function checkBook(Book $book) {
        //$dbhandle = mysql_connect($this->hostname, $this->username, $this->password);
        //$selected = mysql_select_db("libsystem",$dbhandle);
        $con = mysqli_connect($this->hostname, $this->username, $this->password, "libsystem");
        $sql = 'SELECT * FROM book where bookname = ?;';

        $stmt = $con->prepare($sql);

        $stmt->bind_param('s', $book->getISBN());


        $no_rows = 0;
        $stmt->execute();

        $returned_name = null;
        $returned_name2 = null;
        $result = $stmt->get_result();
        $rows = $result->fetch_object();


        if (sizeof($rows) != 0) {
            mysqli_close($con);
            return true;
        }
        mysqli_close($con);
        return false;
    }

    public function getAllAuthors() {
        //$dbhandle = mysql_connect($this->hostname, $this->username, $this->password);
        //$selected = mysql_select_db("libsystem",$dbhandle);
        $con = mysqli_connect($this->hostname, $this->username, $this->password, "libsystem");
        $sql = 'SELECT * FROM author';

        $stmt = $con->prepare($sql);




        $no_rows = 0;
        $stmt->execute();

        $returned_name = null;
        $returned_name2 = null;
        $result = $stmt->get_result();
        $rows = $result->fetch_all();


        mysqli_close($con);
        return $rows;
    }

    public function checkAuthor(Author $author) {
        //$dbhandle = mysql_connect($this->hostname, $this->username, $this->password);
        //$selected = mysql_select_db("libsystem",$dbhandle);
        $con = mysqli_connect($this->hostname, $this->username, $this->password, "libsystem");
        $sql = 'SELECT * FROM Author where AuthorName = ?;';

        $stmt = $con->prepare($sql);

        $stmt->bind_param('s', $author->getAuthor());


        $no_rows = 0;
        $stmt->execute();

        $returned_name = null;
        $returned_name2 = null;
        $result = $stmt->get_result();
        $rows = $result->fetch_object();


        if (sizeof($rows) != 0) {
            mysqli_close($con);
            return true;
        }
        mysqli_close($con);
        return false;
    }

    public function AuthorAddToDB(Author $author) {
        //$dbhandle = mysql_connect($this->hostname, $this->username, $this->password);
        //$selected = mysql_select_db("libsystem",$dbhandle);
        if ($this->checkAuthor($author)) {
            return "Author Exsists";
        }
        $con = mysqli_connect($this->hostname, $this->username, $this->password, "libsystem");
        $sql = 'INSERT INTO Author (AuthorName) VALUES ( ? );';
        $stmt = $con->prepare($sql);
        $stmt->bind_param('s', $author->getAuthor());

        if ($stmt->execute()) {
            mysqli_close($con);
            return "New Author Added to database successfully";
        } else {
            mysqli_close($con);
            return $con->error;
        }
    }

    public function getAllBooks() {
        //$dbhandle = mysql_connect($this->hostname, $this->username, $this->password);
        //$selected = mysql_select_db("libsystem",$dbhandle);
        $con = mysqli_connect($this->hostname, $this->username, $this->password, "libsystem");
        $sql = 'SELECT * FROM book inner join author on book.Author  = author.AuthID';

        $stmt = $con->prepare($sql);




        $no_rows = 0;
        $stmt->execute();

        $returned_name = null;
        $returned_name2 = null;
        $result = $stmt->get_result();
        $rows = $result->fetch_all();


        mysqli_close($con);
        return $rows;
    }

    public function checkMember(LendBook $lendBook) {
        //$dbhandle = mysql_connect($this->hostname, $this->username, $this->password);
        //$selected = mysql_select_db("libsystem",$dbhandle);
        $con = mysqli_connect($this->hostname, $this->username, $this->password, "libsystem");
        $sql = 'SELECT * FROM memship where memship_id = ?;';

        $stmt = $con->prepare($sql);

        $stmt->bind_param('d', $lendBook->getMembership_id());


        $no_rows = 0;
        $stmt->execute();

        $returned_name = null;
        $returned_name2 = null;
        $result = $stmt->get_result();
        $rows = $result->fetch_object();


        if (sizeof($rows) != 0) {
            mysqli_close($con);
            return true;
        }
        mysqli_close($con);
        return false;
    }

    public function checkBookAvailable(LendBook $lendBook) {
        //$dbhandle = mysql_connect($this->hostname, $this->username, $this->password);
        //$selected = mysql_select_db("libsystem",$dbhandle);
        $con = mysqli_connect($this->hostname, $this->username, $this->password, "libsystem");
        $sql = 'SELECT * FROM lendingrecord where CopybookID = ? and isReturned = false ;';

        $stmt = $con->prepare($sql);

        $stmt->bind_param('d', $lendBook->getCopyid());


        $no_rows = 0;
        $stmt->execute();

        $returned_name = null;
        $returned_name2 = null;
        $result = $stmt->get_result();
        $rows = $result->fetch_object();


        if (sizeof($rows) != 0) {
            mysqli_close($con);
            return true;
        }
        mysqli_close($con);
        return false;
    }

    public function checkBookReserve(LendBook $lendBook) {
        //$dbhandle = mysql_connect($this->hostname, $this->username, $this->password);
        //$selected = mysql_select_db("libsystem",$dbhandle);
        $con = mysqli_connect($this->hostname, $this->username, $this->password, "libsystem");
        $sql = 'SELECT * FROM reservation where copybook_id = ? and isReserved = true ;';

        $stmt = $con->prepare($sql);

        $stmt->bind_param('d', $lendBook->getCopyid());


        $no_rows = 0;
        $stmt->execute();

        $returned_name = null;
        $returned_name2 = null;
        $result = $stmt->get_result();
        $rows = $result->fetch_object();


        if (sizeof($rows) != 0) {
            mysqli_close($con);
            return true;
        }
        mysqli_close($con);
        return false;
    }

    public function checkBookCondition(LendBook $lendBook) {
        //$dbhandle = mysql_connect($this->hostname, $this->username, $this->password);
        //$selected = mysql_select_db("libsystem",$dbhandle);
        $con = mysqli_connect($this->hostname, $this->username, $this->password, "libsystem");
        $sql = 'SELECT * FROM copybook where idCopyBook = ? ;';

        $stmt = $con->prepare($sql);

        $stmt->bind_param('d', $lendBook->getCopyid());


        $no_rows = 0;
        $stmt->execute();

        $returned_name = null;
        $returned_name2 = null;
        $result = $stmt->get_result();
        $rows = $result->fetch_object();


        if (sizeof($rows) != 0) {
            mysqli_close($con);
            return $rows;
        }
        mysqli_close($con);
        return false;
    }

    public function LendBookAddToDB(LendBook $lendBook) {
        //$dbhandle = mysql_connect($this->hostname, $this->username, $this->password);
        //$selected = mysql_select_db("libsystem",$dbhandle);
        if ($lendBook->getUserType() == "te") {
            
        } else {
            if ($this->checkMember($lendBook)) {
                if (!$this->checkBookAvailable($lendBook)) {
                    if (!$this->checkBookReserve($lendBook)) {
                        $rows = $this->checkBookCondition($lendBook);
                        if ($rows->BookType == "dam") {
                            return "Book is damaged";
                        } else {
                           $r =  $this->checkBurrowBooks($lendBook);
                           $lencount = 0;
                           $refcount = 0;
                           
                          // print_r($r);
                           foreach($r as $rr){
                             
                               if($rr["BookType"] == "ref"){
                                 $refcount =  $rr["count"];
                               }else if($rr["BookType"] == "len"){
                                 $lencount =   $rr["count"]; 
                               }
                           }
                           
                           if($rows->BookType == "ref" && $refcount == 1){
                                return "The reference book limit exceeded";
                           }else if($rows->BookType == "len" && $lencount == 2){
                               return "The Lending book limit exceeded";
                           }else{
                            $con = mysqli_connect($this->hostname, $this->username, $this->password, "libsystem");
                            $sql = 'INSERT INTO lendingrecord (CopybookID,memship_id) VALUES ( ?,? );';
                            $stmt = $con->prepare($sql);
                            $stmt->bind_param('sd', $lendBook->getCopyid(),$lendBook->getMembership_id());
                           

                            if ($stmt->execute()) {
                                mysqli_close($con);
                                if($rows->BookType == "ref"){
                                    return "Lending Successfully Book is reference type";
                                }else if($rows->BookType == "len"){
                                     return "Lending Successfully Book is lend type";
                                }
                                
                            } else {
                                mysqli_close($con);
                                return $con->error;
                            }
                           }
                        }
                    } else {
                        return "Book is reserved";
                    }
                } else {
                    return "Book is not available";
                }
            } else {
                return "Invalid Member ID";
            }
        }
    }

    public function createMember($user_id){
         $con = mysqli_connect($this->hostname, $this->username, $this->password, "libsystem");
        $sql = 'INSERT INTO memship (UserID,Start,End) VALUES ( ? , ?,? );';
        $stmt = $con->prepare($sql);
        $stmt->bind_param('dss',$user_id, date('Y-m-d'), date('Y-m-d', strtotime('+1 years')));

        if ($stmt->execute()) {
            mysqli_close($con);
            return "MemberShip created ";
        } else {
            mysqli_close($con);
            return $con->error;
        }
        
    }
    
    public function checkBurrowBooks(LendBook $lendBook){
         $con = mysqli_connect($this->hostname, $this->username, $this->password, "libsystem");
         
        $sql = 'SELECT copybook.BookType, COUNT(copybook.BookType) as count FROM lendingrecord inner join copybook on lendingrecord.CopybookID = copybook.idCopyBook  where lendingrecord.memship_id =? and lendingrecord.isReturned = false  group by copybook.BookType ; ';

        $stmt = $con->prepare($sql);

        $stmt->bind_param('d', $lendBook->getMembership_id());


        $no_rows = 0;
        $stmt->execute();

        $returned_name = null;
        $returned_name2 = null;
        $result = $stmt->get_result();
       // $rows = $result->fetch_assoc();
        while($row = $result->fetch_assoc())
    {
        $rows[] = $row;
    }
       

        if (sizeof($rows) != 0) {
            mysqli_close($con);
            return $rows;
        }
        mysqli_close($con);
        return false;
    }
    
    public function getCopyBooksbybookId($book_id){
          $con = mysqli_connect($this->hostname, $this->username, $this->password, "libsystem");
         
        $sql = 'select DISTINCT copybook.idCopyBook,book.bookname from copybook 
            right join book on book.book_id = copybook.BookID where copybook.idCopyBook 
            not in(SELECT CopybookID FROM `lendingrecord` 
            WHERE not EXISTS (select  1 from `lendingrecord` WHERE `isReturned` = true)) 
            and book.book_id = ? 
            and  copybook.idCopyBook is not null ;'
          
          ;

        $stmt = $con->prepare($sql);

        $stmt->bind_param('d', $book_id);


        $no_rows = 0;
        $stmt->execute();

        $returned_name = null;
        $returned_name2 = null;
        $result = $stmt->get_result();
       // $rows = $result->fetch_assoc();
          $rows = [];
        while($row = $result->fetch_assoc())
          
    {
        $rows[] = $row;
    }
       

        if (sizeof($rows) != 0) {
            mysqli_close($con);
            return $rows;
        }
        mysqli_close($con);
        return false;
        
    }
    
      public function getLendBooksbyMemID($mem_id){
          $con = mysqli_connect($this->hostname, $this->username, $this->password, "libsystem");
         
        $sql = 'SELECT lendingrecord.idLendingRecord,book.bookname,lendingrecord.Date,copybook.BookType  
            FROM lendingrecord inner join copybook on lendingrecord.CopybookID = copybook.idCopyBook 
            inner join book on book.book_id = copybook.BookID where lendingrecord.memship_id =?
            and lendingrecord.isReturned = false  ';
          
          

        $stmt = $con->prepare($sql);

        $stmt->bind_param('d', $mem_id);


        $no_rows = 0;
        $stmt->execute();

        $returned_name = null;
        $returned_name2 = null;
        $result = $stmt->get_result();
       // $rows = $result->fetch_assoc();
          $rows = [];
        while($row = $result->fetch_assoc())
          
    {
        $rows[] = $row;
    }
       

        if (sizeof($rows) != 0) {
            mysqli_close($con);
            return $rows;
        }
        mysqli_close($con);
        return false;
        
    }
}
