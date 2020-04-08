<?php
     if($_GET['supp']){
        $classgroupe->Supprimer($_GET['supp']);
     }
     $groupeliste=$classgroupe->liste(0,'',1);
   ?>
<div class="row-fluid">
<div class="span12">  
<div class="widgetButtons" style="float: right;">                        
                            <div class="bb"><a data-original-title="Nouveau &eacute;l&eacute;ment" href="javascript:openwindows('groupe_form.php',960,500)" class="tipb" title=""><span class="ibw-plus"></span></a></div> 
                            <div class="bb"><a data-original-title="Attribution des echanges" href="javascript:openEdit('entre_echange.php',960,500)" class="tipb" title=""><span class="ibw-documents"></span></a></div>
                            <div class="bb"><a data-original-title="Attribution des droits" href="javascript:openEdit('dispatch_acces.php',960,500)" class="tipb" title=""><span class="ibw-settings"></span></a></div>
                           
</div>    
<div style="clear: both;"></div>              
                    <div class="head clearfix">
                        <div class="isw-grid"></div>
                        <h1>Liste des services </h1>                               
                    </div>


<div class="block-fluid table-sorting clearfix">
<table cellpadding="0" cellspacing="0" width="100%" class="table datatables" id="">
    <thead>
    <tr>
         <th align="left" width="3%">#</th>
		<th align="center" width="20%">Nom</th>
		<th align="center" width="">Description</th>
        <th align="center" width="20%">D&eacute;partement</th>
		<th align="center" width="25%">Action</th>
    </tr>
    </thead>
    <tbody>
<?php
foreach($groupeliste as $tabgroupeliste)
{
						$ligne++;
?>
	<tr> 
       <td >
 		<input  onchange="checkclass(check<?php  echo $tabgroupeliste['id_grpe'] ?>)" id="check<?php  echo $tabgroupeliste['id_grpe'] ?>" type="checkbox" name="check" class="checkclass" value="<?php  echo $tabgroupeliste['id_grpe'] ?>" />
		</td>
		<td align="left">
		<?php echo stripslashes($tabgroupeliste['lib_grpe']); ?>
		</td>
		<td align="left">
		<?php echo stripslashes($tabgroupeliste['desc_grpe']); ?>
		</td>
        <td><?php $tabdep=$classdepartement->InfoSurDepartement($tabgroupeliste['id_departement']); echo stripslashes($tabdep['lib_departement']); ?></td>
        <td align="center">
            <a class="btn btn-warning" style="text-decoration: none;" title="Modifier un &eacute;l&eacute;ment" onclick="openwindows('groupe_form.php?mod=<?php  echo $tabgroupeliste['id_grpe'] ?>',960,500)" href="#">
			<i class="icon-edit"></i>
			</a>
            &nbsp;
            <a class="btn btn-danger" style="text-decoration: none;" title="Supprimer un &eacute;l&eacute;ment" href="javascript:if(confirm('voulez-vous vraiment supprimer ce groupe du repertoire?')) document.location.href='?display=<?php echo $_SESSION['appmail']['display'];?>&supp=<?php  echo $tabgroupeliste['id_grpe'] ?>';">
			 <i class="icon-remove"></i>
			</a>
            &nbsp;
            <a class="btn btn-primary" style="text-decoration: none;" title="Attribution des echanges" onclick="openwindows('entre_echange.php?mod=<?php  echo $tabgroupeliste['id_grpe'] ?>',960,500)" href="#">
			 <i class="icon-book"></i>
			</a>
            &nbsp;
            <a class="btn btn-primary" style="text-decoration: none;" title="Attribution des droits" onclick="openwindows('dispatch_acces.php?mod=<?php  echo $tabgroupeliste['id_grpe'] ?>',960,500)" href="#">
			 <i class="icon-cog"></i>
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
