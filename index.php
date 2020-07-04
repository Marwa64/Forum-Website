<?php
  session_start();
  $_SESSION['url'] = $fullURL = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
 ?>
<html>
  <head>
    <link href="https://fonts.googleapis.com/css?family=Acme|Spicy+Rice&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="ForumPageStyle.css"/>
    <title>Forum | Home</title>
    <script>
      function validateForm(){
        var name = document.getElementById("topicName");
        var category = document.getElementById("category");
        var error = document.getElementById("errorMessage");
        if (name.value == ""){
          error.innerHTML = "Fill in the topic title.";
          return false;
        }
        if (category.value == "Category"){
          error.innerHTML = "Pick a category.";
          return false;
        }
        error.innerHTML = "";
      }
    </script>
  </head>
  <body>
    <?php include ('header.php') ?>
    <div class="block">
      <form id="firstBlock" action="includes/addTopic.php" method="post" onsubmit="return validateForm()">
          <textarea id="topicName" name="topic" placeholder="Enter the topic title here!" ></textarea>
          <select id="category" name="category">
            <option id="defaultTopic" value="Category" selected> - Pick a Category - </option>
            <option value="Education"> Education </option>
            <option value="Entertainment"> Entertainment </option>
            <option value="Other"> Other </option>
          </select>
        <span class="errorMessage" id="errorMessage"></span>
        <div>
          <input class="submit" type="submit" value="Post Anonymously" name="submitAnon"/>
          <input class="submit" type="submit" value="Post as Yourself" name="submitUser"/>
        </div>
      </form>
    </div>
    <div id="secondBlock" class="block">
      <h1>Topics</h1>
      <hr>
      <!-- Gets all topics from the database and places them in the webpage -->
      <?php
        include ('includes/sqlConnection.php');
        if (!$connect) {
          die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "SELECT topic_ID, user_name, topic_name, category FROM topic LEFT JOIN user_data ON topic.user_ID = user_data.user_ID ORDER BY topic_ID DESC;";
        $result = mysqli_query($connect, $sql);
        if (mysqli_num_rows($result) > 0){
          echo "<table width='100%'>";
          while($row = mysqli_fetch_assoc($result)){
            $topicID = $row['topic_ID'];
            $username = $row["user_name"];
            if ($username == ""){
              $username = "Anonymous";
            }
            echo "<tr>
                    <td>
                    <button onClick=\"window.open('Topic.php?topic=$topicID', '_blank')\" class='topic'> <span class='topicName'>".$row['topic_name']."</span> <br>".$row["category"]."<br> Created by: ".$username."</button>
                    </td>
                 </tr>";
          }
          echo "</table>";
        } else {
          echo "<h2> There are no topics yet </h2>";
        }
       ?>
    </div>
  </body>
</html>
