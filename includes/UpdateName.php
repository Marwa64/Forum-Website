<html>
  <head>
  </head>
  <body>
    <?php
    include_once ('sqlConnection.php');
    session_start();
    if(isset($_POST['submit'])){
      $name = mysqli_real_escape_string($connect, $_POST['name']);
      $searchSql = "SELECT user_name FROM user_data WHERE user_name = '$name';";
      $result = mysqli_query($connect, $searchSql);
      if(mysqli_num_rows($result) > 0){
        echo "<span class='errorMessage'>This username is taken.</span>";
      } else {
        $_SESSION['name'] = $name;
        $sql = "UPDATE user_data SET user_name = '$name' WHERE user_ID = '$_SESSION[userID]';";
        mysqli_query($connect, $sql);
        echo "<span class='successMessage'>Username has been updated!</span>";
      }
    }
     ?>
  </body>
</html>
