<?php
header("Content-Type: text/html;charset=UTF-8");


$host = 'localhost';
$user = 'root';
$pw = '';
$dbName = 'pythondb';
$connect = new mysqli($host, $user, $pw, $dbName);

// 테이블의 모든 정보를 읽어온다.
$query = "SELECT * FROM inspections";
$result = mysqli_query($connect, $query);

$test_count = 0;

if(mysqli_num_rows($result) > 0)
 {
  $table = '
   <table border=1>
        <tr>
            <th> 사진 </th>
            <th> 알코올 농도 </th>
            <th> 공기질 값 </th>
            <th> 취함 여부 </th>
            <th> 측정 시간 </th>
        </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $image_address = "image1.jpg"; 
   $table .= '
    <tr>
        <td> <img src="'.$image_address.'" alt="Image" width="100"> </td>
        <td>'.$row["alcohol"].'</td>
        <td>'.$row["human_breath"].'</td>
   ';
    if($row["alcohol"] > 0.5){
      $table .= '
        <td> YES </td>
      ';
    } else {
      $table .= '
        <td> NO </td>
      ';
    }
    $table .= '
        <td>'.$row["detect_date"].'</td>
      </tr>
    ';
  }
  $table .= '</table>';
  echo $table;
 }


mysqli_close($connect);
?>
































