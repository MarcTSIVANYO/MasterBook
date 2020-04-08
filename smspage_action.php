<?php
include('./config.php');

if($_GET['action']=='envoie') envoie_sms();

function envoie_sms(){
    $message=$_POST['message'];
   foreach($_POST['numero'] as $value){
        $result=$classSMS->send($value,$message,'228');
        $tab=json_decode($result, true);
        if($tab['msgId']!=""){
          $classSMS->InsertInDB($value,$message,$tab['msgId']); 
        }
        echo $result;
    } 
}
?>