<?php
include('config.php');
include('header.php');
$idmessage=$_GET['msg'];
$sqlread=$classemailing->lire_un_msg_envoye($_SESSION['appmail']['id_pers'],$idmessage);
if(count($sqlread)>0 && sans_espace($idmessage)!=""){
$tabread=$sqlread;
$from=stripslashes($tabread['nom']);
$attache_msg=$tabread["attache_msg"];
$objet_msg=stripslashes($tabread["objet_msg"]);
$date_msg=datesql_to_frenchdate($tabread["date_msg"]);
$texte_msg=(stripslashes($tabread["texte_msg"]));
$tabpiece=explode('|',$attache_msg);
?>
<div class="span8" id="email-content">
<div class="body">
<dl class="dl-horizontal sender-info">
<dt>From</dt>
<dd><strong>Moi</strong></dd>
<dt>&Agrave;</dt>
<dd>
<?php $sqldest=$classemailing->ListDestMsgEnvoye($idmessage);
if($sqldest->rowCount()>0){
   foreach($sqldest as $tabdest){
    echo('&lt;<strong>'.stripslashes($tabdest['nom']).'</strong>&gt;&nbsp;');
} 
}
?>
</dd>
<dt>Date</dt><dd><?php echo $date_msg ?></dd>
<dt>Objet</dt><dd><?php echo $objet_msg ?></dd>
</dl>
<div class="message-content">
<?php echo $texte_msg ?>
</div>
</div>
</div>
<?php
	}
?>

<button class="btn" onclick="closewindows()">Fermer</button>  