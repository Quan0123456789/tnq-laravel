<?php
//  Bước 1: Kết nối PHP với MySQL
$conn = mysqli_connect("localhost", "root", "", "vietpro_mobile_shop");

//  Bước 2: Thông báo ngôn ngữ trong CSDL cho PHP
mysqli_query($conn, "SET NAMES 'utf-8'");

//  Bước 3: Viết câu lệnh SQL
$sql = "SELECT * FROM product";

//  Bước 4: Thực thi câu lệnh SQL
$query = mysqli_query($conn, $sql);
echo $rows=mysqli_num_rows($query);

//while($row = mysqli_fetch_array($query)){

// echo $row[1]."<br/>".$row["tai_khoan"]."<br/>";
//}


// echo "<pre>";
// print_r($row);
// echo "</pre>";

?>