<?php
  include_once ('sqlConnection.php');
  session_start();
  $comment = mysqli_real_escape_string($connect, $_POST['comment']);
  $topicID = mysqli_real_escape_string($connect, $_POST['topicID']);
  if(isset($_SESSION['name'])){
    // User logged in
    $sql = "INSERT INTO comments (comment, comment_date, user_ID, topic_ID) VALUES ('$comment', '$_SESSION[date]', '$_SESSION[userID]', '$topicID');";
    mysqli_query($connect, $sql);
    header("Location: ../Topic.php?topic=$topicID");
  } else {
    // User not logged in
    header("Location: ../Login.php");
  }
