<?php
include('config.php');
include('header.php');
if(count($_GET['mod'])  && sans_espace($_GET['mod'])!=""){
        $mod=$_GET['mod'];
}
if($_POST['mod']){
    $mod=$_POST['mod'];
    $classacces->SuppAvantInsertion($mod,'sms');
    $classacces->SuppAvantInsertion($mod,'contactextern');
     $classacces->SuppAvantInsertion($mod,'mail');
     $classacces->SuppAvantInsertion($mod,'emailing');
     $classacces->SuppAvantInsertion($mod,'chat');
     $classacces->SuppAvantInsertion($mod,'para');
     
     $classacces->SuppAvantInsertion($mod,'courrier');
     $classacces->SuppAvantInsertion($mod,'visiteur');
     $classacces->SuppAvantInsertion($mod,'document');
     $classacces->SuppAvantInsertion($mod,'validdoc');
     
    if($_POST['mail']){
            foreach($_POST['mail'] as $mailvalue){
                $classacces->insertion(array("id_grpe"=>"$mod",
                        "autre_grpe"=>"$mailvalue",
                        "session"=>"mail"
                            ));
            }
    }
    
    if($_POST['contactextern']){
            foreach($_POST['contactextern'] as $contactexternvalue){
                $classacces->insertion(array("id_grpe"=>"$mod",
                        "autre_grpe"=>"$contactexternvalue",
                        "session"=>"contactextern"
                            ));
            }
    }
    
    if($_POST['emailing']){
            foreach($_POST['emailing'] as $emailingvalue){
                $classacces->insertion(array("id_grpe"=>"$mod",
                        "autre_grpe"=>"$emailingvalue",
                        "session"=>"emailing"
                            ));
            }
    }
    
/*    if($_POST['sms']){
        
        {
            foreach($_POST['sms'] as $smsvalue){
                $classacces->insertion(array("id_grpe"=>"$mod",
                        "autre_grpe"=>"$smsvalue",
                        "session"=>"sms"
                            ));
            }
        }
    }
    */
    if($_POST['chat']){
        {
            foreach($_POST['chat'] as $chatvalue){
                $classacces->insertion(array("id_grpe"=>"$mod",
                        "autre_grpe"=>"$chatvalue",
                        "session"=>"chat"
                            ));
            }
        }
    }
    
    if($_POST['visiteur']){
        {
            foreach($_POST['visiteur'] as $visiteurvalue){
                $classacces->insertion(array("id_grpe"=>"$mod",
                        "autre_grpe"=>"$visiteurvalue",
                        "session"=>"visiteur"
                            ));
            }
        }
    }
    
    if($_POST['courrier']){
        {
            foreach($_POST['courrier'] as $courriervalue){
                $classacces->insertion(array("id_grpe"=>"$mod",
                        "autre_grpe"=>"$courriervalue",
                        "session"=>"courrier"
                            ));
            }
        }
    }
    
    
    
    
    
    
    if($_POST['para']){
        {
            foreach($_POST['para'] as $paravalue){
                $classacces->insertion(array("id_grpe"=>"$mod",
                        "autre_grpe"=>"$paravalue",
                        "session"=>"para"
                            ));
            }
        }
    }
    
    
   /* if($_POST['document']){
            foreach($_POST['document'] as $documentvalue){
                $classacces->insertion(array("id_grpe"=>"$mod",
                        "autre_grpe"=>"$documentvalue",
                        "session"=>"document"
                            ));
            }
    }*/
    if($_POST['validdoc']){
            foreach($_POST['validdoc'] as $validdocvalue){
                $classacces->insertion(array("id_grpe"=>"$mod",
                        "autre_grpe"=>"$validdocvalue",
                        "session"=>"validdoc"
                            ));
            }
    }
    
    
   
   $error='<b style="color:green">Enr&eacute;gistrement effectu&eacute;<b/>';
    
    
    echo '<script type="text/javascript">
                opener.location.reload();
                </script>';
    
}
//print_r($_POST);
?>

