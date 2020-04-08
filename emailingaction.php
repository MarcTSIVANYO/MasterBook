<?php 
if(!empty($_POST['destinataire_msg'])){
if($_FILES['attache_msg']){
    $nbr_fichier=count($_FILES['attache_msg']['name']);
    $attache_msg='';
    for($key=0;$key<=$nbr_fichier;$key++ ){
        $tmp_name = $_FILES["attache_msg"]["tmp_name"][$key];
        $path_parts = pathinfo($_FILES['attache_msg']['name'][$key]);
        $cle=md5($_FILES['attache_msg']['name'][$key].time());
        $file=$cle.'.'.$path_parts['extension'];
        $fichiername=DOSSIER_ATTACHE."/".$file;
        if(!is_dir(DOSSIER_ATTACHE)) mkdir(DOSSIER_ATTACHE);
        if(move_uploaded_file($tmp_name, $fichiername)){
                    $attache_msg.=$file.'|';
         }
    }
    $attache_msg=substr($attache_msg, 0, strlen($attache_msg)-1);
    //$texte_msg=$_POST[''];
}
foreach($_POST['destinataire_msg'] as $key=>$val){
   $destinataire_msg[]=$val; 
}
$texte_msg=addslashes($_POST['texte_msg']);
$objet_msg=addslashes($_POST['objet_msg']);
$token=$_SESSION['appmail']['token'];
$id_pers=$_SESSION['appmail']['id_pers'];
$option=array("objet_msg"=>$objet_msg,
                        "texte_msg"=>$texte_msg,
                        "attache_msg"=>$attache_msg,
                        "token"=>$token,
                        "id_pers"=>$id_pers
);

$classemailing->msg_compose($id_pers,$destinataire_msg,$token,$option);

//print_r($destinataire_msg);
?>
<script type="text/javascript">
<!--
	closewindows2('pageemailing','sentemailing');//window.location="?display=inbox";
-->
</script>
<?php
	}
?>