<div class="row-fluid">
<div class="span12">
<div class="widgetButtons" style="float: right;">                        
    <div class="bb"><a data-original-title="Nouveau &eacute;l&eacute;ment" href="javascript:openwindows('courriers_arrivee_form.php',960,500)" class="tipb" title=""><span class="ibw-plus"></span></a></div> 
</div>    
<div style="clear: both;"></div>              
    <div class="head clearfix">
        <div class="isw-grid"></div>
        <h1>Liste des courriers arriv&eacute;s </h1>                              
    </div>


<div class="block-fluid table-sorting clearfix">
<?php
     if($_GET['supp']){
        $classarrivee->Supprimer($_GET['supp']);
     }
     $sql="select * from courrier_arrivee where  visible='1' order by id_arrivee DESC";
     $arriveeliste=$classarrivee->RequeteSql($sql);
   ?> 
<table cellpadding="0" cellspacing="0" width="100%" class="table datatables" id="">
    <thead>
    <tr>
     <th width='5%'>#</th>
        <th align="center" width="15%">Date</th>
        <th align="center" width="15%">Date et N&deg; Courrier</th>
		<th align="center" width="20%">Titre</th>
        <th align="center" width="20%">Objet</th>
		<th align="center" width="5%">Fichier</th>
		<th align="center" width="35%">Actions</th>
    </tr>
    </thead>
    <tbody>
<?php
foreach($arriveeliste as $tabarriveeliste)
{
						$ligne++;
?>
	<tr bgcolor="<?php echo $bgcolor ?>">
        <td >
 		<input  onchange="checkclass(check<?php  echo $tabvisiteurliste['id_visiteur'] ?>)" id="check<?php  echo $tabvisiteurliste['id_visiteur'] ?>" type="checkbox" name="check" class="checkclass" value="<?php  echo $tabvisiteurliste['id_visiteur'] ?>" />
		</td>
		<td align="left">
		Le <?php echo datesql_to_frenchdate($tabarriveeliste['date_arrivee']);?><br />
        N&deg; <?php echo $classarrivee->RetunrCodeArrivee($tabarriveeliste['ordre_arrivee']);?>
		</td>
        <td align="left">
		Du <?php echo datesql_to_frenchdate($tabarriveeliste['datesurlalettre_arrivee']);?><br />
        N&deg; <?php echo $tabarriveeliste['numsurlalettre_arrivee'];?>
		</td>
		<td align="left">
		<?php echo stripslashes($tabarriveeliste['noms_arrivee']); ?>
		</td>
        <td align="left">
		<?php echo stripslashes($tabarriveeliste['objets_arrivee']); ?>
		</td>
        <td align="left">
        <a target="_blank" class="btn btn-default" style="text-decoration: none;" title="T&eacute;l&eacute;charger"  href="<?php echo UPLOAD_COURRIERS_RECU.stripslashes($tabarriveeliste['fichier_arrivee']); ?>">
      <i class="isw-download"></i>
      </a>
        </td>
        <td align="center">
            <a class="btn btn-warning" style="text-decoration: none;" title="Modification" onclick="openwindows('courriers_arrivee_form.php?mod=<?php  echo $tabarriveeliste['id_arrivee'] ?>',960,500)" href="#">
			<i class="icon-edit"></i>
			</a>
            &nbsp;
            <a class="btn btn-default" style="text-decoration: none;" title="Recommendation / Transfert" onclick="openwindows('courriers_recommandation.php?id_courrier=<?php  echo $tabarriveeliste['id_arrivee'] ?>',960,500)" href="#">
			<i class="icon-book"></i>
			</a> 
            &nbsp;
            <a class="btn btn-danger" style="text-decoration: none;" title="Suppression" href="javascript:if(confirm('voulez-vous vraiment supprimer ce arrivee du repertoire?')) document.location.href='?display=<?php echo $_SESSION['appmail']['display'];?>&supp=<?php  echo $tabarriveeliste['id_arrivee'] ?>';">
			<i class="icon-remove"></i>
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