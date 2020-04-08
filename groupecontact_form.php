<?php
include('config.php');
include('header.php');
$mod="";
if($_POST['lib_grpe']){
    if($_POST['mod']){
        $option=array("lib_grpe"=>addslashes($_POST['lib_grpe']),
                      "desc_grpe"=>addslashes($_POST['desc_grpe']),
                      "id_departement"=>addslashes($_POST['id_departement']),
                      "id_grpe"=>$_POST['mod']
                      );
        $valid=$classgroupecontact->modification($option);
         
    }else{
        $option=array("lib_grpe"=>addslashes($_POST['lib_grpe']),
                      "desc_grpe"=>addslashes($_POST['desc_grpe']),
                      "id_departement"=>addslashes($_POST['id_departement'])
                      );
        $valid=$classgroupecontact->insertion($option);
    }
        if($valid){
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
if(count($_GET['mod'])  && sans_espace($_GET['mod'])!=""){
        $mod=$_GET['mod'];
        $tab_mod=$classgroupecontact->InfoSur($mod);
        $mod=$tab_mod['id_grpe'];$lib_grpe=$tab_mod['lib_grpe'];
        $desc_grpe=$tab_mod['desc_grpe'];
        $id_departement=$tab_mod['id_departement'];
}
?>
<style>
input[type=text]{
    height: 30px;
}
</style>
<div class="modal" style="width: 99%;left: 0;right: 0px;top: 0%;margin: 0 auto;height:550px;">
<div class="modal-header">FORMULAIRE DES GROUPES</div>
<div class="modal-body">
<form id="myForm" name="formulaire" action="" method="post" onsubmit="return validform();">
<div style="margin: 0 auto;width: 50%;text-align: center;"><?php echo $notification?></div>
<table class="table">
            <input name="mod" type="hidden" value="<?php echo $mod; ?>" />
            <tr>
                <td  style="text-align: right; width: 20%;vertical-align:top;">Groupe : <b style="color: red;">*</b></td>
            	<td ><input saisie="" value="<?php echo $lib_grpe; ?>" style="width:90%" placeholder="Groupe"  type="text"  id="lib_grpe" name="lib_grpe"  /></td>
            </tr>
            <tr>
            <td style="text-align: right;vertical-align:top;">Description : </td>
           	<td ><textarea  id="desc_grpe" placeholder="Description" name="desc_grpe" style="width: 90%;"><?php echo $desc_grpe; ?></textarea></td>	
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