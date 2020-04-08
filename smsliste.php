<?php
$sqlsent=$classSMS->liste(0,"order by id_historique DESC");

?>
<!--  DEBUT MESSAGE ENVOYE -->
<div class="row-fluid">
<div class="span12">
<div class="head clearfix">
                        <div class="isw-grid"></div>
                        <h1>Messages SMS envoy&eacute;s </h1>                               
                    </div>
<div class="block-fluid table-sorting clearfix">
<table cellpadding="0" cellspacing="0" width="100%" class="table datatables" id="">
<thead>
                                <tr>
                                    <th width="8%">Destinataire</th>
                                    <th>Message</th>
                                    <th width="10%">Date</th>
                               </tr>
             
        
        </thead>
        <tbody>
            <?php foreach($sqlsent as $tabmail){
                //$lu=$tabmail["lu"];
                $messageto=$tabmail["messageto"];
                $date_sms=datesql_to_frenchdate($tabmail["date_sms"]);
                $message=(stripslashes($tabmail["message"]));
                $messageid=$tabmail["messageid"];
            ?>
            <tr>
            <td ><?php echo $messageto ?></td>
            <td ><strong><?php echo $message ?></strong></td>
            <td ><?php echo $date_sms ?></td>
            </tr>
            <?php }?>
        </tbody>
        </table>
    </div>
</div>