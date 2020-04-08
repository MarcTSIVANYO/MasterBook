<?php
/**
 * @author NepsterJay
 * @copyright 2014
 */
?>
<div class="row-fluid">
<div class="span12">
<div class="head clearfix">
                        <div class="isw-chats"></div>
                        <h1><?php echo $_SESSION['appmail']['chatwith']['nom']?></h1>
                        
</div>
<div class="block messaging">
<div id="chatbody">
<?php appendchatbodypage();?>
</div>
<div class="controls">
    <div class="control">
    <textarea onkeydown="javascript:return keydowntextarea(event)"  id="composerMessage" to='<?php echo $_GET['chatwith'];?>' name="message" placeholder="Ecrivez votre message..." onclick="voirchat(<?php echo $_GET['chatwith'];?>)"  style="height: 70px; width: 100%;"></textarea>
    </div>
    <button onclick="insertchat()" class="btn">Envoyer</button>
</div>    
</div>
</div> 
</div>           