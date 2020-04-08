<div class="row-fluid">
<div class="span12">  
<div style="clear: both;"></div>              
                    <div class="head clearfix">
                        <div class="isw-grid"></div>
                        <h1>COURRIERS &Agrave; TRAITER </h1>                               
                    </div>


<div class="block-fluid table-sorting clearfix">
<?php
     $recommandationliste=$classarrivee->liste_courrier_recommandation_this_person($_SESSION['appmail']['id_pers'],0,'order by r.id_courrier_recommandation DESC',1);
   ?> 
<table cellpadding="0" cellspacing="0" width="100%" class="table datatables" id="">
    <thead>
    <tr>
        <th align="center" width="5%">#</th>
		<th align="center" width="40%">Titre</th>
		<th align="center" width="25%">Objet</th>
        <th align="center" width="10%">Fichier</th>
		<th align="center" width="15%">Recommandation</th>
    </tr>
    </thead>
    <tbody>
<?php
foreach($recommandationliste as $tabrecommandationliste)
{
						$ligne++;
                        $id_courrier=$tabrecommandationliste['id_courrier']
?>
	<tr bgcolor="<?php echo $bgcolor ?>">
		<td align="left">
        <?php echo $ligne; ?>
        </td>
        <td align="left">
        <?php echo stripslashes($tabrecommandationliste['noms_arrivee']); ?>
        </td>
        <td align="left">
		<?php echo stripslashes($tabrecommandationliste['objets_arrivee']); ?>
		</td>
        <td align="left">
         <a target="_blank" class="btn btn-default" style="text-decoration: none;" title="T&eacute;l&eacute;charger"  href="<?php echo UPLOAD_COURRIERS_RECU.stripslashes($tabrecommandationliste['fichier_arrivee']); ?>">
      <i class="isw-download"></i>
		</td>
        <td align="center" style="text-align: center;">
            <a class="btn btn-primary" style="text-decoration: none;" title="Voir les recommandations" onclick="openwindows('courriers_recommandation_view.php?id_courrier_recommandation=<?php  echo $tabrecommandationliste['id_courrier_recommandation'] ?>',960,500)" href="#">
			<i class="icon-list"></i>
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