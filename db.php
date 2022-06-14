<?php

$conn=new mysqli("localhost","root","","ajaxcrud");

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


?>