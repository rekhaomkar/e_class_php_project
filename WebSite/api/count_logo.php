<?php

$entityBody = file_get_contents('php://input');
  $requestObject=json_decode($entityBody,true);
  header('Content-Type: application/json');
 // store request object to database...

  //echo json_encode($requestObject["username"]);
  //echo json_encode($requestObject["name"]);
 
  
$connect = mysqli_connect("localhost", "root", "", "tutor");  


if($connect==false){die("error in connection"); }
$json_array=array();

$page_query = "SELECT * FROM visitors";  
$page_result = mysqli_query($connect, $page_query);  
$total_v = mysqli_num_rows($page_result);  

 //echo $total_v;
$sql="select * from tab1 ";
$page_result2 = mysqli_query($connect, $sql);  
$total_l = mysqli_num_rows($page_result2);  

$sql="select * from user ";
$page_result3 = mysqli_query($connect, $sql);  
$total_u = mysqli_num_rows($page_result3);  
$myArr = array($total_v,$total_l,$total_u);
http_response_code(201);
echo json_encode($myArr);
?>