<?php
     $groupeliste=$classgroupe->this_groupe($mod);
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
<div class="modal-header"><h3><?php
     $groupeinfo=$classgroupe->InfoSur($mod);
     echo("DEPARTEMENT : ".$groupeinfo['lib_grpe']);
   ?></h3> 
</div>
<div class="modal-body">
<div style="margin: 0 auto;width: 50%;text-align: center;"><?php echo $error?></div>
<form id="myForm" name="formulaire" action="" enctype="multipart/form-data" method="post" onsubmit="return validform();">
        <input name="mod" type="hidden"  <?php  if(sans_espace($mod)=="") echo('disabled=""') ?> value="<?php echo $mod; ?>" />
        <table class="table"   style="width: 100%;">
    <thead>
    <tr>
    <th colspan="2">Acc&egrave;s au menu Param&egrave;tre</th>
    <th><input type="checkbox" name="para[]" <?php if($classacces->Is_Acces($mod,$mod,'para')) echo "checked=''" ?> value="<?php echo $mod ?>" /></th>
    <th colspan="2"><!--Peut valider les documents--></th>
    <th>
       <!--
 <input type="checkbox" name="validdoc[]" <?php if($classacces->Is_Acces($mod,$mod,'validdoc')) echo "checked=''" ?> value="<?php echo $mod ?>" />
-->
    </th>
    </tr>
    <tr>
		<th align="center" >MENU</th>
        <th align="center" width="8%">CONTACT</th>
		<th align="center" width="12%">MESSAGERIE</th>
        <th align="center" width="12%">FICHE VISITEUR</th>
        <th align="center" width="12%">COURRIERS</th> 
        <th align="center" width="5%">CHAT</th> 
        <th align="center" width="10%">EMAILING</th>
    </tr>
    </thead>
    <tbody>
<?php
foreach($groupeliste as $tabgroupeliste)
{
						$ligne++;
?>
	<tr bgcolor="<?php echo $bgcolor ?>">
		<td align="left">
		<?php echo stripslashes($tabgroupeliste['lib_grpe']); ?>
		</td>
        <td align="left">
	    <input type="checkbox"  name="contactextern[]" <?php if($classacces->Is_Acces($mod,$tabgroupeliste['id_grpe'],'contactextern')) echo "checked=''" ?> value="<?php echo $tabgroupeliste['id_grpe'] ?>" />
		</td>
		<td align="left">
	    <input type="checkbox"  name="mail[]" <?php if($classacces->Is_Acces($mod,$tabgroupeliste['id_grpe'],'mail')) echo "checked=''" ?> value="<?php echo $tabgroupeliste['id_grpe'] ?>" />
		</td>
        <td align="left">
		 <input type="checkbox" name="visiteur[]" <?php if($classacces->Is_Acces($mod,$tabgroupeliste['id_grpe'],'visiteur')) echo "checked=''" ?> value="<?php echo $tabgroupeliste['id_grpe'] ?>" />
		</td>
        <td align="left">
		 <input type="checkbox" name="courrier[]" <?php if($classacces->Is_Acces($mod,$tabgroupeliste['id_grpe'],'courrier')) echo "checked=''" ?> value="<?php echo $tabgroupeliste['id_grpe'] ?>" />
		</td> 
        <td align="left">
		 <input type="checkbox" name="chat[]" <?php if($classacces->Is_Acces($mod,$tabgroupeliste['id_grpe'],'chat')) echo "checked=''" ?> value="<?php echo $tabgroupeliste['id_grpe'] ?>" />
		</td>
        <td align="left">
		 <input type="checkbox" name="emailing[]" <?php if($classacces->Is_Acces($mod,$tabgroupeliste['id_grpe'],'emailing')) echo "checked=''" ?> value="<?php echo $tabgroupeliste['id_grpe'] ?>" />
		</td>
        
	</tr>
<?php
}//Fin while
?>
</tbody>
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