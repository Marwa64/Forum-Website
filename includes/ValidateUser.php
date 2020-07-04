<?php
  session_start();
  include_once ('sqlConnection.php');

  $email = mysqli_real_escape_string($connect, $_POST['email']);
  $password = mysqli_real_escape_string($connect, $_POST['password']);
  $select = "SELECT * FROM user_data WHERE user_email = '$email' AND user_password = '$password' AND verify = 'TRUE';";
  $result = mysqli_query($connect, $select);
  if (mysqli_num_rows($result) > 0){
    $row = mysqli_fetch_assoc($result);
    $_SESSION['name'] = $row["user_name"];
    $_SESSION['userID'] = $row["user_ID"];
    header("Location: ../index.php?login=success");
  } else {
    header("Location: ../Login.php?login=failed");
  }
