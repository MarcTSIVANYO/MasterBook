<?php
include('config.php');
include('header.php');
include('compose_action.php');
$classperson=new Person();
$sqlto=$classperson->ListeAccesPerson($_SESSION['appmail']['id_pers'],'mail',$ligne=0,$trie='',$visible=1);

  
?>
<div class="modal" style="width: 99%;left: 0;right: 0px;top: 0%;margin: 0 auto;height:550px;">
<div class="modal-header"><h3>Nouveau message</h3></div>
<div class="modal-body">
          <form id="myForm" method="post"  enctype="multipart/form-data" class="form-horizontal">
            <table class="table">
            <?php 
                  if($notification){
                    echo"<caption>".$notification."</caption>";
                  } 
            ?>
                <tr>
                   <td class="control-td" for="inputRecipients">Destinataires</td>
                   <td>
                      <select name="destinataire_msg[]"  data-placeholder="Destinataires" style="font-weight: normal;" class="selectinput span12"  multiple="multiple" >
                      <?php foreach($sqlto as $tabto){?>
                            <option value="<?php echo $tabto['id_pers'] ?>"><?php echo $tabto['nom'] ?></option>
                      <?php }?>
                      </select>
                    </td>
                </tr>
                <tr>
                    <td class="control-td" for="inputSubject">Objet</td>
                    <td>
                       <input type="text" name="objet_msg" class="input-block-level" id="inputSubject" placeholder="Objet"/>
                    </td>
                </tr>
                <tr>
                    <td class="control-td" for="inputSubject">Fichier(s)</td>
                    <td>
                       <input type="file" name="attache_msg[]" multiple=""/>
                    </td>
                </tr>
            <tr>
                <td colspan="2">
                <textarea name="texte_msg" id="compose-textarea"  class="input-block-level">
                                          
                </textarea>
                </td>
            </tr>
            </table>
            </form>
        </div>
<div class="modal-footer">
            <button onclick="document.getElementById('myForm').submit()" class="btn btn-primary" >Valider</button>
            <button class="btn" onclick="closewindowscompose()">Fermer</button>             
</div>
</div>
