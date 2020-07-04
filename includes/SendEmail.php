<?php
  require_once ("PHPMailer/PHPMailerAutoLoad.php");
  include_once ('sqlConnection.php');

  $name = mysqli_real_escape_string($connect, $_GET['name']);
  $email = mysqli_real_escape_string($connect, $_GET['email']);
  $password = mysqli_real_escape_string($connect, $_GET['password']);
  $sqlInsert = "INSERT INTO user_data (user_name, user_email, user_password, verify) VALUES ('$name', '$email', '$password', 'FALSE');";
  mysqli_query($connect, $sqlInsert);
  $sqlFetch = "SELECT user_ID FROM user_data WHERE user_name='$name' AND user_email='$email' AND user_password='$password';";
  $result = mysqli_query($connect, $sqlFetch);
  $row = mysqli_fetch_assoc($result);
  $userID = $row["user_ID"];

  $mail = new PHPMailer();
  $mail->isSMTP();
  /*$mail->SMTPDebug = 1;*/
  $mail->SMTPAuth = true;
  $mail->SMTPSecure = 'ssl';
  $mail->Host = "ssl://smtp.gmail.com";
  $mail->Port = 465;
  $mail->isHTML(true);
  $mail->Username = "email.validation64@gmail.com";
  $mail->Password = "marwaomar2001";
  $mail->SetFrom("no-reply@forum.com", "Forum");
  $mail->Subject = "Forum Email Validation";
  $mail->Body = "Click on this link to activate your account: http://".$_SERVER['HTTP_HOST']."/login%20system/includes/AddAccount.php?id=$userID";
  $mail->AddAddress($email);

  if ($mail->send()){
    header("Location: ../Register.php?signup=success");
  }
