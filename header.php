<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Acme|Spicy+Rice&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="ForumPageStyle.css"/>
    <link rel="stylesheet" href="MenuStyle.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <title></title>
    <script>
      $(document).ready(function(){
        if (!<?php echo isset($_SESSION['name'])?'true':'false'; ?>) {
          // User is not logged in
          $("img").click(function openMenu(){
            if($( window ).width() > 620){
              $(".menu").css("width", "35%");
            } else{
              $(".menu").css("height", "93%");
              $(".menu").css("width", "100%");
            }
            $(".profile").css("visibility", "hidden");
            $("#login").css("visibility", "visible");
            $("#login").click(function(){
              window.location = 'Login.php';
            });
            $("a").click(function closeMenu(){
              $(".menu").css("width", "0");
            });
          });
        } else {
          // User is logged in
          $("img").click(function openMenu(){
            if($( window ).width() > 620){
              $(".menu").css("width", "35%");
            } else{
              $(".menu").css("height", "93%");
              $(".menu").css("width", "100%");
            }
            $(".menuContent").css("visibility", "visible");
            $(".menuContent").load("MenuContent.php");
            $("a").click(function closeMenu(){
              $(".menuContent").css("visibility", "hidden");
              $(".menu").css("width", "0");
            });
          });
        }
      });
    </script>
  </head>
  <body>
    <div id="menu" class="menu" align="right">
      <a class="closebtn" onclick="closeMenu()">&times;</a>
      <button id="login" class="menuButtons">Log in</button>
      <div class="profile">
          <?php
            echo "<img class='profilePicture' src='includes/Pictures/".$_SESSION['userID'].".png?'".mt_rand()." onerror=\"this.onerror=null;this.src='includes/Pictures/default.png';\"/><br><br>";
            echo $_SESSION['name'];
            echo "<br>"
        ?>
      </div>
      <div id="content" class="menuContent">
      </div>
    </div>
    <div class="header">
       <span class="title"> Forum </span>
       <img id="menu" src="menu.png" alt="Menu icon" class="menuicon"/>
    </div>
  </body>
</html>
