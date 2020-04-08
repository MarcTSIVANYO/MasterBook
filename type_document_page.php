<?php 
$typedocument=$_GET['typedocument']=1;
$tabmenucategorie=$classdocument->liste_document_categorie_by_type($typedocument,0,'',1);
?>
<div class="btn-toolbar">
    <?php if(count($tabmenucategorie)>0){ foreach($tabmenucategorie as $tabmenucategorievalue)
    { 
        //Is_acces_document_categorie($id_cat_doc,$id_pers)
        if($classdocument->Is_acces_document_categorie($tabmenucategorievalue['id_cat_doc'],$_SESSION['appmail']['id_pers'])){
        ?>
        <div class="btn-group"> 
        <button data-toggle="dropdown" class="btn dropdown-toggle"><?php echo stripslashes($tabmenucategorievalue['intitule_cat_doc'])?>&nbsp;<span class="caret"></span></button>
            
            <ul class="dropdown-menu">
              <?php $tabmenugroup=$classdocument->liste_document_scategorie_group_by_groupe($tabmenucategorievalue['id_cat_doc'],1);
                if($tabmenugroup){foreach($tabmenugroup as $tabmenugroupvalue){
                    $tabmenusouscategorie=$classdocument->liste_document_scategorie_by_groupe($tabmenucategorievalue['id_cat_doc'],$tabmenugroupvalue['id_grpe'],1);
                    if($classdocument->Is_acces_group_document_scategorie($_SESSION['appmail']['id_pers'],$tabmenugroupvalue['id_grpe'])) {
                ?>
                    <li class="dropdown-submenu">
                    <a  href="#" data-toggle="dropdown"><?php echo stripslashes($tabmenugroupvalue['lib_grpe'])?>&nbsp;</a>
                         <ul class="dropdown-menu">
                              <?php 
                                if($tabmenusouscategorie){foreach($tabmenusouscategorie as $tabmenusouscategorievalue){
                                    if($classdocument->Is_acces_document_scategorie($tabmenusouscategorievalue['id_scat_doc'],$_SESSION['appmail']['id_pers'])){
                                ?>
                                    <li>
                                    <a href="?page=doc&display=<?php echo $display?>&typedocument=<?php echo $typedocument?>&pagedoc=<?php echo $tabmenusouscategorievalue['id_scat_doc']?>" ><?php echo stripslashes($tabmenusouscategorievalue['intitule_scat_doc'])?></a>
                                    </li>
                              <?php }}}?>
                         </ul>
                    </li>
              <?php }}}?>
            </ul>
        </div>
    <?php } }}?>
</div>

<?php include('page_document.php')?>
