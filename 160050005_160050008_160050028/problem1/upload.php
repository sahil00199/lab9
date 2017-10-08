<?php
    session_start();
    if ($_SESSION["user"] != "eval"){
        echo "<script> alert('Please login'); </script> <script type='text/javascript'> window.location = 'index.php' </script>";
      }
    $target_dir = "./images/";
    $uploadOk=1;
    $filecount = 0;
    $files = glob($target_dir . "*");
    if ($files){
    $filecount = count($files);
    }
    if ($filecount > 12)
    {
        echo "There are $filecount files in the directory... more than 10 files are not allowed";
         $uploadOk=0;
     }
    $totalnumber = $_FILES['fileToUpload']['name'];
        $tmpFilePath = $_FILES['fileToUpload']['tmp_name'];
        $target_file = $target_dir . $_FILES['fileToUpload']['name'];
        $imageExtension = pathinfo($target_file,PATHINFO_EXTENSION);
        if($imageExtension != "jpg" && $uploadOk!=0) {
            echo "Sorry, only JPG files are allowed. ".$target_file." is not .jpg file <br>";
            $uploadOk = 0;
        }
        if ($_FILES["fileToUpload"]["size"] > 204800 && $uploadOk !=0) {
            echo "Sorry, the file ".$target_file." is too large <br>";
            $uploadOk = 0;
        }
        if ($uploadOk == 0){
            echo "Sorry, ".$target_file." not uploaded<br>";
        }
        else{
            if(move_uploaded_file($tmpFilePath, $target_file)){
                echo "File ".$target_file." Uploaded<br>";
            }
        }
        $uploadOk=1;
?>
<form action="new_upload.php" 
      method="post" 
      enctype="multipart/form-data">
    <input type="submit" value="Go back" name="submit">         
</form>