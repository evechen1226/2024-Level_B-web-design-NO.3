<?php include_once 'db.php';

// 有['tmp_name']不會是空值，不能用isset()
if(!empty($_FILES['trailer']['tmp_name'])){
    move_uploaded_file($_FILES['trailer']['tmp_name'],"../img/{$_FILES['trailer']['name']}");
$_POST['trailer']=$_FILES['trailer']['name'];
}

if(!empty($_FILES['poster']['tmp_name'])){
    move_uploaded_file($_FILES['poster']['tmp_name'],"../img/{$_FILES['poster']['name']}");
$_POST['poster']=$_FILES['poster']['name'];
}

$_POST['ondate']=$_POST['year']."-".$_POST['month']."-".$_POST['date'];
unset($_POST['year'],$_POST['month'],$_POST['date']);


$Movie->save($_POST);

to("../back.php?do=movie");