<?php
$CHANGEREP='../';
include("../config.php");
if($_GET['logout']){
        @session_destroy();
        header("location:../login.php");
        exit();
}
if(!isset($_SESSION['appmail']['login']))header("location:../login.php");
if($_GET['chatwith']){
   $_SESSION['appmail']['chatwith']['id']=$_GET['chatwith']; 
   $tabperson=$classperson->InfoSur($_SESSION['appmail']['chatwith']['id']);
   $_SESSION['appmail']['chatwith']['nom']=$tabperson['nom'];
    
}else{
    unset($_SESSION['appmail']['chatwith']);
}
include('chatscript.php');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/loose.dtd" >
<html>
<head>
<?php include('../header.php');?>
</head>
<style>
body{
    overflow: auto;
}
ul.user-list{
    list-style: none;
    padding: 0;
    margin: 0;
}
img.img-polaroid{
    width: 60px;
}
ul.user-list li a{
text-decoration: none;
color: #696D76;
display: block;
padding:5px;
text-align: left;
}
</style>
<body>
<audio style="display: none;" id="audioalert" controls="">
<source src="test.ogg" type="audio/ogg" />
</audio>
<div class="header">
        <a class="logo" href="#"><img src="../img/logochat.png" alt="Emanage -  Partages & Echanges" title="Emanage -  Partages & Echanges"/></a>
        <ul class="header_menu">
            <li class="list_icon"><a href="#">&nbsp;</a></li>
        </ul>    
</div>
<div class="menu">                

<?php 
$sqlgroup=$classgroupe->liste();
foreach($sqlgroup as $tabgroupval){?>                            
<ul class="navigation userconnecte" id="chat_user_list">

<?php  $sqlto=$classperson->ListePersonThisGroup($tabgroupval['id_grpe'],$ligne=0,$trie='',$visible=1);
if(($sqlto->rowCount()>0 && $classacces_entre_echange->Is_Acces($_SESSION['appmail']['mygroup'],$tabgroupval['id_grpe'],'chat')>0) && ($classacces_entre_echange->Is_Acces($tabgroupval['id_grpe'],$_SESSION['appmail']['mygroup'],'chat')>0)){
?>
<li class='active openable'>
<a href="#"><span class="isw-grid"></span><span class="text"><?php echo $tabgroupval['lib_grpe']?></span></a>
<ul class="">
<?php foreach($sqlto as $tabpersonliste){ $color='color: green;'; if($tabpersonliste['id_pers']==$_SESSION['appmail']['chatwith']['id']) $color='color: green;'; ?>
        <?php if($tabpersonliste['id_pers']!=$_SESSION['appmail']['me'] && $classperson->Is_connect($tabpersonliste['id_pers'])>0){ $nonvuchat=nonvuchatde($tabpersonliste['id_pers']);?>
        <li class="well userliste connecte" user-data='<?php echo $tabpersonliste['id_pers']; ?>' style="padding: 1px;margin-bottom:0px;">
        <a    href="?chatwith=<?php echo $tabpersonliste['id_pers']; ?>">
           <span  style="<?php echo $color;?>"><?php echo $tabpersonliste['nom'];?></span>
          <span class="bg"></span>
        </a>
        </li>
        <?php }?>
<?php $i++; }?>
</ul>     
</li>
<?php }}?>
</ul>
</div>
<div class="content">
         <div class="breadLine">
            <?php //include('breadline.php')?>
         </div>
         <div class="workplace">
             <?php include('bodychat.php') ?>
         </div>
</div> 
<script type="text/javascript" src="js/chatscript.js"></script>

</body>
</html>