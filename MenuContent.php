<html>
  <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <title></title>
    <script>
      $(document).ready(function(){
        $("#changePicture").click(function ChangePicture(){
          $(".menuContent").load("ChangeProfilePic.php");
        });
        $("#backbutton").attr('onClick', "document.location.href='includes/Logout.php';");
        $("#changeName").click(function ChangeName(){
          $(".menuContent").load("ChangeUserName.php");
        });
      });
    </script>
  </head>
  <body>
    <br> <br> <br>
    <button id="changePicture" class="menuButtons"> Change Profile Picture </button> <br> <br>
    <button id="changeName" class="menuButtons"> Change User Name </button>
    <br><br><br><br>
    <button id="backbutton" class="menuButtons"> Log Out </button>
  </body>
</html>
