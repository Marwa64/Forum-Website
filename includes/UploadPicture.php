<?php
  session_start();
  if(isset($_POST['submit'])){
    $file = $_FILES['picture'];
    $fileName = $file['name'];
    $fileTmpDest = $file['tmp_name'];
    $fileSize = $file['size'];
    $fileError = $file['error'];
    $fileType = $file['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('png');

    if(in_array($fileActualExt, $allowed)){
      if($fileError === 0){
        if ($fileSize < 1000000){
          $fileNewName = $_SESSION['userID'].".". $fileActualExt;
          $fileDest = "Pictures/".$fileNewName;
          move_uploaded_file($fileTmpDest, $fileDest);
          header("Location: ../index.php?upload=success");
        } else {
        header("Location: ../index.php?upload=large");
        }
      } else {
        header("Location: ../index.php?upload=error");
      }
    } else {
      header("Location: ../index.php?upload=invalidtype");
    }
  }
