<?php
include("./config.php");
include('header.php');
$mod="";
if($_POST["intitule_type_doc"] && sans_espace($_POST["intitule_type_doc"])!=""){
$option=array("intitule_type_doc"=>addslashes($_POST['intitule_type_doc']),
               "indice_type_doc"=>addslashes($_POST['indice_type_doc']),
               "visible_type_doc"=>addslashes($_POST['visible_type_doc']),
              "id_type_doc"=>$_POST['mod']
              );
    if($_POST['mod']){
          $result=$classdocument->modification_type_document($option);  
          echo '<script type="text/javascript">
                opener.location.reload();
                </script>';
         if($result) $error="<b style='color:green;' >Modification r&eacute;ussie</b>";
    }else{
          $result=$classdocument->insertion_type_document($option); 
          echo '<script type="text/javascript">
                opener.location.reload();
                self.close()
                </script>';
    }
   //unset($_POST); 
   
    
}

if(count($_GET['mod']) && sans_espace($_GET['mod'])!=""){
        $mod=$_GET['mod'];
        $tab_mod=$classdocument->InfoSur_type_document($mod);
        $mod=$tab_mod['id_type_doc'];
        $intitule_type_doc=stripslashes($tab_mod['intitule_type_doc']);
        $indice_type_doc=$tab_mod['indice_type_doc'];
        $visible_type_doc=$tab_mod['visible_type_doc'];
}

?>
<style>
*{
    font-size: 12px;
}
input[type=text]{
    height: 25px;
}
</style>
<div class="modal" style="width: 99%;left: 0;right: 0px;top: 0%;margin: 0 auto;height:550px;">
<div class="modal-header">TYPE DE DOCUMENTS</div>
<div class="modal-body">
<form id="myForm" name="formulaire" action="" method="post" onsubmit="return validform();">
<div style="margin: 0 auto;width: 50%;text-align: center;"><?php echo $error?></div>
<table class="table">
        <tr><td></td><td><input name="mod" readonly="" type="text" <?php  if(!($_GET['mod'])) echo('disabled=""') ?> value="<?php echo $mod; ?>" /></td></tr>
            <tr>
                <td valign="top" style="width: 150px; text-align: right; ">Intitul&eacute; type document : <b style="color: red;">*</b></td>
            	<td valign="top" ><input saisie=""  value="<?php echo $intitule_type_doc; ?>" style="width:100%" type="text" id="intitule_type_doc" name="intitule_type_doc"  /></td>
            </tr>
            <tr>
                <td valign="top" style="width: 150px; text-align: right; ">Indice type document : <b style="color: red;">*</b></td>
            	<td valign="top" ><input saisie=""  value="<?php echo $indice_type_doc; ?>" style="width:30%" type="text" id="indice_type_doc" name="indice_type_doc"  /></td>
            </tr>
            <td valign="top" style="text-align: right;vertical-align:top;">Visible? : <b style="color: red;">*</b></td>
           	<td>
            <select name="visible_type_doc"><option <?php if($visible_type_doc==1) echo "selected=''"?> value="1">OUI</option><option <?php if($visible_type_doc==0) echo "selected=''"?> value="0">NON</option></select>
            </td>	
            </tr>
          </table>
</form>
</div>
<div class="modal-footer">
            <button onclick="document.getElementById('myForm').submit()" class="btn btn-primary" >Valider</button> 
            <button class="btn" onclick="closewindows()">Fermer</button>            
</div>
<br />
<div class="dr"><span></span></div>
<br />
<script type="text/javascript">
<!--
	
-->
</script>