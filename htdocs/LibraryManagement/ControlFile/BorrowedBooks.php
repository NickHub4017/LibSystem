<?php
include '../DbConnection/DBLink.php';
if (!isset($_COOKIE["user"])) {
    header('Location: Login.php');
} else {

    $uname = $_COOKIE["user"];
    $utype = $_COOKIE["type"];

    if ($utype != "st") {
        header('Location: Login.php');
        //ToDO implemnt this
    }
}

$db = new DBLink();
$arr = $db->getUserInfoByUsername($uname);
$k = $arr[0];
$det = $db->getLendBooksbyMemID($k['memship_id']);

?>
<head>
    <script
        src="https://code.jquery.com/jquery-1.12.4.min.js"
        integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
    crossorigin="anonymous"></script>
</head>
<table id="table">
    <thead>
        <tr>
            <th>Book Name |</th>
            <th>Book Type |</th>
            <th>Burrow Date </th>
        </tr>
        
    </thead>
    <tbody>
       <?php
                foreach($det  as $de ){
                    echo '<tr>';
                    echo "<td>".$de ['bookname']."</td>";
                    echo "<td>".$de ['BookType']."</td>";
                    echo "<td>".$de ['burrowdate']."</td>";
                    echo '</tr>';
                }
                ?>
    </tbody>
</table>