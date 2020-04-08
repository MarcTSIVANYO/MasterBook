<div class="row-fluid">
<div class="span12">  
<div style="clear: both;"></div>              
                    <div class="head clearfix">
                        <div class="isw-grid"></div>
                        <h1>Mes visites </h1>                               
                    </div>


<div class="block-fluid table-sorting clearfix">
<?php
     if($_GET['supp']){
        $classvisiteur->Supprimer($_GET['supp']);
     }
     $visiteurliste=$classvisiteur->Mes_Visiteurs(0,'order by v.id_visiteur DESC',$_SESSION['appmail']['id_pers'],1);
   ?> 
<table cellpadding="0" cellspacing="0" width="100%" class="table datatables" id="">
    <thead>
    <tr>
		<th align="center" width="10%">Date</th>
        <th align="center" width="25%">Visiteurs</th></th>
		<th align="center" width="15%">Motif</th>
        <th align="center" width="35%">Message laiss&eacute;</th>
		<th align="center" width="15%">Lire Plus</th>
    </tr>
    </thead>
    <tbody>
<?php
foreach($visiteurliste as $tabvisiteurliste)
{
						$ligne++;
?>
	<tr bgcolor="<?php echo $bgcolor ?>">
        <td align="left">
		<?php echo date('d/m/Y H:i:s',strtotime($tabvisiteurliste['date'])) ; ?>
		</td>
		<td align="left">
		<?php echo stripslashes($tabvisiteurliste['nom_visiteur']); ?>
		</td>
		<td align="left">
		<?php echo stripslashes($tabvisiteurliste['motif_visiteur']); ?>
		</td>
        <td align="left">
		<?php echo stripslashes($tabvisiteurliste['message_visiteur']); ?>
		</td>
        <td align="center">
        <a class="btn btn-info"  style="text-decoration: none;" title="Detail" onclick="openwindows('fiche_visiteur_details.php?mod=<?php  echo $tabvisiteurliste['id_visiteur'] ?>',960,500)" href="#">
            <i class="isw-zoom"></i>
            </a> 
        </td>
	</tr>
<?php
}//Fin while
?>
</tbody>
</table>
</div>
</div>
</div>