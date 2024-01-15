<?php include_once "db.php";

$movie=$_GET['id'];

$ondate=$Movie->find($movie)['ondate'];

$today=date("Y-m-d");
// ondate    today 3
// ondate+1  today 2
// ondate+2  today 1

for($i=0;$i<3;$i++){
    $date=strtotime("+$i days",strtotime(($ondate)));
    if($date>=strtotime($today)){
        $str=date("Y-m-d",$date);
        echo "<option value='{$str}'>{$str}</option>";

    }
}