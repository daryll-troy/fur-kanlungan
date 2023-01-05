<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "fur-kanlungan";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}else{}

// echo "<script>alert('Connected successfully')</script>";
// echo 'connected';
 // select all municipality
//  $sql = "SELECT muni_name FROM municipality;";
//  $result = mysqli_query($conn,$sql) or die("Fail");

//  if (mysqli_num_rows($result) > 0) {
//      // output data of each row
//      while ($row = mysqli_fetch_assoc($result)) {
//          echo "Municipality: " . $row["muni_name"] . "<br>";
//      }
//  } else {
//      echo "0 results";
//  }

//  mysqli_close($conn);
?>
