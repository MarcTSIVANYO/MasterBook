<?php
include('config.php');
include('header.php');
$annee=$_GET['annee'];
$mois=$_GET['mois'];
$nbrjours=cal_days_in_month(CAL_GREGORIAN, $mois, $annee);
$premier="$annee-$mois-01";
$dernier="$annee-$mois-$nbrjours";
$mod="";
$compteur_depart=$classdepart->Last_Compteur_Mois($mois,$annee)+1;

if($_POST["noms_depart"] && sans_espace($_POST["noms_depart"])!=""){

      $SQLfichier_name='';
            $fichier =$_FILES["fichier_depart"];       
            if($fichier['size']>0)
            { 
              $fichier_name = $fichier['name'];
              list($name,$extension) = explode(".",$fichier_name); 
              $type = $fichier['type'];
                    $fichier_name=$compteur_depart.time().".".$extension;                  
              $upload_dir = UPLOAD_COURRIERS_SEND; 
              if(move_uploaded_file($fichier['tmp_name'], $upload_dir.$fichier_name))
              {
                $reussie= true;
                        $SQLfichier_name=$fichier_name; 
              }else{
                echo "<p>";
                        echo "Erreur de chargement du fichier";
                        echo "</p>";
                $fichier_name ='';
              }
            }


$option=array("noms_depart"=>addslashes($_POST['noms_depart']),
              "objets_depart"=>addslashes($_POST['objets_depart']),
              "nbpieces_depart"=>addslashes($_POST['nbpieces_depart']),
              "recepteur_depart"=>addslashes($_POST['recepteur_depart']),
              "ordre_depart"=>addslashes($_POST['ordre_depart']),
              "date_depart"=>frenchdate_to_datesql($_POST['date_depart']),
              "fichier_depart"=>$SQLfichier_name,
              "enregistreur"=>$_SESSION['appmail']['id_pers'],
              "id_depart"=>addslashes($_POST['mod'])
              );
        if($_POST['mod']){
              $result=$classdepart->modification($option);  
        }else{
         $result=$classdepart->insertion($option);
         echo '<script type="text/javascript">
                //opener.location.reload();
                //self.close()
                closewindows2("pagecourrier","courriers_depart")
                </script>'; 
               
    }

    if($result){
        $notification="<div class='alert alert-info'>                
            <h4>Success!</h4>
            Op&eacute;ration &eacute;ffectu&eacute;e avec succ&egrave;s.
        </div>";
    }else{
        $notification="<div class='alert alert-danger'>                
                    <h4>Erreur!</h4>
                    Aucune Op&eacute;ration  &eacute;ffectu&eacute;e.
                </div>";
    }
 
}

if(count($_GET['mod']) && sans_espace($_GET['mod'])!=""){
        $mod=$_GET['mod'];
        $tab_mod=$classdepart->InfoSur($mod);
        $compteur_depart=$tab_mod['ordre_depart'];
}
 
?>
<div class="modal" style="width: 99%;left: 0;right: 0px;top: 0%;margin: 0 auto;height: 550px;">
<div class="modal-header">
  <h3>Enregistrement des courriers envoyés</h3> 
</div>
<div class="modal-body">
<div style="margin: 0 auto;width: 50%; text-align: center;"><?php echo $error?></div>
<form id="myForm" name="formulaire" action="" enctype="multipart/form-data" method="post" onsubmit="return validform();">
        <table class="table"   style="width: 100%;">
        <?php 
              if($notification){
                echo"<caption>".$notification."</caption>";
              } 
        ?>
        <tr>
          <td><input name="mod" readonly="" type="hidden" <?php  if(!($_GET['mod'])) echo('disabled=""') ?> value="<?php echo $mod; ?>" /></td>
          <td>
            <input readonly="" type="hidden" name="ordre_depart" value="<?php echo $compteur_depart ; ?>" /> Code :<?php echo $classdepart->RetunrCodeDepart($compteur_depart) ; ?>
          </td>
        </tr>
        <tr>
          <td valign="top" style="width: 150px; text-align: right; ">Date : <b style="color: red;">*</b></td>
          <td valign="top"> 
              <input  style="width: 100%; " class="datepicker" type="text" name="date_depart" value="<?php if($mod){ echo datesql_to_frenchdate($tab_mod['date_depart']);}else{ echo date("d/m/Y");}; ?>" />
             </td>
         </tr>
            <tr>
                <td valign="top" style="width: 150px; text-align: right; "> Titre: <b style="color: red;">*</b></td>
            	<td valign="top" ><input data='required'  value="<?php echo $tab_mod['noms_depart']; ?>" style="width:100%" type="text" id="noms_depart" name="noms_depart"  /></td>
            </tr>
            <tr>
                <td valign="top" style="width: 150px; text-align: right; "> Objet : </td>
            	<td valign="top" ><input   value="<?php echo $tab_mod['objets_depart']; ?>" style="width:100%" type="text" id="objets_depart" name="objets_depart"  /></td>
            </tr>
            <tr>
                <td valign="top" style="width: 150px; text-align: right; "> Nbre de Pieces : </td>
            	<td valign="top" ><input   value="<?php echo $tab_mod['nbpieces_depart']; ?>" style="width:100%" type="text" id="nbpieces_depart" name="nbpieces_depart"  /></td>
            </tr>
            <tr>
                <td valign="top" style="width: 150px; text-align: right; "> Recepteur : </td>
            	<td valign="top" ><input   value="<?php echo $tab_mod['recepteur_depart']; ?>" style="width:100%" type="text" id="recepteur_depart" name="recepteur_depart"  /></td>
            </tr>
             <tr>
                <td valign="top" style="width: 150px; text-align: right; "> Fichier : </td>
              <td valign="top" ><input   value="<?php echo $tab_mod['fichier_depart']; ?>" style="width:100%" type="file" id="fichier_depart" name="fichier_depart"  /></td>
            </tr>
            <</table>
    </form>

</div>
<div class="modal-footer">
            <button onclick="document.getElementById('myForm').submit()" class="btn btn-primary" >Valider</button> 
            <button class="btn" onclick="closewindows2('pagecourrier','courriers_depart')">Fermer</button>            
</div>
<div style="clear: both;"></div>
</div>
<script type="text/javascript">
<!--
	
-->
</script>
<script type="text/javascript">
jQuery('.datepickerd').datepicker({
 timepicker:false,
 formatDate:'Y-m-d',
 format:'Y-m-d',
 minDate:'<?php echo $premier ?>',//yesterday is minimum date(for today use 0 or -1970/01/01)
 maxDate:'<?php echo $dernier ?>'//tommorow is maximum date calendar
});
</script>