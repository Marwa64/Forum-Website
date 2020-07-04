<?php
  include_once ("sqlConnection.php");
  session_start();
    $error = false;
    $name = mysqli_real_escape_string($connect, $_POST['name']);
    $email = mysqli_real_escape_string($connect, $_POST['email']);
    $password = mysqli_real_escape_string($connect, $_POST['password']);
    $password2 = mysqli_real_escape_string($connect, $_POST['password2']);;

    $_SESSION['registerName'] = $name;
    $_SESSION['registerEmail'] = $email;
    $_SESSION['registerPassword'] = $password;
    $_SESSION['registerPassword2'] = $password2;

    if ($name == ""){
      $error=true;
      header("Location: ../Register.php?name=empty");
    } else if ($email == ""){
      $error=true;
      header("Location: ../Register.php?email=empty");
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
      $error=true;
      header("Location: ../Register.php?email=invalid");
    } else if ($password == ""){
      $error=true;
      header("Location: ../Register.php?password=empty");
    } else if ($password2 != $password){
      $error=true;
      $_SESSION['registerPassword2']="";
      header("Location: ../Register.php?password2=invalid");
    }

    $sqlName = "SELECT user_name FROM user_data WHERE user_name = '$name';";
    $sqlEmail = "SELECT user_email FROM user_data WHERE user_email = '$email';";
    $resultName = mysqli_query($connect, $sqlName);
    $resultEmail = mysqli_query($connect, $sqlEmail);
    if(mysqli_num_rows($resultName) > 0){
      $error=true;
      header("Location: ../Register.php?name=taken");
    } else if (mysqli_num_rows($resultEmail) > 0){
      $error=true;
      header("Location: ../Register.php?email=taken");
    }

    if (!$error){
      header("Location: ../includes/SendEmail.php?name=$name&email=$email&password=$password");
    }

?>
