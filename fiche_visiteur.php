<?php
     if($_GET['supp']){
        $classvisiteur->Supprimer($_GET['supp']);
     }
     $visiteurliste=$classvisiteur->Mes_Enregistrements_Visiteur(0,'order by v.id_visiteur DESC',$_SESSION['appmail']['id_pers'],1);
   ?> 
<div class="row-fluid">
<div class="span12">  
<div class="widgetButtons" style="float: right;">                        
      <div class="bb"><a  href="javascript:openwindows('fiche_visiteur_form.php',960,500)" class="tipb" title="Nouveau &eacute;l&eacute;ment"><span class="ibw-plus"></span></a></div> 
</div>
<div style="clear: both;"></div>              
<div class="head clearfix">
    <div class="isw-grid"></div>
    <h1>Liste des visiteurs </h1> 
   <!--  <ul class="buttons">
        <li><a style="background-color: blue;"  href="javascript:openwindows('fiche_visiteur_form.php',960,500)" title="Nouveau &eacute;l&eacute;ment" class="isw-plus "></a></li>  
        <li> </li>  
    </ul> -->                              
</div>


<div class="block-fluid table-sorting clearfix">
<table cellpadding="0" cellspacing="0" width="100%" class="table datatables" id="">
    <thead>
    <tr>
        <th align="center" width="5%">#</th>
        <th align="center" width="10%">Type</th>
		<th align="center" width="">Nom</th>
		<th align="center" width="15%">Motif</th>
        <th align="center" width="">Message laiss&eacute;</th>
        <th align="center" width="15%">Personne demand&eacute;e</th>
        <th align="center" width="10%">Date</th>
		<th align="center" width="15%">Action</th>
    </tr>
    </thead>
    <tbody>
<?php
foreach($visiteurliste as $tabvisiteurliste)
{$type_visiteur='Arriv&eacute;e';
						$ligne++;
                        if(stripslashes($tabvisiteurliste['type_visiteur'])=='telephone') $type_visiteur='Appel T&eacute;l&eacute;phonique'
?>
	<tr bgcolor="<?php echo $bgcolor ?>">
       <td >
 		<input  onchange="checkclass(check<?php  echo $tabvisiteurliste['id_visiteur'] ?>)" id="check<?php  echo $tabvisiteurliste['id_visiteur'] ?>" type="checkbox" name="check" class="checkclass" value="<?php  echo $tabvisiteurliste['id_visiteur'] ?>" />
		</td>
    	<td align="left">
		<?php echo $type_visiteur ; ?>
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
        <td align="left">
		<?php echo stripslashes($tabvisiteurliste['nom']); ?>
		</td>
        <td align="left">
		<?php echo date('d/m/Y H:i:s',strtotime($tabvisiteurliste['date'])); ?>
		</td>
        <td align="center">
        <a class="btn btn-warning"  style="text-decoration: none;" title="Modifier un &eacute;l&eacute;ment" onclick="openwindows('fiche_visiteur_form.php?mod=<?php  echo $tabvisiteurliste['id_visiteur'] ?>',960,500)" href="#">
			<i class="isw-edit"></i>
			</a>
            &nbsp;
            <a class="btn btn-danger" style="text-decoration: none;" title="Supprimer un &eacute;l&eacute;ment" href="javascript:if(confirm('voulez-vous vraiment supprimer ce visiteur du repertoire?')) document.location.href='?page=<?php echo PAGE;?>&display=<?php echo $_SESSION['appmail']['display'];?>&supp=<?php  echo $tabvisiteurliste['id_visiteur'] ?>';">
			<i class="isw-delete"></i>
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