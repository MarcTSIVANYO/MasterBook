<?php
include('config.php');
include('header.php');
$mod="";
$compteur_arrivee=$classarrivee->Last_Compteur_Mois($mois,$annee)+1;

if($_POST["noms_arrivee"] && sans_espace($_POST["noms_arrivee"])!=""){
          $SQLfichier_name='';
            $fichier =$_FILES["fichier_arrivee"];       
            if($fichier['size']>0)
            { 
              $fichier_name = $fichier['name'];
              list($name,$extension) = explode(".",$fichier_name); 
              $type = $fichier['type'];
                    $fichier_name=$compteur_depart.time().".".$extension;                  
              $upload_dir = UPLOAD_COURRIERS_RECU; 
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
            $option=array("noms_arrivee"=>addslashes($_POST['noms_arrivee']),
              "objets_arrivee"=>addslashes($_POST['objets_arrivee']),
              "datesurlalettre_arrivee"=>frenchdate_to_datesql($_POST['datesurlalettre_arrivee']),
              "numsurlalettre_arrivee"=>addslashes($_POST['numsurlalettre_arrivee']),
              "ordre_arrivee"=>addslashes($_POST['ordre_arrivee']),
              "fichier_arrivee"=>$SQLfichier_name,
              "date_arrivee"=>frenchdate_to_datesql($_POST['date_arrivee']),
              "enregistreur"=>$_SESSION['appmail']['id_pers'],
              "id_arrivee"=>addslashes($_POST['mod'])
              );
    if($_POST['mod']){
          $result=$classarrivee->modification($option);  
    }else{
         $result=$classarrivee->insertion($option);
         echo '<script type="text/javascript">
                opener.location.reload();
                self.close()
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
        $tab_mod=$classarrivee->InfoSur($mod);
        $compteur_arrivee=$tab_mod['ordre_arrivee'];
}

/**
 * @author NepsterJay
 * @copyright 2014
 */
?>
<div class="modal" style="width: 99%;left: 0;right: 0px;top: 0%;margin: 0 auto;height: 550px;">
<div class="modal-header"><h3>Enregistrement courrier arriv&eacute;</h3> 
</div>
<div class="modal-body">
<div style="margin: 0 auto;width: 50%;text-align: center;"><?php echo $error?></div>
<form id="myForm" name="formulaire" action="" enctype="multipart/form-data" method="post" onsubmit="return validform();">
        <table class="table"   style="width: 100%;">
        <?php 
              if($notification){
                echo"<caption>".$notification."</caption>";
              } 
        ?>
        <tr>
          <td><input name="mod" readonly="" type="hidden" value="<?php echo $mod; ?>" /></td>
          <td><input readonly="" type="hidden" name="ordre_arrivee" value="<?php echo $compteur_arrivee ; ?>" /> Code : <?php echo $classarrivee->RetunrCodearrivee($compteur_arrivee) ; ?></td>
        </tr>
        <tr>
          <td valign="top" style="width: 30%; text-align: right; ">Date Arriv&eacute;e : <b style="color: red;">*</b></td>
          <td><input class="datepicker" readonly="" style="background: transparent;" type="text" name="date_arrivee" value="<?php  if($mod){ echo datesql_to_frenchdate($tab_mod['date_arrivee']);}else{ echo date("d/m/Y");} ?>" /></td>
        </tr>
        <tr>
          <td valign="top" style="width: 30%; text-align: right; ">Date du courrier : <b style="color: red;">*</b></td>
          <td>
          <div class="span8">
             <input class="datepicker" readonly=""  type="text" name="datesurlalettre_arrivee" value="<?php if($mod){ echo datesql_to_frenchdate($tab_mod['datesurlalettre_arrivee']);}else{ echo date("d/m/Y");} ?>" /></td>
          </div>
        </tr>
         <tr>
          <td valign="top" style="width: 30%; text-align: right; ">Num&eacute;ro du courrier : <b style="color: red;">*</b></td>
          <td><input  style="background: transparent;" type="text" name="numsurlalettre_arrivee" value="<?php echo $tab_mod['numsurlalettre_arrivee']; ?>" /></td>
        </tr>
            <tr>
                <td valign="top" style="width: 30%; text-align: right; "> Titre: <b style="color: red;">*</b></td>
            	<td valign="top" ><input data='required'  value="<?php echo $tab_mod['noms_arrivee']; ?>" style="width:100%" type="text" id="noms_arrivee" name="noms_arrivee"  /></td>
            </tr>
            <tr>
                <td valign="top" style="width: 30%; text-align: right; "> Objet : </td>
            	<td valign="top" ><input   value="<?php echo $tab_mod['objets_arrivee']; ?>" style="width:100%" type="text" id="objets_arrivee" name="objets_arrivee"  /></td>
            </tr>
            <tr>
                <td valign="top" style="width: 150px; text-align: right; "> Fichier : </td>
              <td valign="top" ><input   value="<?php echo $tab_mod['fichier_arrivee']; ?>" style="width:100%" type="file" id="fichier_arrivee" name="fichier_arrivee"  /></td>
            </tr>
        </table>
    </form>

</div>
<div class="modal-footer">
            <button onclick="document.getElementById('myForm').submit()" class="btn btn-primary" >Valider</button> 
            <button class="btn" onclick="closewindows()">Fermer</button>            
</div>
<div style="clear: both;"></div>
</div>
<script type="text/javascript">
<!--
	
-->
</script>