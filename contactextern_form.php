<?php
include('config.php');
include('header.php');
$mod="";
$smsactif=0;
if($_POST["nom"] && sans_espace($_POST["nom"])!=""){
    $smsactifpost=0;$emailingactifpost=0;
    if($_POST['smsactif'])$smsactifpost=1;
    if($_POST['emailingactif'])$emailingactifpost=1;
$option=array("nom"=>addslashes($_POST['nom']),
              "login_pers"=>addslashes($_POST['login_pers']),
              "pwd_pers"=>addslashes($_POST['pwd_pers']),
              "photo"=>"",
              "tel"=>remplace_mot(remplace_mot($_POST['tel'],'(',''),')',''),
              "cel"=>remplace_mot(remplace_mot($_POST['cel'],'(',''),')',''),
              "fax"=>remplace_mot(remplace_mot($_POST['fax'],'(',''),')',''),
              "email"=>addslashes($_POST['email']),
              "adresse"=>addslashes($_POST['adresse']),
              "smsactif"=>$smsactifpost,
              "emailingactif"=>$emailingactifpost,
              "id_grpe"=>$_POST['id_grpe'],
              "id_pers"=>$_POST['mod']
              );
    if($_POST['mod']){
        //if(!$classpersoncontact->LoginExiste($_POST['login_pers'],$_POST['mod']))
        {
          $result=$classpersoncontact->modification($option);
          if($result) {
            $notification="<div class='alert alert-info'>                
                      <h4>Success!</h4>
                      Op&eacute;ration &eacute;ffectu&eacute;e avec succ&egrave;s.
                  </div>";
          } 
        }
        
    }else{ 
        {
            $result=$classpersoncontact->insertion($option); 
            if($result) {
            $notification="<div class='alert alert-info'>                
                    <h4>Success!</h4>
                    Op&eacute;ration &eacute;ffectu&eacute;e avec succ&egrave;s.
                  </div>";
          }
            echo '<script type="text/javascript">
                opener.location.reload();
                // self.close()
                </script>';
        
        }
        
    } 
}

if(count($_GET['mod']) && sans_espace($_GET['mod'])!=""){
        $mod=$_GET['mod'];
        $tab_mod=$classpersoncontact->InfoSur($mod);
        $mod=$tab_mod['id_pers'];$id_grpe=$tab_mod['id_grpe'];
        $pwd_pers=$tab_mod['pwd_pers'];$login_pers=$tab_mod['login_pers'];
        $nom=$tab_mod['nom'];$email=$tab_mod['email'];
        $cel=$tab_mod['cel'];$tel=$tab_mod['tel'];
        $fax=$tab_mod['fax'];$adresse=$tab_mod['adresse'];
        $smsactif=$tab_mod['smsactif'];$emailingactif=$tab_mod['emailingactif'];
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
<div class="modal-header">ENREGISTREMENT DES CONTACTS</div>
<div class="modal-body">
<form id="myForm" name="formulaire" action="" method="post" onsubmit="return validform();">
<div style="margin: 0 auto;width: 50%;text-align: center;"><?php echo $notification?></div>
<table class="table">
         <input name="mod" type="hidden" value="<?php echo $mod; ?>" />
            <tr>
                <td valign="top" style="width: 150px; text-align: right; "> Nom & Pr&eacute;noms : <b style="color: red;">*</b></td>
            	<td valign="top" ><input saisie=""  value="<?php echo $nom; ?>" style="width:100%" type="text" id="nom" name="nom"  /></td>
            </tr>
            <tr><td colspan="2" style="color: red;text-align: center;"><?php echo $errorlogin; ?></td></tr>
            <tr>
            <td valign="top" style="text-align: right;vertical-align:top;">Adresse : </td>
           	<td ><textarea style="width:100%"  id="adresse" name="adresse" style="width: 90%;"><?php echo $adresse; ?></textarea></td>	
            </tr>
            <tr>
            	<td  valign="top" style="text-align: right;">T&eacute;l&eacute;phone &nbsp;: </td>
            	<td ><input  class="phone" value="<?php echo $tel; ?>" style="width:100%"   type="text" id="tel" name="tel" placeholder="(228)999999"  /></td>
            </tr>
            <tr>
            	<td valign="top" style="text-align: right;">Fax &nbsp;: </td>
            	<td ><input  class="phone" value="<?php echo $fax; ?>" style="width:100%"   type="text" id="fax" name="fax" placeholder="(228)999999"  /></td>
            </tr>
            
            <tr>
                <td valign="top" style="text-align: right;">Cellulaire : </td>
            	<td ><input class="phone" value="<?php echo $cel;?>" style="width:100%" placeholder="(228)999999"   type="text" id="cel" name="cel"  /></td>
            </tr>
            
            
            <tr>
                <td valign="top" style="text-align: right;">Mail :</td>
            	<td ><input value="<?php echo $email; ?>" style="width:100%"  type="text"  id="email" name="email"  /></td>
            </tr>
            
            <tr>
            <td valign="top" style="text-align: right;vertical-align:top;">Peut recevoir SMS : </td>
           	<td ><input type="checkbox" <?php if($smsactif==1) echo "checked=''" ?> name="smsactif"  /></td>	
            </tr>
            <tr><td colspan="2" style="height: 10px;"></td></tr>
            <td valign="top" style="text-align: right;vertical-align:top;">Peut recevoir Emailing : </td>
           	<td ><input type="checkbox" <?php if($emailingactif==1) echo "checked=''" ?> name="emailingactif"  /></td>	
            </tr>
            <tr><td colspan="2" style="height: 10px;"></td></tr>
            <tr>
            <td valign="top" style="text-align: right;vertical-align:top;">Groupe : </td>
           	<td ><select   name="id_grpe" style="height: 24px; width: 100%; font-weight: 600;">
            <option value=""></option>
            	             
                <?php
                        $sql_query=$classgroupecontact->liste(0,'',1);
                        foreach($sql_query as $tab_groupe){
                        
                            $select_groupe='';
                            if($tab_groupe['id_grpe']==$id_grpe) $select_groupe='selected=""';
                            echo"<option value='".$tab_groupe['id_grpe']."' $select_groupe>".
                                stripslashes($tab_groupe['lib_grpe'])
                                ."</option>";
                    	}
                ?>
                   
            											</select></td>	
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