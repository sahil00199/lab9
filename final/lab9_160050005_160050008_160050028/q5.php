
<?php

function gnomeSort(array $givenArr) {
    $i=1;
    while($i<count($givenArr)) {
        if ($givenArr[$i]>=$givenArr[$i-1]){
            $i++;
        }
        else {
        //swap the elements
        $tmp=$givenArr[$i];
        $givenArr[$i]=$givenArr[$i-1];
        $givenArr[$i-1]=$tmp;
            if ($i>1) {
                $i--;
            }
        }
    }
    return $givenArr;
}
$mystring = $_POST["gnome"];
$a = array_map("intval", explode(",", $mystring));
$final = gnomeSort($a);
foreach ($final as $value) {
        echo "$value <br>";
}
?>


