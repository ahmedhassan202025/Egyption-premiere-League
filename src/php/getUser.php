<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");
header('Content-Type: application/json');
require("./deleteAll.php");

require("./connection.php");
error_reporting(E_ERROR | E_PARSE);

$_REQUEST = json_decode(file_get_contents("php://input"),true);
$username=($_REQUEST['username']);
$password=($_REQUEST['password']);

  

$sql = "SELECT * from Users WHERE  username='$username' and pass='$password'";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $results = array(
          'username' => $row['username'],
          'password'=>$row['pass'],
          'firstname'=>$row['firstname'],
          'lastname'=>$row['lastname'],
          'birthdate'=>$row['birthdate'],
          'gender'=>$row['gender'],
          'city'=>$row['city'],
          'address'=>$row['adress'],
          'email'=>$row['email'],
          'role'=>$row['rule'],
          'approved'=>$row['approved'],
          'admin'=>$row['adm']

       );
       
        $myJSON = json_encode($results);
        echo $myJSON;
    }
  }  else{
    echo "falsdasdse";
  }



?>




