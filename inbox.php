<?php 
$sqlinbox=$classemail->msg_recu($_SESSION['appmail']['id_pers'],0,"Order by d.id_msg DESC");
?>
<div class="row-fluid">
<div class="span12">
<div class="head clearfix">
                        <div class="isw-grid"></div>
                        <h1>Messages re&ccedil;us </h1>                               
                    </div>
<div class="block-fluid table-sorting clearfix">
    <?php //if($sqlinbox->rowCount()>0)
    {?>
        <table cellpadding="0" cellspacing="0" width="100%" class="table datatables" id=""> 
        <thead>
            <th width="5%"></th>
            <th width="10%">De</th>
            <th>Objet</th>
            <th width="15%">Date</th>
            <th width="10%">Fichier</th> 
        </thead> 
        <tbody>
            <?php foreach($sqlinbox as $tabmail){
                $lu=$tabmail["lu"];
                $attache_msg=$tabmail["attache_msg"];
                $date_msg=datesql_to_frenchdate($tabmail["date_msg"]);
                $objet_msg=tronque(stripslashes($tabmail["objet_msg"]),50);
                $emetteur=tronque(stripslashes($tabmail["nom"]),30);
                $idmessage=$tabmail["id_msg"];
                $file=DOSSIER_ATTACHE."/".$attache_msg; 
            ?>
            <tr>
            <td ><?php if($lu=='n') {?><a href="#"><i class="icon-star"></i></a><?php }?></td>
            <td ><strong><?php echo $emetteur ?></strong></td>
            <td><a href="javascript:openwindows('read.php?msg=<?php echo $idmessage ?>',960,500)"><strong><?php echo $objet_msg ?></strong></a></td>
            <td ><strong><?php echo $date_msg ?></strong></td>
            <td >
                <?php if($attache_msg!='') {?>
                    <a target="_blank" class="btn btn-primary"  style="text-decoration: none;" title="T&eacute;l&eacute;charger" href="<?php echo $file; ?>">
                <i class="isw-attachment"></i>
                <?php }?>
            </td>
            
            </tr>
            <?php }?>
        </tbody>
        </table>
        <?php }?>
</div>
</div>
</div>