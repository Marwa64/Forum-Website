<?php
  session_start();
?>
<html>
  <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="MenuStyle.css"/>
    <script>
      $(document).ready(function(){
        $("button").click(function(){
          $(".menuContent").load("MenuContent.php");
        });
      });
    </script>
  </head>
  <body>
    <br><br>
    <form action="includes/UploadPicture.php" method="POST" enctype="multipart/form-data">
      <table width="100%">
        <tr>
          <td>
            <div class="image-upload">
                <label for="uploadPic">
                    <img src="Camera.png"/>
                </label>
              <input id="uploadPic" class="menuButtons" type="file" name="picture"/>
            </div>
          </td>
          <td><input id="uploadButton" class="menuButtons" type="submit" name="submit" value="Upload"/></td>
        </tr>
      </table>
      <br> <br>
      Only .png images are allowed <br><br>
      <?php
        $fullURL = $_SESSION['url'];
        if(strpos($fullURL, "upload=large") == true){
          echo "<div id='message' class='errorMessage'>The file was too large.</div>";
        } else if (strpos($fullURL, "upload=error") == true){
          echo "<div id='message' class='errorMessage'>There was an error uploading your file.</div>";
        } else if (strpos($fullURL, "upload=invalidtype") == true){
          echo "<div id='message' class='errorMessage'>The file type you uploaded was not allowed.</div>";
        } else {
          echo "<div id='message' class='errorMessage'></div>";
        }
       ?>
    </form>
    <br><br>
    <button class="menuButtons" id="backbutton"> Back </button>
  </body>
</html>
