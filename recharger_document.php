<?php
include('top_page.php');
include('header.php');
 
$id_doc=$_GET['id_doc'];
$type_doc=$_GET['pagedoc'];
$me=$_SESSION['appmail']['me'];
$document=$classdocument->InfoSur_document($id_doc);
if($_POST["corriger_doc"]){
$fichier = $_FILES['fichier_doc'];
        if($fichier['error']==UPLOAD_ERR_OK){
           $fichier_name = $fichier['name'];
           list($name,$extension) = explode(".",$fichier_name);
           if(!is_dir($upload_dirdoc)) mkdir($upload_dirdoc);
           if(strtoupper($extension)=='PDF'){
               if(move_uploaded_file($fichier['tmp_name'], $document['fichier_doc'])){
                $fichier_doc=$document['fichier_doc'];
                  $classdocument->recharge_document($id_doc,$fichier_doc);   
                  echo '<script type="text/javascript">
                opener.location.reload();
                self.close()
                </script>';        
               }
           }
        }
}
?>
<style>
input[type=text]{
    height: 30px;
}
</style>
<div class="modal" style="width: 99%;left: 0;right: 0px;top: 0%;margin: 0 auto;height:550px;">
<div class="modal-header">RECHARGER DOCUMENT</div>
<div class="modal-body">
<form id="chargerdoc" name="formulaire" enctype="multipart/form-data" action="" method="post" onsubmit="return validform();">
                    <table>
                    <tr>
                       <td>Recharger le document</td>
                       <td>
                       <input name="corriger_doc" type="hidden" value="o" />
                       <input type="file" name="fichier_doc" /> <b style="color: red;">(uniquement .PDF)</b></td>
                    </tr>
                    </table>
 </form>
</div>
<div class="modal-footer">
            <button onclick="document.getElementById('chargerdoc').submit()" class="btn btn-primary" >Charger</button> 
            <button class="btn" onclick="closewindows()">Fermer</button>            
</div>