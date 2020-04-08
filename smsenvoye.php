<?php
include('config.php');
include('header.php');
 
if($_POST['message']){
    $message=$_POST['message'];
   foreach($_POST['numero'] as $value){
        $result=$classSMS->send($value,$message,'228');
        $tab=json_decode($result, true);
        if($tab['msgId']!=""){
          $classSMS->InsertInDB($value,$message,$tab['msgId']); 
        }else{
            $result="<b style='color:red'>Sms non envoye...</b>";
        }
        
    } 
}


$classperson=new Person();
$sqlto=$classperson->ListeAccesSmSPerson($_SESSION['appmail']['id_pers'],$ligne=0,$trie='',$visible=1);
?>
<div  class="modal" style="width: 99%;left: 0;right: 0px;top: 0%;margin: 0 auto;height:550px;">
        <div class="modal-header">
        Nouveau sms
        </div>
        <div class="modal-body">
        <div style="margin: 0 auto;width: 50%;text-align: center;"><?php echo $result?></div>
            <form id="myForm" method="post"   enctype="multipart/form-data" class="form-horizontal">
            <table class="table">
                <tr>
                   <td>Destinataires</td>
                   <td>
                      <select  required="" name="numero[]"    data-placeholder="Destinataires" class="selectinput span12"  multiple="multiple" >
                      <?php foreach($sqlto as $tabto){
                        ?>
                            <option value="<?php echo $tabto['id_pers'] ?>"><?php echo $tabto['nom'] ?></option>
                      <?php }?>
                      </select>
                    </td>
                </tr>
                <tr>
                    <td>Message</td>
                    <td>
                    <textarea  required=""  style="width: 100%;" name="message"  id="message" class=""></textarea>
                    </td>
                </tr>
            </table>
            </form>
        </div>
        <div class="modal-footer">
        <button onclick="document.getElementById('myForm').submit()" class="btn btn-primary" >Valider</button> 
            <button class="btn" onclick="closewindows2('pagesms','smsliste')">Fermer</button>  
        </div>
</div>