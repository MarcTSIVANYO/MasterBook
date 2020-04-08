<?php
include("./config.php");
include('header.php');
$mod="";

if($_POST["intitule_scat_doc"] && sans_espace($_POST["intitule_scat_doc"])!=""){
 $fichier_doc='';   
 //print_r($fichier);
 $fichier = $_FILES['fichier_scat_doc'];
 if($fichier['error']==UPLOAD_ERR_OK){
           $fichier_name = $fichier['name'];
           list($name,$extension) = explode(".",$fichier_name);
           $name = time().'_'.$_SESSION['appmail']['id_pers'].'_'."$type_doc.$extension";
           if(!is_dir($fichetype_dirdoc)) mkdir($fichetype_dirdoc);
           if(strtoupper($extension)=='DOCX'){
               if(move_uploaded_file($fichier['tmp_name'], $fichetype_dirdoc.$name)){
                $fichier_doc=$name;       
               }
           }
        }   
    
    
$option=array("intitule_scat_doc"=>addslashes($_POST['intitule_scat_doc']),
               "fichier_scat_doc"=>$fichier_doc,
               "indice_scat_doc"=>addslashes($_POST['indice_scat_doc']),
               "visible_scat_doc"=>addslashes($_POST['visible_scat_doc']),
               "id_cat_doc"=>$_POST['id_cat_doc'],
               "id_grpe"=>$_POST['id_grpe'],
              "id_scat_doc"=>$_POST['mod']
              );
    if($_POST['mod']){
          $result=$classdocument->modification_document_scategorie($option);  
          echo '<script type="text/javascript">
                opener.location.reload();
                </script>';
         if($result) $error="<b style='color:green;' >Modification r&eacute;ussie</b>";
    }else{
          $result=$classdocument->insertion_document_scategorie($option); 
          echo '<script type="text/javascript">
                opener.location.reload();
                self.close()
                </script>';
    }
   //unset($_POST); 
   
    
}

if(count($_GET['mod']) && sans_espace($_GET['mod'])!=""){
        $mod=$_GET['mod'];
        $tab_mod=$classdocument->InfoSur_document_scategorie($mod);
        $mod=$tab_mod['id_scat_doc'];
        $intitule_scat_doc=stripslashes($tab_mod['intitule_scat_doc']);
        $fichier_scat_doc=$tab_mod['fichier_scat_doc'];
        $id_cat_doc=$tab_mod['id_cat_doc'];
         $indice_scat_doc=$tab_mod['indice_scat_doc'];
         $visible_scat_doc=$tab_mod['visible_scat_doc'];
         $id_grpe=$tab_mod['id_grpe'];
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
<div class="modal-header"><h3>SOUS CATEGORIE DOCUMENT</h3> 
</div>
<div class="modal-body">
<div style="margin: 0 auto;width: 50%;text-align: center;"><?php echo $error?></div>
<form id="myForm" name="formulaire" action="" enctype="multipart/form-data" method="post" onsubmit="return validform();">
        <table class="table"   style="width: 100%;">
        <tr><td></td><td><input name="mod" readonly="" type="text" <?php  if(!($_GET['mod'])) echo('disabled=""') ?> value="<?php echo $mod; ?>" /></td></tr>
            <tr>
                <td valign="top" style="width: 150px; text-align: right; ">Nom du  document : <b style="color: red;">*</b></td>
            	<td valign="top" ><input saisie=""  value="<?php echo $intitule_scat_doc; ?>" style="width:100%" type="text" id="intitule_scat_doc" name="intitule_scat_doc"  /></td>
            </tr>
            <tr>
            <td valign="top" style="text-align: right;vertical-align:top;">Fichier type : <b style="color: red;">*</b></td>
           	<td>
            <input type="file" name="fichier_scat_doc" />
            </td>
            </tr>
            <tr>
            <td valign="top" style="text-align: right;vertical-align:top;">Categorie document : <b style="color: red;">*</b></td>
           	<td>
            <select saisie="" name="id_cat_doc">
            <option value="">Selectionner un type de document</option>
            <?php
                                                                $sql_query=$classdocument->liste_document_categorie(0,'',1);
                                                                 foreach($sql_query as $tab_document_categorie){
                                                                    $select_document_categorie='';
                                                                    if($tab_document_categorie['id_cat_doc']==$id_cat_doc) $select_document_categorie='selected=""';
                                                            	    $option_document_categorie.='<option '.$select_document_categorie.' value="'.$tab_document_categorie['id_cat_doc'].'">'.$tab_document_categorie['intitule_cat_doc'].'</option>';
                                                                }
                                                                echo $option_document_categorie;
                                                                
                                                            ?>
            </select>
            
            </td>
            </tr>
            <tr>
                <td valign="top" style="width: 150px; text-align: right; ">Indice nom du document : <b style="color: red;">*</b></td>
            	<td valign="top" ><input saisie=""  value="<?php echo $indice_scat_doc; ?>" style="width:30%" type="text" id="indice_scat_doc" name="indice_scat_doc"  /></td>
            </tr>
            
            <tr><td colspan="2" style="height: 10px;"></td></tr>
            <tr>
            <td valign="top" style="text-align: right;vertical-align:top;">Groupe : </td>
           	<td ><select  name="id_grpe" style="height: 24px; width: 100%; font-weight: 600;">
            <option value=""></option>
            												<?php
                                                             $departementliste=$classdepartement->liste(0,'',1);
                                                             foreach($departementliste as $tabdepartementliste)
                                                              {
                                                                echo '<optgroup label="'.stripslashes($tabdepartementliste['lib_departement']).'">';
                                                                    $sql_query=$classgroupe->listeByDepartement($tabdepartementliste['id_departement'],0,'',1);
                                                                     foreach($sql_query as $tab_groupe){
                                                                        $select_groupe='';
                                                                        if($tab_groupe['id_grpe']==$id_grpe) $select_groupe='selected=""';
                                                                	    $option_groupe.='<option '.$select_groupe.' value="'.$tab_groupe['id_grpe'].'">'.$tab_groupe['lib_grpe'].'</option>';
                                                                    }
                                                                    echo $option_groupe;
                                                                echo '</optgroup>';
                                                              }
                                                                
                                                            ?>
            											</select></td>	
            </tr>
            <tr>
            <td valign="top" style="text-align: right;vertical-align:top;">Visible? : <b style="color: red;">*</b></td>
           	<td>
            <select name="visible_scat_doc"><option <?php if($visible_scat_doc==1) echo "selected=''"?> value="1">OUI</option><option <?php if($visible_scat_doc==0) echo "selected=''"?> value="0">NON</option></select>
            </td>	
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