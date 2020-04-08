<?php
     if($_GET['supp']){
        $classdocument->supprimer_type_document($_GET['supp']);
     }
     $groupeliste=$classdocument->liste_type_document(0,'',2);
   ?> 
<div class="row-fluid">
<div class="span12">  
<div class="widgetButtons" style="float: right;">                        
                            <div class="bb"><a data-original-title="Nouveau &eacute;l&eacute;ment" href="javascript:openwindows('document_type_form.php',960,500)" class="tipb" title=""><span class="ibw-plus"></span></a></div>
                             <div class="bb"><a data-original-title="Modifier un &eacute;l&eacute;ment" href="javascript:openEdit('document_type_form.php',960,500)" class="tipb" title=""><span class="ibw-edit"></span></a></div>
                            <div class="bb"><a data-original-title="Supprimer un &eacute;l&eacute;ment" href="javascript:openDelete('?page=para&display=<?php echo DISPLAY;?>')" class="tipb" title=""><span class="ibw-delete"></span></a></div>
</div>    
<div style="clear: both;"></div>              
                    <div class="head clearfix">
                        <div class="isw-grid"></div>
                        <h1>Liste des categiories de documents </h1>                               
                    </div>


<div class="block-fluid table-sorting clearfix">
<table cellpadding="0" cellspacing="0" width="100%" class="table datatables" id="">
    <thead>
    <tr>
         <th align="left" width="3%">#</th>
        <th align="left" width="20%">Type</th>
        <th align="left" width="10%">Visible?</th>
        <th align="left" width="10%">Indice</th>
		<th align="center" width="10%">Action</th>
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
 		<input  onchange="checkclass(check<?php  echo $tabgroupeliste['id_type_doc'] ?>)" id="check<?php  echo $tabgroupeliste['id_type_doc'] ?>" type="checkbox" name="check" class="checkclass" value="<?php  echo $tabgroupeliste['id_type_doc'] ?>" />
		</td>
        <td align="left">
		<?php echo stripslashes($tabgroupeliste['intitule_type_doc']); ?>
		</td>
        <td align="left">
		<?php if($tabgroupeliste['visible_type_doc']=='1'){echo "OUI";} else{echo "NON";} ?>
		</td>
        <td align="left">
		<?php echo intval($tabgroupeliste['indice_type_doc']) ?>
		</td>
        <td align="center">
            <a style="text-decoration: none;" title="Modifier un &eacute;l&eacute;ment" onclick="openwindows('document_type_form.php?mod=<?php  echo $tabgroupeliste['id_type_doc'] ?>',960,500)" href="#">
			<i class="icon-edit"></i>
			</a>
            &nbsp;
            <a style="text-decoration: none;" title="Supprimer un &eacute;l&eacute;ment" href="javascript:if(confirm('voulez-vous vraiment supprimer ce groupe du repertoire?')) document.location.href='?display=<?php echo $_SESSION['appmail']['display'];?>&supp=<?php  echo $tabgroupeliste['id_type_doc'] ?>';">
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