<?php
  session_start();
  $_SESSION['registerName'] = "";
  $_SESSION['registerEmail'] = "";
  $_SESSION['registerPassword'] = "";
  $_SESSION['registerPassword2'] = "";
?>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Acme|Spicy+Rice&display=swap" rel="stylesheet">
    <title>Forum | Login</title>
    <link rel="stylesheet" href="generalStyle.css"/>
  </head>
  <body>
     <!-- Login Block -->
     <div class="mainBlock">
       <span class="title">Login</span>
       <form  method="post" action="includes/ValidateUser.php">
         <div class="grid">
            <label>Email</label>
              <input type="email" name="email" class="textField"/>
              <label>Password</label>
              <input type="password" name="password" class="textField"/>
          </div>
         <br/> <input type="submit" value="Log in" class="submit"/>
         <?php
            /*Gets the current url and search for "login=failed" */
            $fullURL = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            if(strpos($fullURL, "login=failed") == true){
              echo "<div class='errorMessage'> Invalid email or password </div>";
            }
          ?>
       </form>
     </div>
     <br/><br/>
     <!-- Register Block -->
     <div class="registerBlock">
       <button class="submit" onClick="goRegister()"> Create a new account </button>
     </div>
     <script type="text/javascript">
        function goRegister(){
            window.location.href = 'Register.php';
        }
     </script>
  </body>
</html>
