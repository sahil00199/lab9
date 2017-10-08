<!DOCTYPE html>
<html>
<head>
	<title>myserver</title>
</head>
<script type="text/javascript">
var State = {};
function formdisplay(id) {
    if (document.getElementById) {
        var divid = document.getElementById(id);

        State[id] = (State[id]) ? false : true; 
        for (var div in State){
            if (State[div] && div != id){
                document.getElementById(div).style.display = 'none';
                State[div] = false;
            }
        }
        divid.style.display = (divid.style.display == 'block' ? 'none' : 'block');
    }

}

// function changeradioother(io1,io2,io3,io4,id1,id2,id3,id4){
//  var other1= document.getElementById(io1);
//     other1.value=document.getElementById(id1).value;
//  var other2= document.getElementById(io2);
//     other2.value=document.getElementById(id2).value;
//  var other3= document.getElementById(io3);
//     other3.value=document.getElementById(id3).value;
//  var other4= document.getElementById(io4);
//     other4.value=document.getElementById(id4).value;
 
// }

</script>
<body>


<button onclick='formdisplay("addaction")'>Add</button>
<button onclick='formdisplay("updateaction")'>Update</button>
<button onclick='formdisplay("deleteaction")'>Delete</button>
<button onclick='formdisplay("givendateaction")' >Events on a date</button>
<button onclick='formdisplay("allaction")' >All events</button>
<br>
<br>
<form id="addaction" action="process.php" method="post" style="display:none">
	Please fill the following details about the event:<br><br>

	Date:
	<input type="Text" value="" name="date"><br>

	Start time:
	<input type="Text" value="" name="stime"><br>

	End time:
	<input type="Text" value="" name="etime"><br>

	Brief Description:
	<input type="Text" value="" name="description"><br>
	<input type="Submit" value="Submit" name="addsubmit"><br>
</form>

<form id="updateaction" action="process.php" method="post" style="display:none">
	Please fill the following changes for the event id:<br><br>

	Id:
	<input type="Text" value="" name="Id"><br>

	Date:
	<input type="Text" value="" name="date"><br>

	Start time:
	<input type="Text" value="" name="stime"><br>

	End time:
	<input type="Text" value="" name="etime"><br>

	Brief Description:
	<input type="Text" value="" name="description"><br>
	<input type="Submit" value="Submit" name="updmit"><br>
</form>

<form id="deleteaction" action="process.php" method="post" style="display:none">
	Please fill the id of the event:<br><br>
	Id:
	<input type="Text" value="" name="iid"><br>
	<input type="Submit" value="Submit" name="deletesubmit"><br>
</form>

<form id="allaction" action="process.php" method="post" style="display:none">
	Please click submit for viewing all the files:<br><br>

	<input type="Submit" value="Submit" name="allsubmit"><br>
</form>

<form id="givendateaction" action="process.php" method="post" style="display:none">
	Enter the date:<br><br>

	Date:
	<input type="Text" value="" name="date"><br>

	<input type="Submit" value="Submit" name="thisdatesubmit"><br>
</form>
</body>
</html>