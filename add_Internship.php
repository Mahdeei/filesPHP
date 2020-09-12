<?php
include 'index.php';



$fieldintern = array(
    'title',
    'company',
    'date',
    'numberinternship',
    'time_work',
    'type',
    'description',
    'adress',
    'phonenumber',
    'categori'
);

$userid = $_POST['id'];

$QueryInsert ="INSERT INTO internship(userid,";
$count =0;
$count2 =0;

foreach ($fieldintern as $field){
    if (isset($_POST[$field])){
       if ($count != (count($_POST)-2)){
           $QueryInsert .= "$field" . ',';

       }else{
           $QueryInsert .= "$field";
           $QueryInsert.= ") VALUES ($userid,";
           foreach ($fieldintern as $item){
               if ($count2 != (count($_POST) - 2) ){
                   $QueryInsert .= "'".$_POST[$item]."'" .",";
               }else{
                   $QueryInsert .= "'".$_POST[$item]."'" . ")";
               }
               $count2++;
           }

       }
    };
$count++;
}
print_r($QueryInsert);
if ($db-> query($QueryInsert)){
$resultUser['status']= 'added' ;
}else{
    $resultUser['status']= 'error' ;
}








echo json_encode($resultUser);

$db->close();





?>