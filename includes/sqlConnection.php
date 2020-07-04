<?php
  $dbServerName = "localhost";
  $dbUserName = "root";
  $dbPassword = "";
  $dbName = "forum";

  $connect = mysqli_connect($dbServerName, $dbUserName, $dbPassword, $dbName);

  if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
  }
