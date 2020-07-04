<html>
  <head>
    <link href="https://fonts.googleapis.com/css?family=Acme|Spicy+Rice&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="ForumPageStyle.css"/>
    <title>Forum | Topic</title>
  </head>
  <body>
    <?php
      session_start();
      include_once ('includes/sqlConnection.php');
      if (!$connect){
        die("Connection Failed: " . mysqli_connect_error());
      }
      $topicID = $_GET['topic'];
      $_SESSION['date'] = date("Y-m-d");
      include ('header.php');
    ?>
    <div >
      <form id="commentBlock" class="block" action="includes/AddComment.php" method="POST">
          <textarea placeholder="Write your comment here!" name="comment"></textarea>
          <input id= "postComment" type="submit" class="submit" value="Post Comment"/>
            <?php echo " <input id='topicID' name='topicID' value='$topicID'/>"; ?>
      </form>
    </div>
    <div id="secondBlock" class="block">
      <table width="100%">
      <?php
        $sql = "SELECT comments.user_ID, comment, user_name, comment_date FROM comments INNER JOIN user_data ON comments.user_ID = USER_DATA.user_ID WHERE topic_ID = '$topicID' ORDER BY comment_ID DESC;";
        $result = mysqli_query($connect, $sql);
        if (mysqli_num_rows($result) > 0){
          while($row = mysqli_fetch_assoc($result)){
            echo "<tr>
                    <td width=100%> <div class='comment'>
                    <table>
                      <tr>
                        <td><img class='profilePictureComment' src='includes/Pictures/".$row['user_ID'].".png?'".mt_rand()." onerror=\"this.onerror=null;this.src='includes/Pictures/default.png';\"/></td>
                        <td><span class='username'> $row[user_name] : </span> <br></td>
                      </tr>
                    </table>
                      <span class='content'>$row[comment]</span> <br>
                      <span class='date'>$row[comment_date]</span>
                    </div></td>
                  </tr>";
          }
        } else {
          echo "<h2> There are no comments yet </h2>";
        }
       ?>
     </table>
    </div>
  </body>
</html>
