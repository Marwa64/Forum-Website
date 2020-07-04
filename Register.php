<?php
  include_once ("includes/sqlConnection.php");
  session_start();
  $fullURL = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
 ?>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Acme|Spicy+Rice&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="generalStyle.css">
    <title>Forum | Register</title>
  </head>
  <body>
     <div class="mainBlock">
       <span class="title">Register</span>
       <form action="includes/ValidateData.php" method="POST" >
         <div class="grid">
            <label>Username</label>
            <?php echo "<input type='text' id='name' name='name' class='textField' value='$_SESSION[registerName]'/>"; ?>
            <label>Email</label>
            <?php echo "<input type='email' id='email' name='email' class='textField' value='$_SESSION[registerEmail]'/>" ?>
            <label>Password</label>
            <?php echo "<input type='password' id='pw' name='password' class='textField' pattern='(?=.*\d).{6,}' title='Password must be at least 6 characters and contains at least 1 number.' value='$_SESSION[registerPassword]'/>" ?>
            <label id="confirmPas">Confirm Password</label>
            <?php echo "<input type='password' id='pw2' name='password2' class='textField' value='$_SESSION[registerPassword2]'/>" ?>
          </div>
         <br/> <input type="submit" value="Register" class="submit"/>
         <?php
            if(strpos($fullURL, "name=empty") == true){
              echo "<div class='errorMessage' id='errorMessage'>Fill in the username field</div>";
            } else if (strpos($fullURL, "email=empty") == true){
              echo "<div class='errorMessage' id='errorMessage'>Fill in the email field</div>";
            } else if (strpos($fullURL, "password=empty") == true){
              echo "<div class='errorMessage' id='errorMessage'>Fill in the password field</div>";
            } else if (strpos($fullURL, "email=invalid") == true){
              echo "<div class='errorMessage' id='errorMessage'>Invalid email</div>";
            } else if (strpos($fullURL, "password2=invalid") == true){
              echo "<div class='errorMessage' id='errorMessage'>The confirm password field in incorrect</div>";
            } else if (strpos($fullURL, "name=taken") == true){
              echo "<div class='errorMessage' id='errorMessage'>This Username is taken</div>";
            } else if (strpos($fullURL, "email=taken") == true){
              echo "<div class='errorMessage' id='errorMessage'>This email has already been used</div>";
            } else if (strpos($fullURL, "signup=success") == true){
              echo "<div class='errorMessage' id='successMessage'>Account has been created ! Activate the account via the link sent to your email.</div>";
              }
          ?>
       </form>
     </div>
  </body>
</html>
