<?php
include("./config.php");
include('header.php');
$classperson=new Person();
$id_scat_doc=$_GET['mod'];
if($_POST['niveau_doc']){
     $default =array("niveau_doc"=>addslashes($_POST['niveau_doc']),
                     "id_scat_doc"=>$id_scat_doc,
                     "indice_niveau_doc"=>$_POST['indice_niveau_doc'],
                     "id_niveau_doc"=>""
                     );
    $classdocument->niveau_document_scategorie($default);
}

If($_GET['supp']) $classdocument->supprimer_niveau_document_scategorie($_GET['supp']);

$sqlto=$classperson->liste($ligne=0,$trie='',$visible=1);
?>
<div class="modal" style="width: 99%;left: 0;right: 0px;top: 0%;margin: 0 auto;height:550px;">
<div class="modal-header">Niveau</div>
<div class="modal-body">
<form id="myForm" name="formulaire" action="" method="post" onsubmit="return validform();">
<div style="margin: 0 auto;width: 50%;text-align: center;"><?php echo $error?></div>
<table class="table">
<tr><td>Niveau hierachique</td><td><input saisie=""     style="width:100%" type="text" id="niveau_doc" name="niveau_doc"  /></td></tr>
<tr><td>Indice niveau hierachique</td><td> <input saisie=""     style="width:100%" type="text" id="indice_niveau_doc" name="indice_niveau_doc"  /></td></tr>
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
<div style="clear: both;"></div>
    <div class="block-fluid">
    <?php 
    $sqlinbox=$classdocument->liste_niveau_thisdocument_scategorie($id_scat_doc,0,'');
    
    if($sqlinbox->rowCount()>0){?>
        <table  cellpadding="0" cellspacing="0" width="100%" class="table">
        <thead>
        <tr>
          <th>Indice</th><th>Niveau</th><th>Action</th>
        </tr>
        </thead>
        <tbody>
            <?php foreach($sqlinbox as $tabmail){
                $nom=stripslashes($tabmail['niveau_doc']);
            ?>
            <tr>
            <td style="width: 20%;"><?php echo $tabmail['indice_niveau_doc']  ?></td>
            <td><?php echo $nom  ?></td>
            <td style="width: 150px;">
            <a style="text-decoration: none;" title="Supprimer un &eacute;l&eacute;ment" href="javascript:if(confirm('voulez-vous vraiment supprimer cet &eacute;l&eacute;ment?')) document.location.href='?mod=<?php echo $_GET['mod'];?>&supp=<?php  echo $tabmail['id_niveau_doc'] ?>';">
			<i class="icon-remove"></i>
			</a></td>
            </tr>
            <?php }?>
        </tbody>
        </table>
        <?php }?>
    </div>
<div style="clear: both;"></div>
</div>
<script type="text/javascript">
<!--
	
-->
</script>