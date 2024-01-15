<?php include_once "db.php";

$movie=$_GET['id'];

//$ondate=$Movie->find($movie)['ondate'];
$ondate=strtotime($Movie->find($movie)['ondate']);

//$end = strtotime("+2 days",strtotime($ondate));
$end = strtotime("+2 days",$ondate);

$today=date("Y-m-d");
$dif=($end-strtotime($today))/(60*60*24);
// ondate    today 3
// ondate+1  today 2
// ondate+2  today 1

// 在迴圈內判斷
// for($i=0;$i<3;$i++){
//     $date=strtotime("+$i days",strtotime(($ondate)));
//     if($date>=strtotime($today)){
//         $str=date("Y-m-d",$date);
//         echo "<option value='{$str}'>{$str}</option>";

//     }
// }

// 在先計算相差幾天，決定迴圈數, 提高效能
for($i=0;$i<=$diff;$i++){
    $date=strtotime("Y-m-d",strtotime("+$i days",$ondate));
        echo "<option value='{$date}'>{$date}</option>";
}

// for($i=(2-$diff);$i<3;$i++){
//     $date=strtotime("Y-m-d",strtotime("+$i days",strtotime($ondate)));
//         echo "<option value='{$date}'>{$date}</option>";
// }