<?php
  session_start();
  include_once ('sqlConnection.php');

  $topic = mysqli_real_escape_string($connect, $_POST['topic']);
  $category = mysqli_real_escape_string($connect, $_POST['category']);
  if ($_POST["submitUser"]){
    if(isset($_SESSION['name'])){
      // User logged in and posted as themselves
      $sql = "INSERT INTO TOPIC(topic_name, category, user_ID) VALUES ('$topic', '$category', '$_SESSION[userID]');";
      mysqli_query($connect, $sql);
      header('Location: ../index.php?topic-create=success');
    } else {
      // User not logged in and tried to post as themselves
      header("Location: ../Login.php");
    }
  } else {
    // User posted anonymously
    $sql = "INSERT INTO TOPIC(topic_name, category) VALUES ('$topic', '$category');";
    mysqli_query($connect, $sql);
    header('Location: ../index.php?topic-create=success');
  }
