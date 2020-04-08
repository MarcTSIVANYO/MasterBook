<?php
include('config.php');
include('header.php');

$id_courrier=$_GET['id_courrier'];



if(!empty($_POST['destinataire'])){
    $destinataire=array();
   foreach($_POST['destinataire'] as $key=>$val){
      $destinataire[]=$val; 
    } 
  
  $options=array("id_courrier"=>$id_courrier,
              "recommandation"=>addslashes($_POST['recommandation']),
              "id_courrier_recommandation"=>""
              );
  
      $result=$classarrivee->insertion_courrier_recommandation($destinataire,$options);
         echo '<script type="text/javascript">
                        opener.location.reload();
                        self.close()
                        </script>';

      if($result){
        $notification="<div class='alert alert-info'>                
            <h4>Success!</h4>
            Op&eacute;ration &eacute;ffectu&eacute;e avec succ&egrave;s.
                  </div>";
        }else{
          $notification="<div class='alert alert-danger'>                
                      <h4>Erreur!</h4>
                      Aucune Op&eacute;ration  &eacute;ffectu&eacute;e.
                  </div>";
              }
        }
 
$courrier=$classarrivee->liste_courrier_recommandation_pour_ce_courrier($id_courrier,0,'',1);
$destinataire_courrier=array();
foreach($courrier as $tabcourrier)
{
    $destinataire_courrier[]=$tabcourrier['id_pers']; 
    $recommandation=$tabcourrier['recommandation'];
}


$classperson=new Person();
$sqlto=$classperson->ListeAccesPerson($_SESSION['appmail']['id_pers'],'mail',$ligne=0,$trie='',$visible=1);
?>
<div class="modal" style="width: 99%;left: 0;right: 0px;top: 0%;margin: 0 auto;height: 550px;">
<div class="modal-header"><h3>Recommandations</h3> 
</div>
<div class="modal-body">
<div style="margin: 0 auto;width: 50%;text-align: center;"><?php echo $error?></div>
<form id="myForm" name="formulaire" action="" enctype="multipart/form-data" method="post" onsubmit="return validform();">
  <table class="table">
  <?php 
        if($notification){
          echo"<caption>".$notification."</caption>";
        } 
  ?>
                <tr>
                   <td class="control-td" for="inputRecipients">To</td>
                   <td>
                      <select name="destinataire[]"  data-placeholder="Destinataires" class="chosen-select span12"  multiple="multiple" >
                      <option  disabled="" value=" ">- Destinataires -</option> 
                      <?php foreach($sqlto as $tabto){?>
                            <option <?php if(in_array($tabto['id_pers'],$destinataire_courrier)) echo'selected=""' ?> value="<?php echo $tabto['id_pers'] ?>"><?php echo $tabto['nom'] ?></option>
                      <?php }?>
                      </select>
                    </td>
                </tr>
            <tr>
                <td>
                  Note 
                </td>
                <td>
                  <textarea name="recommandation" class="input-block-level">
                    <?php echo stripcslashes($recommandation);?>                
                  </textarea>
                </td>
            </tr>
  </table>
            </form>
        </div>
        <div class="footer">
        <a href="#" onclick="document.getElementById('myForm').submit()" class="btn btn-success"><i class="icon-ok"></i> Valider</a>
            <button class="btn" onclick="closewindows()">Fermer</button> 
        </div>
</div>
</div>
