var id_empty = "15"

window.addEventListener("keydown", function (event) {
  if (event.defaultPrevented) {
    return; // Do nothing if the event was already processed
  }

  switch (event.key) {
    case "ArrowDown":
      down()
      break;
    case "ArrowUp":
      up()
      break;
    case "ArrowLeft":
      left()
      break;
    case "ArrowRight":
      right()
      break;
    default:
      return; // Quit when this doesn't handle the key event.
  }

  event.preventDefault();
}, true);

function solving()
{
  document.getElementById("state").innerHTML = "You are currently solving the puzzle<br><br>The arrow keys are to be used to move the blank tile around (provided that the move is a valid one)"
  document.getElementById("buttn").disabled = true
}

function refresh()
{
  location.reload()
}

function up()
{
    if (parseInt(id_empty) > 3)
    {

        var new_id = (parseInt(id_empty) - 4) + ""
        document.getElementById(id_empty).innerHTML = document.getElementById(new_id).innerHTML
        document.getElementById(id_empty).style.backgroundColor = "lightblue"
        document.getElementById(new_id).innerHTML = ""
        document.getElementById(new_id).style.backgroundColor = "lightgreen"
        id_empty = new_id
        // if (true)
        // {
        //     var new_id = id_empty - 4;
        //     document.getElementById(id_empty).innerHTML = "sbidbfcdiubfo"//document,getElementById(new_id).innerHTML
        //     document.getElementById(id_empty).background-color="red"
        //     document.getElementById(new_id).innerHTML = ""
        // }
    }
}

function down()
{
    if (parseInt(id_empty)<12)
    {
        var new_id = (parseInt(id_empty) + 4) + ""
        document.getElementById(id_empty).innerHTML = document.getElementById(new_id).innerHTML
        document.getElementById(id_empty).style.backgroundColor = "lightblue"
        document.getElementById(new_id).innerHTML = ""
        document.getElementById(new_id).style.backgroundColor = "lightgreen"
        id_empty = new_id
    }
}
function right()
{
    var intId = parseInt(id_empty)
    if (parseInt(id_empty)%4 != 3)
    {
        var new_id = (parseInt(id_empty) + 1) + ""
        document.getElementById(id_empty).innerHTML = document.getElementById(new_id).innerHTML
        document.getElementById(id_empty).style.backgroundColor = "lightblue"
        document.getElementById(new_id).innerHTML = ""
        document.getElementById(new_id).style.backgroundColor = "lightgreen"
        id_empty = new_id
    }
}

function left()
{
    var intId = parseInt(id_empty)
    if (parseInt(id_empty)%4 != 0)
    {
        var new_id = (parseInt(id_empty) - 1) + ""
        document.getElementById(id_empty).innerHTML = document.getElementById(new_id).innerHTML
        document.getElementById(id_empty).style.backgroundColor = "lightblue"
        document.getElementById(new_id).innerHTML = ""
        document.getElementById(new_id).style.backgroundColor = "lightgreen"
        id_empty = new_id
    }
}

// function solving()
// {
//     document.getElementById("state").innerHTML = "You are currently solving the puzzle<br>\
//     The arrow keys are to be used to move the blank tile around (provided that the move is a valid one)"
// }