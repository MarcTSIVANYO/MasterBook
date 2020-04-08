<?php
include('config.php');
include('header.php');
$mod="";
if($_POST["nom_visiteur"] && sans_espace($_POST["nom_visiteur"])!=""){
$option=array("nom_visiteur"=>addslashes($_POST['nom_visiteur']),
              "societe_visiteur"=>addslashes($_POST['societe_visiteur']),
              "contact_visiteur"=>addslashes($_POST['contact_visiteur']),
              "motif_visiteur"=>addslashes($_POST['motif_visiteur']),
              "message_visiteur"=>addslashes($_POST['message_visiteur']),
              "person_visiteur"=>addslashes($_POST['person_visiteur']),
              "type_visiteur"=>addslashes($_POST['type_visiteur']),
              "date"=>$_POST['date'],
              "enregistreur"=>$_SESSION['appmail']['id_pers'],
              "id_visiteur"=>$_POST['mod']
              );
    if($_POST['mod']){
          $result=$classvisiteur->modification($option); 
          
          echo '<script type="text/javascript">
                opener.location.reload();
                </script>'; 
    }else{
         $result=$classvisiteur->insertion($option);
                
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
                    Op&eacute;ration non &eacute;ffectu&eacute;e.
                </div>";
    }
    
    
   //unset($_POST); 
}

if(count($_GET['mod']) && sans_espace($_GET['mod'])!=""){
        $mod=$_GET['mod'];
        $tab_mod=$classvisiteur->InfoSur($mod);
        $date=substr($tab_mod['date'],0,16);;
        $societe_visiteur=$tab_mod['societe_visiteur'];
        $nom_visiteur=$tab_mod['nom_visiteur'];$contact_visiteur=$tab_mod['contact_visiteur'];
        $message_visiteur=stripslashes($tab_mod['message_visiteur']);
        $motif_visiteur=stripslashes($tab_mod['motif_visiteur']);
        $person_visiteur=$tab_mod['person_visiteur'];
        $type_visiteur=$tab_mod['type_visiteur'];
        
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
<div class="modal-content">
<div class="modal-header"><h3>FORMULAIRE DE FICHE DE VISITE</h3> 
</div>
<div class="modal-body">
<div style="margin: 0 auto;width: 50%;text-align: center;"><?php echo $error?></div>
<form id="myForm" name="formulaire" action="" enctype="multipart/form-data" method="post" onsubmit="return validform();">
        <table class="table"   style="width: 100%;">
        <input name="mod" readonly="" type="hidden" <?php  if(!($_GET['mod'])) echo('disabled=""') ?> value="<?php echo $mod; ?>" /> 
        <?php 
              if($notification){
                echo"<caption>".$notification."</caption>";
              } 
        ?>

        <tr>
                <td valign="top" style="width: 150px; text-align: right; "> Type Visite : <b style="color: red;">*</b></td>
            	<td valign="top" ><select data='required' name="type_visiteur" style="height: 24px; width: 30%; font-weight: 600;">
                 <option <?php if($type_visiteur=='arrivee') echo "selected"; ?> value="arrivee">Arriv&eacute;e</option>
                  <option <?php if($type_visiteur=='telephone') echo "selected"; ?> value="telephone">Appel T&eacute;l&eacute;phonique</option>
             </td>
        </tr>
            <tr>
                <td valign="top" style="width: 150px; text-align: right; "> Nom & Pr&eacute;noms : <b style="color: red;">*</b></td>
            	<td valign="top" ><input data='required'  value="<?php echo $nom_visiteur; ?>" style="width:100%" type="text" id="nom_visiteur" name="nom_visiteur"  /></td>
            </tr>
            <tr>
                <td valign="top" style="width: 150px; text-align: right; "> Soci&eacute;t&eacute;/Organisme : </td>
            	<td valign="top" ><input   value="<?php echo $societe_visiteur; ?>" style="width:100%" type="text" id="societe_visiteur" name="societe_visiteur"  /></td>
            </tr>
            <tr>
                <td valign="top" style="width: 150px; text-align: right; "> Contacts: <b style="color: red;">*</b></td>
            	<td valign="top" ><input data='required'  value="<?php echo $contact_visiteur; ?>" style="width:100%" type="text" id="contact_visiteur" name="contact_visiteur"  /></td>
            </tr>
            <tr><td colspan="2" style="color: red;text-align: center;"><?php echo $error; ?></td></tr>
            <tr>
            <td valign="top" style="text-align: right;vertical-align:top;">Motif : <b style="color: red;">*</b></td>
           	<td ><textarea style="width:100%" data='required'  id="motif_visiteur" name="motif_visiteur" style="width: 90%;"><?php echo $motif_visiteur; ?></textarea></td>	
            </tr>
            <tr>
            <td valign="top" style="text-align: right;vertical-align:top;">Message laiss&eacute; : <b style="color: red;">*</b></td>
           	<td ><textarea data='required' style="width:100%"  id="message_visiteur" name="message_visiteur" style="width: 90%;"><?php echo $message_visiteur; ?></textarea></td>	
            </tr>
            <tr>
            <td valign="top" style="text-align: right;vertical-align:top;">Personne Demand&eacute;e :<b style="color: red;">*</b> </td>
           	<td ><select data='required' name="person_visiteur" style="height: 24px; width: 30%; font-weight: 600;">
                 <option value=""></option>
										<?php
                          $sql_query=$classperson->ListeSans($_SESSION['appmail']['id_pers'],0,'',1);
                           foreach($sql_query as $tab_person){
                              $select_person='';
                              if($tab_person['id_pers']==$person_visiteur) $select_person='selected=""';
                      	    $option_person.='<option '.$select_person.' value="'.$tab_person['id_pers'].'">'.$tab_person['nom'].'</option>';
                          }
                          echo $option_person;
                          
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
<div style="clear: both;"></div>
</div>
</div>
<script type="text/javascript">
<!--
	
-->
</script>