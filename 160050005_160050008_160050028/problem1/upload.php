<?php
    session_start();
    if ($_SESSION["user"] != "eval"){
        echo "<script> alert('Please login'); </script> <script type='text/javascript'> window.location = 'index.php' </script>";
      }
    $target_dir = "./images/";
    $uploadOk=1;
    $total = count($_FILES['fileToUpload']['name']);
    if ($total >10){
        $uploadOk=0;
        echo "Can't upload more than 10 files at a time <br>";
    }
    // Loop through each file
    for($i=0; $i<$total && $uploadOk!=0; $i++) {
        //Get the temp file path
        $tmpFilePath = $_FILES['fileToUpload']['tmp_name'][$i];
        $target_file = $target_dir . $_FILES['fileToUpload']['name'][$i];
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        if($imageFileType != "jpg" && $uploadOk!=0) {
            echo "Sorry, only JPG files are allowed. ".$target_file." is not .jpg file <br>";
            $uploadOk = 0;
        }
        if ($_FILES["fileToUpload"]["size"][$i] > 204800 && $uploadOk !=0) {
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
    }
?>
<form action="new_upload.php" 
      method="post" 
      enctype="multipart/form-data">
    <input type="submit" value="Go back" name="submit">         
</form>