<?php
 
$typedocument=$_GET['typedocument'];
if($_GET['pagedoc']){
    $date_doc=date('d/m/Y');
    $type_doc=$_GET['pagedoc'];
    $auteur_doc_transfert=$_SESSION['appmail']['me'];
    $me=$_SESSION['appmail']['me'];
    $myniveau=$classdocument->Mon_niveau_document_scategorie($type_doc,$_SESSION['appmail']['me']);
    $indice_niveau=$classdocument->InfoSur_niveau($myniveau);
    if($_POST['intitule_doc']){
        $fichier = $_FILES['fichier_doc'];
        if($fichier['error']==UPLOAD_ERR_OK){
           $fichier_name = $fichier['name'];
           list($name,$extension) = explode(".",$fichier_name);
           $name = time().'_'.$_SESSION['appmail']['id_pers'].'_'."$type_doc.$extension";
           if(!is_dir($upload_dirdoc)) mkdir($upload_dirdoc);
           if(strtoupper($extension)=='PDF'){
               if(move_uploaded_file($fichier['tmp_name'], $upload_dirdoc.$name)){
                $default =array("intitule_doc"=>addslashes($_POST['intitule_doc']),
                         "date_doc"=>frenchdate_to_datesql($_POST['date_doc']),
                         "type_doc"=>$type_doc,
                         "fichier_doc"=>$upload_dirdoc.$name,
                         "id_doc"=>""
                            );
                  $classdocument->insertion_document($default,$_POST['pourqui']);
                  //foreach($_POST['pourqui'] as $val)  echo $val.'-';
                  //print_r($_POST['pourqui']);     
               }
           }
        }
      }
  $thisdocument_scategorie=$classdocument->InfoSur_document_scategorie($_GET['pagedoc']); 
  $sqlinbox=$classdocument->liste_niveau_thisdocument_scategorie($_GET['pagedoc'],0,'');
?>
<div style="clear: both;height: 15px;"></div>
<div class="row-fluid">
<div class="span12">
<div class="head clearfix">
                        <div class="isw-grid"></div>
                        <h1><?php echo stripslashes($thisdocument_scategorie['intitule_scat_doc']) ?> </h1>
                        <?php
	                            if(is_file($fichetype_dirdoc.$thisdocument_scategorie['fichier_scat_doc']))
                                {
                        ?>
                        <ul class="buttons">
                            <li><a data-original-title="T&eacute;l&eacute;charger le document" target="_blank" href="<?php echo $fichetype_dirdoc.$thisdocument_scategorie['fichier_scat_doc']?>"  class="isw-download tipb"></a></li>
                        </ul>
                        <?php }?>                               
</div>
<div class="block-fluid table-sorting clearfix">
<form id="myForm" enctype="multipart/form-data" name="formulaire" action="?page=doc&display=<?php echo $display?>&typedocument=<?php echo $typedocument?>&pagedoc=<?php echo $_GET['pagedoc']?>" method="post" onsubmit="return validform();">
<div class="block-fluid">
<table   class="table" style="width: 100%;">
            <tr>
               <td valign="top" style="text-align: right; ">Date : <b style="color: red;">*</b></td>	
               <td><input class="datepicker" readonly=""  type="text" name="date_doc" value="<?php echo $date_doc; ?>" /></td>
            </tr>
            <tr>
                <td valign="top" style=" text-align: right;">Intitul&eacute; : <b style="color: red;">*</b></td>
            	<td valign="top" ><input saisie=""  value="<?php echo $intitule_doc; ?>" class="span12" type="text" id="intitule_doc" name="intitule_doc"  /></td>
            </tr>
            <tr>
            <td valign="top" style="text-align: right;vertical-align:top;">Fichier: <b style="color: red;">*</b></td>
           	<td>
            <input type="file" name="fichier_doc" /> <b style="color: red;">(uniquement .PDF)</b>
            </td>	
            </tr>
            <tr>
            <td valign="top" style="text-align: right;vertical-align:top;">Pour : <b style="color: red;">*</b></td>
           	<td>
            <select name="pourqui[]"  multiple  data-placeholder="Selectionner un niveau hierachique" class="selectinput" style="width: auto"  >
                           
                           <option value=""></option>
            												<?php
                                                             foreach($sqlinbox as $tabsqlinbox){
                                                                if($myniveau!=$tabsqlinbox['id_niveau_doc']){
                                                                echo '<optgroup label="'.stripslashes($tabsqlinbox['niveau_doc']).'">';
                                                                    $sql_query=$classdocument->liste_person_acces_niveau_thisdocument_scategorie($tabsqlinbox['id_niveau_doc']);
                                                                     foreach($sql_query as $tab_pers){
                                                                	    $option_pers.='<option  value="'.$tab_pers['id_pers'].'">'.$tab_pers['nom'].'</option>';
                                                                    }
                                                                    echo $option_pers;
                                                                echo '</optgroup>';
                                                                }
                                                              }
                                                                
                                                            ?>
            											</select>
                           
             
            </td>	
            </tr>
            <tr><td style="height: 10px;" colspan="2"></td></tr>
            <tr><td ></td></td><td ><input class="btn btn-primary" type="submit"  name="news_go" value="Valider" /></td></tr>
        </table>
</div>
</form>
</div>
</div>
</div>
<div class="dr"><span></span></div>
<div class="widgetButtons" style="float: right;">                        
                            <div class="bb"><a data-original-title="Nouveau &eacute;l&eacute;ment" href="?page=doc&display=<?php echo $display?>&typedocument=<?php echo $typedocument?>&pagedoc=<?php echo $_GET['pagedoc']?>" class="tipb" title="RAFRAICHIR LA PAGE"><span class="ibw-refresh"></span></a></div>
</div>
<div style="clear: both;"></div>
<div class="head clearfix">
                        <div class="isw-grid"></div>
                        <h1>FICHES </h1>
                                               
</div>
<div class="block-fluid table-sorting clearfix">
<?php
     if($_GET['supp']){
        $classdocument->Supprimer_document($_GET['supp']);
     }
     
     $document_type=$classdocument->liste_document_enyoye_par($auteur_doc_transfert,$type_doc,0,'ORDER BY lastmod DESC');
     $document_type1=$classdocument->liste_document_recu_par($me,$type_doc,0,'ORDER BY d.lastmod DESC');
   ?> 
<table cellpadding="0" cellspacing="0" width="100%" class="table datatables" id="">
    <thead>
    <tr>
        <th align="left" width="20%"></th>
		<th align="left">Nom</th>
        <th align="left" width="15%">Date</th>
        <th align="left" width="15%">Action</th>
    </tr>
    </thead>
    <tbody>
<?php
foreach($document_type as $tabdocument_type)
{
						$ligne++;
      $colortext='';
      //if(strlen($tabdocument_type['suggestion_doc'])>0) $colortext='style="color:red"';
?>
	<tr>
    <td align="left">
		<?php echo date('d/m/Y H:i:s',stripslashes($tabdocument_type['lastmod'])) ; ?>
		</td>
		<td align="left">
		<?php echo stripslashes($tabdocument_type['intitule_doc']); ?>
		</td>
        <td align="left">
		<?php echo datesql_to_frenchdate($tabdocument_type['date_doc']); ?>
		</td>
         <td align="center">
         <?php if($classdocument->nbre_suggestions_de_ce_document_pour($tabdocument_type['id_doc'],$me)){?>
         <a style="text-decoration: none;" title="Les Suggestions"  href="javascript:openwindows('thisdocumentsuggestion.php?pagedoc=<?php echo $_GET['pagedoc']?>&id_doc=<?php  echo $tabdocument_type['id_doc'] ?>',960,500)">
        			<i class="icon-book"></i>
        			</a>
            &nbsp;
         <?php }?>
           <a style="text-decoration: none;" title="Recharger"  href="javascript:openwindows('recharger_document.php?pagedoc=<?php echo $_GET['pagedoc']?>&id_doc=<?php  echo $tabdocument_type['id_doc'] ?>',960,500)">
        			<i class="icon-desktop"></i>
        			</a>
            &nbsp;       
            <a style="text-decoration: none;" title="Telecharger" target="_blank" href="<?php echo $tabdocument_type['fichier_doc']?>">
			<i class="icon-download"></i>
			</a>
            &nbsp;
            <a style="text-decoration: none;" title="Supprimer" href="javascript:if(confirm('voulez-vous vraiment supprimer ce document?')) document.location.href='?display=<?php echo $display?>&pagedoc=<?php echo $_GET['pagedoc']?>&supp=<?php  echo $tabdocument_type['id_doc'] ?>';">
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
<div class="dr"><span></span></div>
<div class="head clearfix">
                        <div class="isw-grid"></div>
                                               
</div>
<div class="block-fluid table-sorting clearfix">
<table cellpadding="0" cellspacing="0" width="100%" class="table datatables" id="">
    <thead>
    <tr>
        <th align="left" width="10%"></th>
		<th align="left">Nom</th>
        <th align="left" width="10%">Date</th>
        <th align="left" width="20%">Auteur</th>
		<th align="center" width="15%">Action</th>
    </tr>
    </thead>
    <tbody>
<?php
foreach($document_type1 as $tabdocument_type1)
{
						$ligne++;
      $colortext='';
      //if(strlen($tabdocument_type1['suggestion_doc'])>0) $colortext='style="color:red"';
?>
	<tr bgcolor="<?php echo $bgcolor ?>">
    <td align="left" <?php echo $colortext ?>>
		<?php echo date('d/m/Y H:i:s',stripslashes($tabdocument_type1['lastmod'])) ; ?>
		</td>
		<td align="left" <?php echo $colortext ?>>
		<?php echo stripslashes($tabdocument_type1['intitule_doc']); ?>
		</td>
        <td align="left">
		<?php echo datesql_to_frenchdate($tabdocument_type1['date_doc']); ?>
		</td>
        <td align="left">
		<?php 
        $perstab=$classperson->InfoSur($tabdocument_type1['parqui']);
        
        echo stripslashes($perstab['nom']); ?>
		</td>
        <td align="center">
                
           
           <a style="text-decoration: none;" title="Transferer" href="javascript:if(confirm('voulez-vous vraiment transferer ce document?')) openwindows('transfert_document.php?pagedoc=<?php echo $_GET['pagedoc']?>&id_doc=<?php  echo $tabdocument_type1['id_doc'] ?>',960,500)">
        			<i class="icon-desktop"></i>
        			</a>
           &nbsp;       
            <a style="text-decoration: none;" title="Telecharger" target="_blank" href="<?php echo $tabdocument_type1['fichier_doc']?>">
			<i class="icon-download"></i>
			</a>
            &nbsp; 
           <a style="text-decoration: none;" title="Suggestion"  href="javascript:openwindows('suggestion_doc_form.php?id_transfert=<?php  echo $tabdocument_type1['id_transfert'] ?>',960,500)">
        			<i class="icon-book"></i>
        			</a>
        </td>
	</tr>
<?php
}//Fin while
?>
</tbody>
</table>

</div>
<?php
	}
?>