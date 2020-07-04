<html>
  <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="MenuStyle.css"/>
    <script>
      $(document).ready(function(){
        $("form").submit(function(event){
          event.preventDefault();
          var name = $("#username").val();
          var submit = $("#submit").val();
          $("#nameError").load("includes/UpdateName.php",{
            name: name,
            submit: submit
          });
        });
        $("button").click(function(){
          $(".menuContent").load("MenuContent.php");
        });
      });
    </script>
  </head>
  <body>
    <form action="includes/UpdateName.php" method="POST">
      <input type="text" class="textField" id="username" placeholder="Enter the username"/>
      <input type="submit" name="submit" class="menuButtons" id="submit"/>
      <p id="nameError"></p>
    </form>
    <br><br>
    <button class="menuButtons" id="backbutton"> Back </button>
  </body>
</html>
