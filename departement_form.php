<?php
include('config.php');
include('header.php');
$mod="";
if($_POST['lib_departement']){
    if($_POST['mod']){
        $option=array("lib_departement"=>addslashes($_POST['lib_departement']),
                      "desc_departement"=>addslashes($_POST['desc_departement']),
                      "id_departement"=>$_POST['mod']
                      );
        $valid=$classdepartement->modification($option);
    }else{
        $option=array("lib_departement"=>addslashes($_POST['lib_departement']),
                      "desc_departement"=>addslashes($_POST['desc_departement'])
                      );
        $valid=$classdepartement->insertion($option);
    }
    echo '<script language="javascript">
                      window.parent.opener.location.reload();window.close();
         </script>';
}
if(count($_GET['mod'])  && sans_espace($_GET['mod'])!=""){
        $mod=$_GET['mod'];
        $tab_mod=$classdepartement->InfoSurDepartement($mod);
        $mod=$tab_mod['id_departement'];$lib_departement=$tab_mod['lib_departement'];
        $desc_departement=stripslashes($tab_mod['desc_departement']);
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
<div class="modal" style="width: 99%;left: 0;right: 0px;top: 0%;margin: 0 auto;height: 550px;">
<div class="modal-header"><h3>FORMULAIRE DES POSTES</h3> 
</div>
<div class="modal-body">
<div style="margin: 0 auto;width: 50%;text-align: center;"><?php echo $error?></div>
<form id="myForm" name="formulaire" action="" enctype="multipart/form-data" method="post" onsubmit="return validform();">
        <table class="table"   style="width: 100%;">
            <tr>
                <td  style="text-align: right; width: 20%;vertical-align:top;"></td>
            	<td ><input name="mod" type="text" readonly=""  <?php  if(sans_espace($mod)=="") echo('disabled=""') ?> value="<?php echo $mod; ?>" /></td>
            </tr>
            <tr>
                <td  style="text-align: right; width: 20%;vertical-align:top;">Poste : <b style="color: red;">*</b></td>
            	<td ><input saisie="" value="<?php echo $lib_departement; ?>" style="width:90%" placeholder="Poste"  type="text"  id="lib_departement" name="lib_departement"  /></td>
            </tr>
            <tr>
            <td style="text-align: right;vertical-align:top;">Description : </td>
           	<td ><textarea  id="desc_departement" placeholder="Description" name="desc_departement" style="width: 90%;"><?php echo $desc_departement; ?></textarea></td>	
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