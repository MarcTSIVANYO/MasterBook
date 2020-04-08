<?php
     if($_GET['supp']){
        $classdocument->supprimer_document_scategorie($_GET['supp']);
     }
     $groupeliste=$classdocument->liste_document_scategorie(0,'',2);
?>
<div class="row-fluid">
<div class="span12">  
<div class="widgetButtons" style="float: right;">                        
                            <div class="bb"><a data-original-title="Nouveau &eacute;l&eacute;ment" href="javascript:openwindows('document_sous_categorie_form.php',960,500)" class="tipb" title=""><span class="ibw-plus"></span></a></div>
                            <div class="bb"><a data-original-title="Ajouter des Niveaux" href="javascript:openEdit('niveau_form.php',960,500)" class="tipb" title=""><span class="ibw-documents"></span></a></div>
                            <div class="bb"><a data-original-title="Modifier un &eacute;l&eacute;ment" href="javascript:openEdit('document_sous_categorie_form.php',960,500)" class="tipb" title=""><span class="ibw-edit"></span></a></div>
                            <div class="bb"><a data-original-title="Supprimer un &eacute;l&eacute;ment" href="javascript:openDelete('?page=para&display=<?php echo DISPLAY;?>')" class="tipb" title=""><span class="ibw-delete"></span></a></div>
</div>    
<div style="clear: both;"></div>              
                    <div class="head clearfix">
                        <div class="isw-grid"></div>
                        <h1>Liste des titres des documents </h1>                               
                    </div>


<div class="block-fluid table-sorting clearfix">
<table cellpadding="0" cellspacing="0" width="100%" class="table datatables" id="">
    <thead>
    <tr>
        <th>#</th>
		<th >Sous Cat&eacute;gorie</th>
        <th  width="20%">Cat&eacute;gorie</th>
        <th  width="10%">Visible</th>
        <th>Indice</th>
		<th  width="15%">Action</th>
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
 		<input  onchange="checkclass(check<?php  echo $tabgroupeliste['id_scat_doc'] ?>)" id="check<?php  echo $tabgroupeliste['id_scat_doc'] ?>" type="checkbox" name="check" class="checkclass" value="<?php  echo $tabgroupeliste['id_scat_doc'] ?>" />
		</td>
		<td >
		<?php echo stripslashes($tabgroupeliste['intitule_scat_doc']); ?>
		</td>
        <td >
		<?php echo stripslashes($tabgroupeliste['intitule_cat_doc']); ?>
		</td>
        <td >
		<?php if($tabgroupeliste['visible_scat_doc']=='1'){echo "OUI";} else{echo "NON";} ?>
		</td>
        <td >
		<?php echo intval($tabgroupeliste['indice_scat_doc']) ?>
		</td>
        <td>
        &nbsp;
        <?php
	       if(is_file($fichetype_dirdoc.$tabgroupeliste['fichier_scat_doc'])){
        ?>
        <a style="text-decoration: none;" title="Telecharger" target="_blank" href="<?php echo $fichetype_dirdoc.$tabgroupeliste['fichier_scat_doc']?>">
        			<i class="icon-download"></i>
        			</a>
        &nbsp;
        <?php
        	}
         ?>
            <a style="text-decoration: none;" title="Acces aux documents" href="javascript:openwindows('acces_document_sous_categorie.php?mod=<?php  echo $tabgroupeliste['id_scat_doc'] ?>',960,500)">
        			<i class="icon-eye-open"></i>
		    </a>
            &nbsp;
            <a style="text-decoration: none;" title="niveau hierachique" href="javascript:openwindows('niveau_form.php?mod=<?php  echo $tabgroupeliste['id_scat_doc'] ?>',960,500)">
			<i class="icon-book"></i>
			</a>
            &nbsp;
            <a style="text-decoration: none;" title="Modifier un &eacute;l&eacute;ment" href="javascript:openwindows('document_sous_categorie_form.php?mod=<?php  echo $tabgroupeliste['id_scat_doc'] ?>',960,500)">
			<i class="icon-edit"></i>
			</a>
            &nbsp;
            <a style="text-decoration: none;" title="Supprimer un &eacute;l&eacute;ment" href="javascript:if(confirm('voulez-vous vraiment supprimer ce groupe du repertoire?')) document.location.href='?page=<?php echo PAGE;?>&display=<?php echo $_SESSION['appmail']['display'];?>&supp=<?php  echo $tabgroupeliste['id_scat_doc'] ?>';">
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