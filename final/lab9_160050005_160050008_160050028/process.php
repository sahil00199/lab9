<!-- <?php
echo("asdasas<br>");
$target_dir = "uploads/";
echo("ad");
$target_file = $target_dir . basename($_FILES["fileUpload"]["name"]);
$uploadOk = 1;
echo($target_file);
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
if ($_FILES["fileUpload"]["size"] > 102400) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
} 
else {
    if (move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileUpload"]["name"]). " has been uploaded.";
	} 
	else {
       echo "Sorry, there was an error uploading your file.";
   }
 }
?> -->

<?php
$mystring = file_get_contents($_FILES['fileUpload'][tmp_name])
$myarr = explode(" ", strtolower($mystring));

$assarr = [];
foreach ($myarr as $item)
{
  if (array_key_exists($item, $assarr))
  {
    $assarr[$item] += 1;
  }
  else
  {
    $assarr[$item] = 1;
  }
}
foreach($assarr as $x => $x_value)
{
  echo ($x . $x_value . "<br>");
}
?>