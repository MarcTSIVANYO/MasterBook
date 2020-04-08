<?php
$sqlsent=$classemail->msg_envoye($_SESSION['appmail']['id_pers'],0,"order by id_msg DESC");
?>
<!--  DEBUT MESSAGE ENVOYE -->
<div class="row-fluid">
<div class="span12">
<div class="head clearfix">
                        <div class="isw-grid"></div>
                        <h1>Messages envoy&eacute;s </h1>                               
                    </div>
<div class="block-fluid table-sorting clearfix">
<table cellpadding="0" cellspacing="0" width="100%" class="table datatables" id="">
    <thead>
        <tr>
            <th width="5%"></th>
            <th width="10%">De</th>
            <th>Objet</th>
            <th width="10%">Date</th>
            <th width="5%"></th>
       </tr>
             
        
        </thead>
        <tbody>
            <?php foreach($sqlsent as $tabmail){ 
                $attache_msg=$tabmail["attache_msg"];
                $date_msg=datesql_to_frenchdate($tabmail["date_msg"]);
                $objet_msg=tronque(stripslashes($tabmail["objet_msg"]),50);
                $emetteur=tronque(stripslashes($tabmail["nom"]),30);
                $idmessage=$tabmail["id_msg"];
                $file=DOSSIER_ATTACHE."/".$attache_msg;
            ?>
            <tr>
            <td ><?php if($lu=='n') {?><a href="#"><i class="icon-star"></i></a><?php }?></td>
            <td><strong>Moi</strong></td>
            <td ><a  href="javascript:openwindows('readsent.php?msg=<?php echo $idmessage ?>',960,500)" ><strong><?php echo $objet_msg ?></strong></a></td>
            <td ><strong><?php echo $date_msg ?></strong></td>
            <td ><?php if($attache_msg!='') {?>
                 <a target="_blank" class="btn btn-primary"  style="text-decoration: none;" title="T&eacute;l&eacute;charger" href="<?php echo $file; ?>">
                <i class="isw-attachment"></i>
            </a> 
            </td>
            
            <?php }?>
            </tr>
            <?php }?>
        </tbody>
        </table>
    </div>
</div>