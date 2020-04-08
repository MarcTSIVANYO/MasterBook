<?php
include('config.php');
include('header.php');
 
$idmessage=$_GET['msg'];
$sqlread=$classemail->lire_un_msg_recu($idmessage);
if(count($sqlread)>0 && sans_espace($idmessage)!=""){
$msglu=$classemail->MsgLu($_SESSION['appmail']['id_pers'],$idmessage);
$tabread=$sqlread;
$from=stripslashes($tabread['nom']);
$attache_msg=$tabread["attache_msg"];
$objet_msg=stripslashes($tabread["objet_msg"]);
$date_msg=datesql_to_frenchdate($tabread["date_msg"]);
$texte_msg=(stripslashes($tabread["texte_msg"]));
$tabpiece=explode('|',$attache_msg);
?>
<div class="modal" style="width: 99%;left: 0;right: 0px;top: 0%;margin: 0 auto;height:550px;">
<div class="modal-header"></div>
<div class="modal-body">
<table class="table">
<tr>
   <td>From</td><td>&lt;<strong><?php echo $from ?></strong>&gt;</td>
</tr>
<tr>
<td>Date</td><td><?php echo $date_msg ?></td>
</tr>
<tr>
<td>Objet</td><td><?php echo $objet_msg ?></td>
</tr>
<tr>
<td>Pi&egrave;ce(s) jointe(s)</td>
<td><?php
	foreach($tabpiece as $values){
	   echo('<a target="_blank"  href="'.DOSSIER_ATTACHE.'/'.$values.'">'.$values.'</a></br>');
	}
?>
</td>
</tr>
<tr>
<td colspan="2"><?php echo $texte_msg ?></td>
</tr>
</table>
</div>
<div class="modal-footer">
            <button class="btn" onclick="closewindows()">Fermer</button>             
</div>
</div>
<?php
//mysql_query("update destinataire set lu='o' where id_msg='$idmessage' and id_pers='".$_SESSION['appmail']['id_pers']."'");
	}
?>