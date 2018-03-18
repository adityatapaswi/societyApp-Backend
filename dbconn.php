 <?php
class dbconn
{

// Create connection
 function return_conn(){
 $servername = "148.72.232.176:3306";
// $servername = "localhost:3306";
    $username = "socdbuser";
//    $username = "root";
    $password = "vIi8k1_8";
//    $password = "root";
    $dbname="societydb";

    $conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
    return null;
}
     else
     {
     return $conn;
     }
}
}
?> 
