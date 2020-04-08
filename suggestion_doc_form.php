<?php
include("./config.php");
include('header.php');

$id_transfert=$_GET['id_transfert'];
$infotransfert=$classdocument->InfoSur_transfert_document($id_transfert);
$suggestion_pour=$infotransfert['parqui'];
$suggestion_par=$_SESSION['appmail']['me'];
$id_doc=$infotransfert['id_doc'];
//$document=$classdocument->InfoSur_document($id_doc);
if($_POST["suggererdoc"]){
    $classdocument->inserer_suggestions_pour_ce_document($id_doc,addslashes($_POST["suggestion_doc"]),$suggestion_pour,$suggestion_par);
    echo '<script type="text/javascript">
                opener.location.reload();
                self.close()
                </script>'; 
}
$infosuggestion=$classdocument->InfoSur_suggestions_pour_ce_document($id_doc,$suggestion_pour,$suggestion_par);
?>
<div class="modal" style="width: 99%;left: 0;right: 0px;top: 0%;margin: 0 auto;height:550px;">
<div class="modal-header">Suggestion / Corrections</div>
<div class="modal-body">
<form id="suggestion-form" name="formulaire" action="" method="post" onsubmit="return valideform();">
 <table>
<tr>
                    <td valign='top' style="width: 30%;">Suggestion</td>
                    <td valign='top'>
                    <input name="suggererdoc" type="hidden" value="suggererdoc" />
                    <textarea cols="100"  name="suggestion_doc" id="compose-textarea"  rows="5" class="input-block-level">
                       <?php echo stripslashes($infosuggestion['suggestion_doc'])?>                   
                    </textarea>
                   </td>
                    </tr>
</table>
 </form>
</div>
<div class="modal-footer">
            <button onclick="document.getElementById('suggestion-form').submit()" class="btn btn-primary" >Valider</button> 
            <button class="btn" onclick="closewindows()">Fermer</button>            
</div>
<br />
<div class="dr"><span></span></div>