<?php
include("./config.php");
include('header.php');
$mod="";
if($_POST["intitule_cat_doc"] && sans_espace($_POST["intitule_cat_doc"])!=""){
$option=array("intitule_cat_doc"=>addslashes($_POST['intitule_cat_doc']),
                "indice_cat_doc"=>addslashes($_POST['indice_cat_doc']),
               "id_type_doc"=>addslashes($_POST['id_type_doc']),
               "visible_cat_doc"=>addslashes($_POST['visible_cat_doc']),
              "id_cat_doc"=>$_POST['mod']
              );
    if($_POST['mod']){
          $result=$classdocument->modification_document_categorie($option);  
          echo '<script type="text/javascript">
                opener.location.reload();
                </script>';
         if($result) $error="<b style='color:green;' >Modification r&eacute;ussie</b>";
    }else{
          $result=$classdocument->insertion_document_categorie($option); 
          echo '<script type="text/javascript">
                opener.location.reload();
                self.close()
                </script>';
    }
   //unset($_POST); 
   
    
}

if(count($_GET['mod']) && sans_espace($_GET['mod'])!=""){
        $mod=$_GET['mod'];
        $tab_mod=$classdocument->InfoSur_document_categorie($mod);
        $mod=$tab_mod['id_cat_doc'];
        $intitule_cat_doc=stripslashes($tab_mod['intitule_cat_doc']);
        $id_type_doc=$tab_mod['id_type_doc'];
        $indice_cat_doc=$tab_mod['indice_cat_doc'];
        $visible_cat_doc=$tab_mod['visible_cat_doc'];
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
<div class="modal-header">CATEGORIE DOCUMENT</div>
<div class="modal-body">
<form id="myForm" name="formulaire" action="" method="post" onsubmit="return validform();">
<div style="margin: 0 auto;width: 50%;text-align: center;"><?php echo $error?></div>
<table class="table">
        <tr><td></td><td><input name="mod" readonly="" type="text" <?php  if(!($_GET['mod'])) echo('disabled=""') ?> value="<?php echo $mod; ?>" /></td></tr>
            <tr>
                <td valign="top" style="width: 150px; text-align: right; ">Intitul&eacute; cat&eacute;gorie document : <b style="color: red;">*</b></td>
            	<td valign="top" ><input saisie=""  value="<?php echo $intitule_cat_doc; ?>" style="width:100%" type="text" id="intitule_cat_doc" name="intitule_cat_doc"  /></td>
            </tr>
             <tr>
            <td valign="top" style="text-align: right;vertical-align:top;">Type document : <b style="color: red;">*</b></td>
           	<td>
            <select saisie="" name="id_type_doc">
            <option value="">Selectionner un type de document</option>
            <?php
                                                                $sql_query=$classdocument->liste_type_document(0,'',1);
                                                                 foreach($sql_query as $tab_type_document){
                                                                    $select_type_document='';
                                                                    if($tab_type_document['id_type_doc']==$id_type_doc) $select_type_document='selected=""';
                                                            	    $option_type_document.='<option '.$select_type_document.' value="'.$tab_type_document['id_type_doc'].'">'.$tab_type_document['intitule_type_doc'].'</option>';
                                                                }
                                                                echo $option_type_document;
                                                                
                                                            ?>
            </select>
            
            </td>
             </tr>
             <tr>
                <td valign="top" style="width: 150px; text-align: right; ">Indice categorie document : <b style="color: red;">*</b></td>
            	<td valign="top" ><input saisie=""  value="<?php echo $indice_cat_doc; ?>" style="width:30%" type="text" id="indice_cat_doc" name="indice_cat_doc"  /></td>
            </tr>
             <tr>
            <td valign="top" style="text-align: right;vertical-align:top;">Visible? : <b style="color: red;">*</b></td>
           	<td>
            <select name="visible_cat_doc"><option <?php if($visible_cat_doc==1) echo "selected=''"?>  value="1">OUI</option><option <?php if($visible_cat_doc==0) echo "selected=''"?>  value="0">NON</option></select>
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