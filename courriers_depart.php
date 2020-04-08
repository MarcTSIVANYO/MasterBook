<?php
if(intval($_SESSION['appmail']['ANNEE_COURANTE'])==0){
  $mois=MOIS_COURANT;
  $annee=ANNEE_COURANTE;  
}else{
  $mois=$_SESSION['appmail']['MOIS_COURANT'];
  $annee=$_SESSION['appmail']['ANNEE_COURANTE'];  
}

if($_POST['annee_mois']){
  $mois=$_POST['indicemois'];
  $annee=$_POST['indiceannee'];
  $_SESSION['appmail']['MOIS_COURANT']=$mois;
  $_SESSION['appmail']['ANNEE_COURANTE']=$annee;
}
?>
<div class="row-fluid">
<div class="span12">
<form id="myForm" name="formulaire" action="" method="post" onsubmit="return valideform();">
        <table   style="width: 50%;">
        <tr>
          <td style="width: 40%;">
          <select name="indicemois" size="1">
          <?php $indicemois=1; while($indicemois<=12){ $selected=''; if($mois==$indicemois) $selected='selected=""'?>
	              <option  <?php echo $selected?> value="<?php echo $indicemois?>"><?php echo $arraymois[$indicemois-1]?></option>
          <?php $indicemois++; }?>
          </select>
          </td>
          <td>
          <select name="indiceannee" size="1">
          <?php $indiceannee=2014; while($indiceannee<=2050){$selected=''; if($annee==$indiceannee) $selected='selected=""' ?>
	              <option <?php echo $selected?> value="<?php echo $indiceannee?>"><?php echo $indiceannee?></option>
          <?php $indiceannee++; }?>
          </select>
          </td>
          <td><input style="margin-top: -15px;" class="btn" type="submit" name="annee_mois"  value="Valider"/></td>
        </tr>
       </table>
</form>
</div>
</div>
<div style="clear: both;"></div>
<div class="row-fluid">
<div class="span12">
<div class="widgetButtons" style="float: right;">                        
      <div class="bb"><a data-original-title="Nouveau &eacute;l&eacute;ment" href="javascript:openwindows('courriers_depart_form.php?mois=<?php echo $mois ?>&annee=<?php echo $annee ?>',960,500)" class="tipb" title="Ajouter un courrier pour ce mois de : <?php echo $arraymois[$mois-1]."  ".$annee?> "><span class="ibw-plus"></span></a></div> 
</div>    
<div style="clear: both;"></div>              
    <div class="head clearfix">
        <div class="isw-grid"></div>
        <h1>Liste des courriers departs </h1>
    </div>


<div class="block-fluid table-sorting clearfix">

<?php
     if($_GET['supp']){
        $classdepart->Supprimer($_GET['supp']);
     }
     $sql="select * from courrier_depart where month(date_depart)='$mois' and year(date_depart)='$annee' and visible='1' order by ordre_depart DESC";
     $departliste=$classdepart->RequeteSql($sql);
   ?> 
<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="editable">
    <thead>
    <tr>
        <th align="center" width="3%">#</th>
        <th align="center" width="5%">Dates</th>
        	<th align="center" width="10%">Ordre</th>
		<th align="center" width="20%">Titre</th>
		<th align="center" width="20%">Objets</th>
        <th align="center" width="5%">Nbre pieces</th>
        <th align="center" width="15%">Recepteur</th>
        <th align="center" width="5%">Fichier</th>
		<th align="center" width="15%">Action</th>
    </tr>
    </thead>
    <tbody>
<?php
foreach($departliste as $tabdepartliste)
{
						$ligne++;
?>
	<tr bgcolor="<?php echo $bgcolor ?>">
    <td >
 		<input  onchange="checkclass(check<?php  echo $tabdepartliste['id_depart'] ?>)" id="check<?php  echo $tabdepartliste['id_depart'] ?>" type="checkbox" name="check" class="checkclass" value="<?php  echo $tabdepartliste['id_depart'] ?>" />
		</td>
		<td align="left">
		<?php echo date('d/m/Y',strtotime($tabdepartliste['date_depart'])) ;?>
		</td>
        <td align="left">
		<?php echo $classdepart->RetunrCodeDepart($tabdepartliste['ordre_depart'])?>
		</td>
		<td align="left">
		<?php echo stripslashes($tabdepartliste['noms_depart']); ?>
		</td>
        <td align="left">
		<?php echo stripslashes($tabdepartliste['objets_depart']); ?>
		</td>
        <td align="left">
		<?php echo stripslashes($tabdepartliste['nbpieces_depart']); ?>
		</td>
    <td align="left">
		  <?php echo stripslashes($tabdepartliste['recepteur_depart']); ?>
		</td>
    <td align="left"> 
       <a target="_blank" class="btn btn-default" style="text-decoration: none;" title="T&eacute;l&eacute;charger"  href="<?php echo UPLOAD_COURRIERS_SEND.stripslashes($tabdepartliste['fichier_depart']); ?>">
      <i class="isw-download"></i>
      </a>
    </td>
      <td align="center">
            <a class="btn btn-warning" style="text-decoration: none;" title="Modifier un &eacute;l&eacute;ment" onclick="openwindows('courriers_depart_form.php?mois=<?php echo $mois ?>&annee=<?php echo $annee ?>&mod=<?php  echo $tabdepartliste['id_depart'] ?>',960,500)" href="#">
			<i class="isw-edit"></i>
			</a>
            &nbsp;
            <a class="btn btn-danger" style="text-decoration: none;" title="Supprimer un &eacute;l&eacute;ment" href="javascript:if(confirm('voulez-vous vraiment supprimer ce courrier depart du repertoire?')) document.location.href='?display=<?php echo $_SESSION['appmail']['display'];?>&supp=<?php  echo $tabdepartliste['id_depart'] ?>';">
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