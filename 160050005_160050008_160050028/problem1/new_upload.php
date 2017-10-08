<?php
    session_start();
    if ($_SESSION["user"] != "eval"){
        echo "<script> alert('Please login'); </script>";
      echo '<script type="text/javascript">
      window.location = "index.php"
      </script>';
      }
?>
<html>
<body>
<script>
	function validate_extension(value) {
		var allowedFiles = "jpg";
        var exten = value.split('.').pop()
        if (exten == allowedFiles)
        	return true;
        else
        {
        	alert("only jpg file are allowed for uploading")
        	return false;
        }
    }
</script>
<form action="upload.php" method="post" enctype="multipart/form-data">
	Select image to upload:
	<input type="file" name="fileToUpload[]" id="fileToUpload" multiple="multiple" onchange= "validate_extension(this.value);"/>
	<input type="submit" value="Upload File" name="submit">
</form><br><Br>
<form action="album.php" 
      method="post" 
      enctype="multipart/form-data">
    <input type="submit" value="Go back" name="submit">         
</form>
</body>
</html>