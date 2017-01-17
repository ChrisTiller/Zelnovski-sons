<?php
  $username = "root";
  $password = "";
  $host = "localhost";
  $database = "StoreAssignment";
  $connection = mysqli_connect($host,$username,$password,$database)
    or die("Cannot connect to the database.<br>" . mysql_error());
  //mysql_select_db($database)
  //  or die("Cannot select the database.<br>" . mysql_error());
?>
