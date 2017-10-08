<?php
session_start();
    if ($_SESSION["user"] != "eval"){
        echo "<script> alert('Please login'); </script> <script type='text/javascript'> window.location = 'index.php' </script>";
      }
$images = glob('images/*.jpg');
?>
<html>
<p id="test"></p>

<script>
	function f (msg, url, line) {
		alert ("Message:" + msg)
		alert ("url:" + url)
		alert ("line:" + line)
	}
	window.onerror = f
img_list = <?php echo json_encode($images); ?>;
// function addImage(s){
// 	img_list.push(s);
// }
//document.getElementById('test').innerHTML = img_list[0];
//var img_list = ["images/1.jpg", "images/2.jpg", "images/3.jpg"];
var x = 0;
function next(){
	//document.write(img_list.length);
if(x < img_list.length - 1){
	x= x + 1;
}
else
{
	x = 0;
}
document.getElementById('myImage').src=img_list[x];
}
function prev(){
if(x <= 0){
	x= img_list.length - 1;
}
else
{
	x = x - 1;
}
document.getElementById('myImage').src=img_list[x];
}
function first(){
document.getElementById('myImage').src=img_list[0];
}
function last(){
document.getElementById('myImage').src=img_list[img_list.length -1];
}
function redir(){
	window.location.href = "new_upload.php";
}
window.onload = function() {
       //when the document is finished loading, replace everything
       //between the <a ...> </a> tags with the value of splitText
   document.getElementById("myImage").src=img_list[0];
}

</script>
<body>
<?php	
	if ($_SESSION["user"] != "eval"){
        echo "<script> alert('Please login'); </script>";
      echo '<script type="text/javascript">
      window.location = "index.php"
      </script>';
      }
      ?>
	<h2 style="text-align:center;">3 Idiots</h2>
	<img id="myImage" src="images/1.jpg" style="height:80%">
	<br>
	<button onclick="next()" >Next</button>
	<button onclick="prev()" >Previous</button>
	<button onclick="first()" >First</button>
	<button onclick="last()" >Last</button>
	<button onclick="redir()" >upload new image</button>

</body>
</html>