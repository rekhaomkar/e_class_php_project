<?php  
 //pagination.php  
$connect = mysqli_connect("localhost", "root", "", "tutor");  
$record_per_page = 6;  
$page = '';  
$output = '';  
    if(isset($_POST["page"]))  
    {  
      $page = $_POST["page"];  
    }  
    else  
    {  
      $page = 1;  
    }  
    $start_from = ($page - 1)*$record_per_page;  
    $query = "SELECT * FROM user ORDER BY name DESC LIMIT $start_from, $record_per_page";  
    $result = mysqli_query($connect, $query);  
      $output .= "  
      <table  class='table table-striped'>
      <tr>  
      <th>#</th>
      <th>Name</th>
      <th>Email id</th>  
      <th>Password</th>  
      </tr>  
      ";
          $num=$start_from+1;
          while($row = mysqli_fetch_array($result))  
          {  
            $output .= '  
            <tr>   <td>'.$num .'</td>  
            <td>'.$row["Name"].'</td>  
            <td>'.$row["Email_id"].'</td>  
            <td>'.$row["Password"].'</td> 
            </tr>  
            ';  
            $num++;
          }  
          $output .= '</table><br /><div align="center">';  
          $page_query = "SELECT * FROM user ORDER BY Name DESC";  
          $page_result = mysqli_query($connect, $page_query);  
          $total_records = mysqli_num_rows($page_result);  
          $total_pages = ceil($total_records/$record_per_page);  
          for($i=1; $i<=$total_pages; $i++)  
          {  
            $output .= "<span class='pagination_link' style='cursor:pointer; padding:6px; border:1px solid #ccc;' id='".$i."'>".$i."</span>";  
          }  
          $output .= '</div><br /><br />';  
          echo $output;  
?>  