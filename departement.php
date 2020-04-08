<?php
     if($_GET['supp']){
        $classdepartement->Supprimer($_GET['supp']);
     }
     $departementliste=$classdepartement->liste(0,'',1);
   ?> 
<div class="row-fluid">
<div class="span12">  
<div class="widgetButtons" style="float: right;">                        
                            <div class="bb"><a data-original-title="Nouveau &eacute;l&eacute;ment" href="javascript:openwindows('departement_form.php',960,500)" class="tipb" title=""><span class="ibw-plus"></span></a></div> 
</div>    
<div style="clear: both;"></div>              
                    <div class="head clearfix">
                        <div class="isw-grid"></div>
                        <h1>Liste des d&eacute;partement </h1>                               
                    </div>


<div class="block-fluid table-sorting clearfix">
<table cellpadding="0" cellspacing="0" width="100%" class="table datatables" id="">
    <thead>
    <tr>
        <th width="5%">#</th>
		<th align="center" width="30%">Nom</th>
		<th align="center" width="">Description</th>
		<th align="center" width="20%">Action</th>
    </tr>
    </thead>
    <tbody>
<?php
foreach($departementliste as $tabdepartementliste)
{
						$ligne++;
?>
	<tr bgcolor="<?php echo $bgcolor ?>">
       <td >
 		<input  onchange="checkclass(check<?php  echo $tabdepartementliste['id_departement'] ?>)" id="check<?php  echo $tabdepartementliste['id_departement'] ?>" type="checkbox" name="check" class="checkclass" value="<?php  echo $tabdepartementliste['id_departement'] ?>" />
		</td>
		<td align="left">
		<?php echo stripslashes($tabdepartementliste['lib_departement']); ?>
		</td>
		<td align="left">
		<?php echo stripslashes($tabdepartementliste['desc_departement']); ?>
		</td>
        <td align="center">
            <a class="btn btn-warning" style="text-decoration: none;" title="Modifier un &eacute;l&eacute;ment" onclick="openwindows('departement_form.php?mod=<?php  echo $tabdepartementliste['id_departement'] ?>',960,500)" href="#">
			<i class="icon-edit"></i>
			</a>
            &nbsp;
            <a class="btn btn-danger" style="text-decoration: none;" title="Supprimer un &eacute;l&eacute;ment" href="javascript:if(confirm('voulez-vous vraiment supprimer ce departement du repertoire?')) document.location.href='?display=<?php echo $_SESSION['appmail']['display'];?>&supp=<?php  echo $tabdepartementliste['id_departement'] ?>';">
			<i class="icon-remove"></i>
			</a>
            <!--
&nbsp;
            <a style="text-decoration: none;" title="Modifier un &eacute;l&eacute;ment" onclick="openwindows('entre_echange.php?mod=<?php  echo $tabdepartementliste['id_departement'] ?>',960,500)" href="#">
			<i class="icon-book"></i>
			</a>
            &nbsp;
            <a style="text-decoration: none;" title="Modifier un &eacute;l&eacute;ment" onclick="openwindows('dispatch_acces.php?mod=<?php  echo $tabdepartementliste['id_departement'] ?>',960,500)" href="#">
			<i class="icon-desktop"></i>
			</a>
-->
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