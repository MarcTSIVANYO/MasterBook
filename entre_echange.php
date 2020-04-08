<?php
include('config.php');
include('header.php');
if(count($_GET['mod'])  && sans_espace($_GET['mod'])!=""){
        $mod=$_GET['mod'];
}
if($_POST['mod']){
    $mod=$_POST['mod'];
    $classacces_entre_echange->SuppAvantInsertion($mod,'sms');
     $classacces_entre_echange->SuppAvantInsertion($mod,'mail');
     $classacces_entre_echange->SuppAvantInsertion($mod,'chat');
     $classacces_entre_echange->SuppAvantInsertion($mod,'para');
     
     $classacces_entre_echange->SuppAvantInsertion($mod,'courrier');
     $classacces_entre_echange->SuppAvantInsertion($mod,'visiteur');
     $classacces_entre_echange->SuppAvantInsertion($mod,'document');
     $classacces_entre_echange->SuppAvantInsertion($mod,'validdoc');
     
    if($_POST['mail']){
            foreach($_POST['mail'] as $mailvalue){
                $classacces_entre_echange->insertion(array("id_grpe"=>"$mod",
                        "autre_grpe"=>"$mailvalue",
                        "session"=>"mail"
                            ));
            }
    }
    
    
    if($_POST['emailing']){
            foreach($_POST['emailing'] as $emailingvalue){
                $classacces_entre_echange->insertion(array("id_grpe"=>"$mod",
                        "autre_grpe"=>"$emailingvalue",
                        "session"=>"emailing"
                            ));
            }
    }
    
    
    
    if($_POST['sms']){
        
        {
            foreach($_POST['sms'] as $smsvalue){
                $classacces_entre_echange->insertion(array("id_grpe"=>"$mod",
                        "autre_grpe"=>"$smsvalue",
                        "session"=>"sms"
                            ));
            }
        }
    }
    
    if($_POST['chat']){
        {
            foreach($_POST['chat'] as $chatvalue){
                $classacces_entre_echange->insertion(array("id_grpe"=>"$mod",
                        "autre_grpe"=>"$chatvalue",
                        "session"=>"chat"
                            ));
            }
        }
    }
    
    if($_POST['visiteur']){
        {
            foreach($_POST['visiteur'] as $visiteurvalue){
                $classacces_entre_echange->insertion(array("id_grpe"=>"$mod",
                        "autre_grpe"=>"$visiteurvalue",
                        "session"=>"visiteur"
                            ));
            }
        }
    }
    
    if($_POST['courrier']){
        {
            foreach($_POST['courrier'] as $courriervalue){
                $classacces_entre_echange->insertion(array("id_grpe"=>"$mod",
                        "autre_grpe"=>"$courriervalue",
                        "session"=>"courrier"
                            ));
            }
        }
    }
    
    
    
    
    
    
    if($_POST['para']){
        {
            foreach($_POST['para'] as $paravalue){
                $classacces_entre_echange->insertion(array("id_grpe"=>"$mod",
                        "autre_grpe"=>"$paravalue",
                        "session"=>"para"
                            ));
            }
        }
    }
    
    
    if($_POST['document']){
            foreach($_POST['document'] as $documentvalue){
                $classacces_entre_echange->insertion(array("id_grpe"=>"$mod",
                        "autre_grpe"=>"$documentvalue",
                        "session"=>"document"
                            ));
            }
    }
    if($_POST['validdoc']){
            foreach($_POST['validdoc'] as $validdocvalue){
                $classacces_entre_echange->insertion(array("id_grpe"=>"$mod",
                        "autre_grpe"=>"$validdocvalue",
                        "session"=>"validdoc"
                            ));
            }
    }
    
    
   
   $error='<div class="alert alert-block alert-success">Enr&eacute;gistrement effectu&eacute;</div>';
    
    
    echo '<script type="text/javascript">
                opener.location.reload();
                </script>';
    
}
//print_r($_POST);
?>
<style>
input[type=text]{
    height: 30px;
}
</style>

<div class="modal" style="width: 99%;left: 0;right: 0px;top: 0%;margin: 0 auto;height:550px;">
<div class="modal-header"><h3><?php
     $groupeinfo=$classgroupe->InfoSur($mod);
     echo strtoupper("DEPARTEMENT : ".$groupeinfo['lib_grpe'].' peut echanger avec :');
   ?> </h3></div>
<div class="modal-body">
<form id="myForm" name="formulaire" action="" method="post" onsubmit="return validform();">
<div style="margin: 0 auto;width: 50%;text-align: center;"><?php echo $error?></div>
<input name="mod" type="hidden"  <?php  if(sans_espace($mod)=="") echo('disabled=""') ?> value="<?php echo $mod; ?>" />
<?php
     $groupeliste=$classgroupe->liste();
   ?> 

<table class="table">
    <thead>
    <tr>
		<th align="center" >SERVICE</th>
		<th align="center" width="15%">NOTE</th>
        <th align="center" width="15%">SMS</th>
        <th align="center" width="15%">CHAT</th>
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
	    <input type="checkbox"  name="mail[]" <?php if($classacces_entre_echange->Is_Acces($mod,$tabgroupeliste['id_grpe'],'mail')) echo "checked=''" ?> value="<?php echo $tabgroupeliste['id_grpe'] ?>" />
		</td>
        <td align="left">
		 <input type="checkbox" name="sms[]" <?php if($classacces_entre_echange->Is_Acces($mod,$tabgroupeliste['id_grpe'],'sms')) echo "checked=''" ?> value="<?php echo $tabgroupeliste['id_grpe'] ?>" />
		</td>

        <td align="left">
		 <input type="checkbox" name="chat[]" <?php if($classacces_entre_echange->Is_Acces($mod,$tabgroupeliste['id_grpe'],'chat')) echo "checked=''" ?> value="<?php echo $tabgroupeliste['id_grpe'] ?>" />
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