<?php
include("./config.php");
include('header.php');
$classperson=new Person();
$id_scat_doc=$_GET['mod'];
if($_POST['id_pers'] && $_POST['id_niveau_doc']){
    $default =array("id_pers"=>$_POST['id_pers'],
                     "id_scat_doc"=>$id_scat_doc,
                     "id_niveau_doc"=>$_POST['id_niveau_doc']
                     );
    $classdocument->acces_document_scategorie($default);
}

If($_GET['supp']) $classdocument->supprimer_acces_document_scategorie_byId($_GET['supp']);

$sqlto=$classperson->liste($ligne=0,$trie='',$visible=1);
$sqlinbox=$classdocument->liste_niveau_thisdocument_scategorie($id_scat_doc,0,'');
?>
<div class="modal" style="width: 99%;left: 0;right: 0px;top: 0%;margin: 0 auto;height:550px;">
<div class="modal-header">Acces aux titres de documents</div>
<div class="modal-body">
<form id="myForm" name="formulaire" action="" method="post" onsubmit="return validform();">
<div style="margin: 0 auto;width: 50%;text-align: center;"><?php echo $error?></div>
<table class="table">
        <tr>
                           <td class="control-td" for="inputRecipients">Selectionner une personne</td>
                           <td>
                              <select name="id_pers"  data-placeholder="Selectionner une personne" class="chosen-select span12"  >
                              <option value=""></option>
                              <?php foreach($sqlto as $tabto){?>
                                    <option value="<?php echo $tabto['id_pers'] ?>"><?php echo $tabto['nom'] ?></option>
                              <?php }?>
                              </select>
                            </td>
                        </tr>
        <tr>
                           <td class="control-td" for="inputRecipients">Niveau hierachique</td>
                           <td>
                              <select name="id_niveau_doc"  data-placeholder="Attribuer un niveau hierachique" class="chosen-select span12"  >
                              <option value=""></option>
                              <?php foreach($sqlinbox as $tabsqlinbox){?>
                                    <option value="<?php echo $tabsqlinbox['id_niveau_doc'] ?>"><?php echo $tabsqlinbox['niveau_doc'] ?></option>
                              <?php }?>
                              </select>
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
<div style="clear: both;"></div>
    <div class="block-fluid">
    <?php 
    $sqlinbox=$classdocument->liste_acces_thisdocument_scategorie($id_scat_doc,0,'',1);
    
    if($sqlinbox->rowCount()>0){?>
        <table  cellpadding="0" cellspacing="0" width="100%" class="table">
        <tbody>
            <?php foreach($sqlinbox as $tabmail){
                $nom=stripslashes($tabmail['nom']);
                $niveau_doc=stripslashes($tabmail['niveau_doc']);
            ?>
            <tr>
            <td><?php echo $nom  ?></td>
            <td><?php echo $niveau_doc  ?></td>
            <td style="width: 150px;">
            <a style="text-decoration: none;" href="javascript:if(confirm('voulez-vous vraiment supprimer cet element?')) document.location.href='?mod=<?php echo $_GET['mod'];?>&supp=<?php  echo $tabmail['id'] ?>';">
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