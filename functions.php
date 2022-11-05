<?php
$link = mysqli_connect("localhost","root","","blog");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  else{
	  echo "Bağlantı kuruldu";
  }
?>