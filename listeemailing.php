<?php
 
$sqlsent=$classemailing->msg_envoye($_SESSION['appmail']['id_pers'],0,"order by id_msg DESC");
?>
<!--  DEBUT MESSAGE ENVOYE -->
<!--  DEBUT MESSAGE ENVOYE -->
<div class="row-fluid">
<div class="span12">
<div class="head clearfix">
                        <div class="isw-grid"></div>
                        <h1>Emailing envoy&eacute;s </h1>                               
                    </div>
<div class="block-fluid table-sorting clearfix">
<table cellpadding="0" cellspacing="0" width="100%" class="table datatables" id="">
<thead>
                                <tr>
                                    <th width="40%">Aux</th>
                                    <th>Objets</th>
                                    <th width="15%">Date</th>
                               </tr>
             
        
        </thead>
        <tbody>
            <?php foreach($sqlsent as $tabmail){
                //$lu=$tabmail["lu"];
                $attache_msg=$tabmail["attache_msg"];
                $date_msg=datesql_to_frenchdate($tabmail["date_msg"]);
                $objet_msg=tronque(stripslashes($tabmail["objet_msg"]),50);
                $emetteur=tronque(stripslashes($tabmail["nom"]),30);
                $idmessage=$tabmail["id_msg"];
            ?>
            <tr>
            <td><?php 
             $tb=$classemailing->ListDestMsgEnvoye($idmessage);
            foreach($tb as $tbval){
                echo $tbval['nom'].' , ';
            }
             ?></td>
            <td style="text-align: left;"><a href="javascript:openwindows('reademailing.php?msg=<?php echo $idmessage ?>',960,500)"><strong><?php echo $objet_msg ?></strong></a></td>
            <td><strong><?php echo $date_msg ?></strong></td>
            </tr>
            <?php }?>
        </tbody>
        </table>
    </div>
</div>