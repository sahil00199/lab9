<?php
    session_start();
    if ($_SESSION["user"] != "eval"){
        echo "<script> alert('Please login'); </script> <script type='text/javascript'> window.location = 'index.php' </script>";
      }
?>
<html>
<body>
<script>
  function f (msg, url, line) {
    alert ("Message:" + msg)
    alert ("url:" + url)
    alert ("line:" + line)
  }
  window.onerror = f
	function validate_extension(value) {
		var allowedFiles = "jpg";
    var inp = document.getElementById('fileToUpload');
    for (var i = 0; i < inp.files.length; ++i) {
      var name = inp.files.item(i).name;
      var exten = name.split('.').pop()
      if (exten == allowedFiles)
        continue;
      else
      {
        alert("only jpg file are allowed for uploading")
        return false;
      }
    }
    return true;
  }
</script>
<form action="upload.php" method="post" enctype="multipart/form-data">
	Select image to upload:
	<input type="file" name="fileToUpload" id="fileToUpload"onchange= "validate_extension(this.value);"/>
	<input type="submit" value="Upload File" name="submit">
</form><br><Br>
<form action="album.php" 
      method="post" 
      enctype="multipart/form-data">
    <input type="submit" value="Go back" name="submit">         
</form>
</body>
</html>
