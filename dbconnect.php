<?php
  $host = "localhost";
  $user = "root";
  $dbpass = "";
  $dbname = "dbname";
  $dbcon = mysqli_connect($host,$user,$dbpass,$dbname);
?>



// <?php
// include('dbconnect.php');
// $sqlget = "SELECT * FROM TableName";
// $sqldata = mysqli_query($dbcon, $sqlget) or de('error getting in fetching the data');

// while($row = mysqli_fetch_array($sqldata, MYSQLI_ASSOC))	{
// 	echo $row['Column 1 Name'];
// 	echo $row['column 2 Name'];
// 	...
// }
// ?>