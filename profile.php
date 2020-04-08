<?php
include('config.php');
include('header.php');
$tab_photo = array ("JPG", "JPEG", "PNG", "GIF");
if($_POST["nom"] && sans_espace($_POST["nom"])!=""){
 $postphoto=''; 
 if($_FILES["pictures"]["error"]) { 
    foreach ($_FILES["pictures"]["error"] as $key => $error) {
        $photoname='';
        if ($error == UPLOAD_ERR_OK) {
            $tmp_name = $_FILES["pictures"]["tmp_name"][$key];
            $name = $_FILES["pictures"]["name"][$key];
             list($header,$extension)=explode(".",$name);
             if(in_array(strtoupper($extension),$tab_photo)){
                $photoname=$_SESSION['appmail']['id_pers'].'.'.$extension;
                if(move_uploaded_file($tmp_name, "profil/$photoname"))
                        {
                            $postphoto=$photoname;
                        }
             }
             
        }
   }
}
     
$option=array("nom"=>addslashes($_POST['nom']),
              "login_pers"=>addslashes($_POST['login_pers']),
              "pwd_pers"=>addslashes($_POST['pwd_pers']),
              "photo"=>"$postphoto",
              "tel"=>remplace_mot(remplace_mot($_POST['tel'],'(',''),')',''),
              "cel"=>remplace_mot(remplace_mot($_POST['cel'],'(',''),')',''),
              "fax"=>remplace_mot(remplace_mot($_POST['fax'],'(',''),')',''),
              "email"=>addslashes($_POST['email']),
              "adresse"=>addslashes($_POST['adresse']),
              "id_grpe"=>$_POST['id_grpe'],
              "id_pers"=>$_POST['mod']
              );
    if($_POST['mod']){
        if(!$classperson->LoginExiste($_POST['login_pers'],$_POST['mod'])){
          $result=$classperson->modification($option);
          if($result) {
            $errorresult="<b style='color:green;' >Modification r&eacute;ussie</b>";
          } 
        }else{
            $errorresult="Ce login < <b>".$_POST['login_pers']."</b> > est indisponible.Veuillez choisir un autre";
        }
    }
   //unset($_POST); 
}

if(count($_SESSION['appmail']['id_pers']) && sans_espace($_SESSION['appmail']['id_pers'])!=""){
        $mod=$_SESSION['appmail']['id_pers'];
        $tab_mod=$classperson->InfoSur($mod);
        $mod=$tab_mod['id_pers'];$id_grpe=$tab_mod['id_grpe'];
        $pwd_pers=$tab_mod['pwd_pers'];$login_pers=$tab_mod['login_pers'];
        $nom=$tab_mod['nom'];$email=$tab_mod['email'];
        $cel=$tab_mod['cel'];$tel=$tab_mod['tel'];
        $fax=$tab_mod['fax'];$adresse=$tab_mod['adresse'];
        $photo=$tab_mod['photo'];
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
<div class="modal-header">Modifier de votre profil</div>
<div class="modal-body">
<div  style="text-align: center;"><?php echo $errorresult; ?></div>
<form id="myForm" name="formulaire" action="" method="post" enctype="multipart/form-data" onsubmit="return validform();">
        <table   class="table">
        <input name="mod" type="hidden"  value="<?php echo $mod; ?>" />
        <tr>
          <td valign="top" style="width: 150px; text-align: right; ">Logo:</td>
          <td style="text-align: center;"><img width="100px" height="100px" src="profil/<?php echo$photo?>" />&nbsp;&nbsp;<input name="pictures[]" type="file" />
          </td>
        </tr>
         <tr><td colspan="2" style="height: 10px;"></td></tr>  
            <tr>
                <td valign="top" style="width: 150px; text-align: right; "> Nom & Pr&eacute;noms : <b style="color: red;">*</b></td>
            	<td valign="top" ><input saisie=""  value="<?php echo $nom; ?>" style="width:100%" type="text" id="nom" name="nom"  /></td>
            </tr>
            
            
            <tr>
                <td valign="top" style="width: 150px; text-align: right; "> Utilisateur : <b style="color: red;">*</b></td>
            	<td valign="top" ><input saisie=""  readonly=""  onkeypress="return verif(event);" value="<?php echo $login_pers; ?>" style="width:100%" type="text" id="login_pers" name="login_pers"  /></td>
            </tr>
            <tr>
                <td valign="top" style="width: 150px; text-align: right; "> Mot de passe : <b style="color: red;">*</b></td>
            	<td valign="top" ><input saisie=""   value="<?php echo $pwd_pers; ?>" style="width:100%" type="password" id="pwd_pers" name="pwd_pers"  /></td>
            </tr>
            <tr>
                <td valign="top" style="text-align: right;">Cellulaire : </td>
            	<td ><input class="phone" value="<?php echo $cel;?>" style="width:100%" placeholder="(228)999999"   type="text" id="cel" name="cel"  /></td>
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
                <td valign="top" style="text-align: right;">Mail :</td>
            	<td ><input value="<?php echo $email; ?>" style="width:100%"  type="text"  id="email" name="email"  /></td>
            </tr>
            <tr>
            <td valign="top" style="text-align: right;vertical-align:top;">Adresse : </td>
           	<td ><textarea style="width:100%"  id="adresse" name="adresse" style="width: 90%;"><?php echo $adresse; ?></textarea></td>	
            </tr>
            <tr>
            <td valign="top" style="text-align: right;vertical-align:top;">Groupe : </td>
           	<td ><select  name="id_grpe" style="height: 24px; width: 30%; font-weight: 600;">
            												<?php
                                                                $tab_groupe=$classgroupe->InfoSur($id_grpe);
            
                                                            	    $option_groupe.='<option '.$select_groupe.' value="'.$tab_groupe['id_grpe'].'">'.$tab_groupe['lib_grpe'].'</option>';
                                                                echo $option_groupe;
                                                                
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
</div>