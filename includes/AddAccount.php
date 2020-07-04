<?php
  include_once ('sqlConnection.php');

  $userID = $_GET['id'];
  $sql = "UPDATE user_data SET verify = 'TRUE' WHERE user_ID = '$userID';";
  mysqli_query($connect, $sql);

  header("Location: ../Login.php?verification=success");
