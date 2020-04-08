<?php
include('top_page.php');
include('header.php');
$mod="";
if($_POST["nom_visiteur"] && sans_espace($_POST["nom_visiteur"])!=""){
$option=array("nom_visiteur"=>addslashes($_POST['nom_visiteur']),
              "societe_visiteur"=>addslashes($_POST['societe_visiteur']),
              "contact_visiteur"=>addslashes($_POST['contact_visiteur']),
              "motif_visiteur"=>addslashes($_POST['motif_visiteur']),
              "message_visiteur"=>addslashes($_POST['message_visiteur']),
              "person_visiteur"=>addslashes($_POST['person_visiteur']),
              "date"=>$_POST['date'],
              "enregistreur"=>$_SESSION['appmail']['id_pers'],
              "id_visiteur"=>$_POST['mod']
              );
    if($_POST['mod']){
          $result=$classvisiteur->modification($option);  
    }else{
         $result=$classvisiteur->insertion($option);
         echo '<script type="text/javascript">
                opener.location.reload();
                self.close()
                </script>';
         
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
<div class="social-box" style="margin: 10px auto;width: 70%;">
<div class="modal-header"><h3>Detail</h3> 
</div>
<div class="modal-body">
        <table   style="width: 100%;">
        <tr>
          <td valign="top" style="width: 150px; text-align: right; ">Date de visite</td>
          <td><input class="datetimepicker_mask" readonly="" type="text" name="date" value="<?php echo $date; ?>" /></td>
        </tr>
            <tr>
                <td valign="top" style="width: 150px; text-align: right; "> Nom & Pr&eacute;noms : </td>
            	<td valign="top" ><input data='required' readonly="" value="<?php echo $nom_visiteur; ?>" style="width:100%" type="text" id="nom_visiteur" name="nom_visiteur"  /></td>
            </tr>
            <tr>
                <td valign="top" style="width: 150px; text-align: right; "> Soci&eacute;t&eacute;/Organisme : </td>
            	<td valign="top" ><input  readonly="" value="<?php echo $societe_visiteur; ?>" style="width:100%" type="text" id="societe_visiteur" name="societe_visiteur"  /></td>
            </tr>
            <tr>
                <td valign="top" style="width: 150px; text-align: right; "> Contacts:</td>
            	<td valign="top" ><input data='required'  readonly="" value="<?php echo $contact_visiteur; ?>" style="width:100%" type="text" id="contact_visiteur" name="contact_visiteur"  /></td>
            </tr>
             
            <tr>
            <td valign="top" style="text-align: right;vertical-align:top;">Motif :  </td>
           	<td ><textarea style="width:100%" data='required' readonly="" id="motif_visiteur" name="motif_visiteur" style="width: 90%;"><?php echo $motif_visiteur; ?></textarea></td>	
            </tr>
            <tr>
            <td valign="top" style="text-align: right;vertical-align:top;">Message laiss&eacute; : </td>
           	<td ><textarea data='required' readonly="" style="width:100%"  id="message_visiteur" name="message_visiteur" style="width: 90%;"><?php echo $message_visiteur; ?></textarea></td>	
            </tr>
             <tr><td style="height: 10px;" colspan="2"></td></tr>
         </table>
            <button class="btn" onclick="closewindows()">Fermer</button>            

</div>
<div style="clear: both;"></div>
</div>
