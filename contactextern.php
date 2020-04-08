 
<?php
     if($_GET['supp']){
        $classpersoncontact->Supprimer($_GET['supp']);
     }
     $personliste=$classpersoncontact->liste(0,'',1);
?> 
<div class="row-fluid">
<div class="span12">  
<div class="widgetButtons" style="float: right;">                        
                            <div class="bb"><a data-original-title="Nouveau &eacute;l&eacute;ment" href="javascript:openwindows('contactextern_form.php',960,500)" class="tipb" title=""><span class="ibw-plus"></span></a></div>
                             
</div>    
<div style="clear: both;"></div>              
                    <div class="head clearfix">
                        <div class="isw-grid"></div>
                        <h1>Liste des contacts </h1>                               
                    </div>


<div class="block-fluid table-sorting clearfix">
<table cellpadding="0" cellspacing="0" width="100%" class="table datatables" id="">
    <thead>
    <tr>
         <th align="left" width="5%">#</th>
		<th align="center" width="20%">Nom</th>
        <th align="center" width="15%">Mail</th>
        <th align="center" width="15%">Tel/Cel</th>
		<th align="center" width="20%">Adresse</th>
		<th align="center" width="10%">Groupe</th>
		<th align="center" width="15%">Action</th>
    </tr>
    </thead>
    <tbody>
<?php
foreach($personliste as $tabpersonliste)
{
						$ligne++;
?>
		<tr> 
       <td >
 		<input  onchange="checkclass(check<?php  echo $tabpersonliste['id_pers'] ?>)" id="check<?php  echo $tabpersonliste['id_pers'] ?>" type="checkbox" name="check" class="checkclass" value="<?php  echo $tabpersonliste['id_pers'] ?>" />
		</td>
		<td align="left">
		<?php echo stripslashes($tabpersonliste['nom']); ?>
		</td>
		<td align="center" style="font-style: italic;font-weight: lighter; color: blue;">
		<?php echo stripslashes($tabpersonliste['email']); ?>
		</td>
        <td align="left">
         Cel : &nbsp;<?php echo stripslashes($tabpersonliste['cel']); ?>
		Tel : &nbsp;<?php echo stripslashes($res1->tel); ?>
		</td>
		<td align="left">
		<?php echo stripslashes($tabpersonliste['adresse']); ?>
		</td>
		<td align="center">
		<?php echo $classgroupecontact->libelle_groupecontact($tabpersonliste['id_grpe']); ?>
		</td>
        <td align="center">
            <a  class="btn btn-warning" style="text-decoration: none;" title="Modifier un &eacute;l&eacute;ment" onclick="openwindows('contactextern_form.php?mod=<?php  echo $tabpersonliste['id_pers'] ?>',960,600)" href="#">
			<i class="icon-edit"></i>
			</a>
            &nbsp;
            <a class="btn btn-danger" style="text-decoration: none;" title="Supprimer un &eacute;l&eacute;ment" href="javascript:if(confirm('voulez-vous vraiment supprimer cette personne du repertoire?')) document.location.href='?page=grpcontact&display=<?php echo $_SESSION['appmail']['display'];?>&supp=<?php  echo $tabpersonliste['id_pers'] ?>';">
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
