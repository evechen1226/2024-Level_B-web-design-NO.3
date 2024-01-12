<?php include_once "db.php";

$row=$Movie->find($_POST['id']);

//$row['sh']=($row['sh']==1)?0:1;

//三元運算式比判斷式快 tiok
//運算式比三元運算式
$row['sh']=($row['sh']+1)%2;

$Movie->save($row);

