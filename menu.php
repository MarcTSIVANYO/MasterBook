 
<div class="breadLine">            
    <div class="arrow"></div>
    <div class="adminControl active">
        Connect&eacute;
    </div>
</div>
        
<div class="admin">
    <div class="image">
        <img style="width: 50px; height: 50px;" src="profil/<?php echo $_SESSION['appmail']['myphoto']?>" class="img-polaroid"/>                
    </div>
    <ul class="control">   
        <li><span class="icon-user"></span> <?php echo stripslashes($_SESSION['appmail']['myname']) ?></li>

        <li><span class="icon-cog"></span> <a href="javascript:openwindows('profile.php',960,500)">Profil</a></li>
        <li><span class="icon-share-alt"></span> <a href="?logout=1">D&eacute;connexion</a></li>
    </ul>
    <div class="info">
        <span></span>
    </div>
</div>


<ul class="navigation">
 
       <li <?php if(!$_GET['display']) echo 'class="active"' ?>>
          <a href="index.php">
              <span class="isw-documents"></span><span class="text">INFORMATIONS</span>
          </a>
      </li> 

    <?php if($classacces->Is_Acces_Menu($_SESSION['appmail']['id_pers'],'visiteur')){?>
       <li <?php if(PAGE=='pagevisiteur' ){echo "class='active openable'";}else{echo "class='openable'";} ?>>
              <a href="#">
                  <span class="isw-text_document"></span><span class="text">VISITEURS</span>
              </a>
        <ul>
          <li <?php if($_GET['display']=='visiteur' ) echo 'class="active"' ?> ><a href="?page=pagevisiteur&display=visiteur"><span class="icon-bookmark"></span><span class="text">Fiche des visiteurs</span></a></li>
          <li <?php if($_GET['display']=='mes_visites' ) echo 'class="active"' ?> ><a href="?page=pagevisiteur&display=mes_visites"><span class="icon-th-large"></span><span class="text">Mes visites</span></a></li>
        </ul>
      </li>
    <?php }?>
    <?php if($classacces->Is_Acces_Menu($_SESSION['appmail']['id_pers'],'courrier')){?>
        <li <?php if(PAGE=='pagecourrier' ){echo "class='active openable'";}else{echo "class='openable'";} ?>>
                <a href="#">
                    <span class="isw-list"></span><span class="text">COURRIERS</span>
                </a>
          <ul>
            <li <?php if($_GET['display']=='courriers_depart' ) echo 'class="active"' ?> ><a href="?page=pagecourrier&display=courriers_depart"><span class="icon-list"></span><span class="text">Courriers D&eacute;parts</span></a></li>
            <li <?php if($_GET['display']=='courriers_arrivee' ) echo 'class="active"' ?> ><a href="?page=pagecourrier&display=courriers_arrivee"><span class="icon-list"></span><span class="text">Courriers Arriv&eacute;s</span></a></li>
            </ul>
    <?php }?> 
    <?php if($classacces->Is_Acces_Menu($_SESSION['appmail']['id_pers'],'mail'))
{?>
      <li <?php if(PAGE=='pagenote' ){echo "class='active openable'";}else{echo "class='openable'";} ?>>
              <a href="#">
                  <span class="isw-chat"></span>
                  <span class="text">MESSAGERIES  
                  <?php 
                    $count=$classemail->NombreMsgNonLu($_SESSION['appmail']['id_pers']);
                    if($count){
                  ?>
                    <span id="msglu" style="background-color: #A5302C;" class="badge msg">
                      <?php echo $count ?> 
                    </span>
                  <?php } ?>
                  </span>
              </a>
        <ul>
          <li <?php if($_GET['display']=='compose' ) echo 'class="active"' ?> ><a href="javascript:openwindows('compose.php',960,500)"><span class="icon-pencil"></span><span class="text"> Nouveau message</span></a></li>
          <li <?php if($_GET['display']=='inbox' ) echo 'class="active"' ?> ><a href="?page=pagenote&display=inbox"><span class="icon-th-large"></span><span class="text"> Messages re&ccedil;us <span id="msglu" style="background-color: #A5302C;" class="badge msg"><?php echo $classemail->NombreMsgNonLu($_SESSION['appmail']['id_pers'])?></span></span></a></li>
          <li <?php if($_GET['display']=='sent') echo 'class="active"' ?>><a href="?page=pagenote&display=sent" ><span class="icon-th-large"></span><span class="text"> Messages envoy&eacute;s</span></a></li>
          <li <?php if($_GET['display']=='recommandation_courrier_mine' ) echo 'class="active"' ?> ><a href="?page=pagenote&display=recommandation_courrier_mine"><span class="icon-list"></span><span class="text">Courriers recommander</span></a></li>
          
         </ul>
      </li>
    <?php }?>

    <?php if($classacces->Is_Acces_Menu($_SESSION['appmail']['id_pers'],'contactextern'))
{?>
      <li <?php if(PAGE=='grpcontact' ){echo "class='active openable'";}else{echo "class='openable'";} ?>>
              <a href="#">
                  <span class="isw-users"></span><span class="text">CONTACTS</span>
              </a>
        <ul>
        
            <li <?php if($_GET['display']=='contactextern' ) echo 'class="active"' ?> ><a href="?page=grpcontact&display=contactextern"><span class="icon-user"></span><span class="text">Contacts</span></a></li>
      <li <?php if($_GET['display']=='groupecontact') echo 'class="active"' ?>><a href="?page=grpcontact&display=groupecontact" ><span class="icon-bookmark"></span><span class="text">Groupe</span></a></li> 
         </ul>
      </li>
    <?php }?>
 

   <?php if($classacces->Is_Acces_Menu($_SESSION['appmail']['id_pers'],'emailing')){?>
      <li <?php if(PAGE=='pageemailing' ){echo "class='active openable'";}else{echo "class='openable'";} ?>>
              <a href="#">
                  <span class="isw-mail"></span><span class="text">EMAILING</span>
              </a>
        <ul>
          <li <?php if($_GET['display']=='composeemailing' ) echo 'class="active"' ?> ><a href="javascript:openwindows('emailing.php',960,500)"><span class="icon-pencil"></span><span class="text">Nouveau emailing</span></span></a></li>
          <li <?php if($_GET['display']=='sentemailing') echo 'class="active"' ?>><a href="?page=pageemailing&display=sentemailing" ><span class="icon-list"></span><span class="text">Emailing envoy&eacute;</span></span></a></li>
         </ul>
      </li>
     <?php }?>   
  <?php if($classacces->Is_Acces_Menu($_SESSION['appmail']['id_pers'],'para')){
     ?>
     <li <?php if(PAGE=='para' ){echo "class='active openable'";}else{echo "class='openable'";} ?>>
        <a href="#">
            <span class="isw-settings"></span><span class="text">PARAMETRES</span>
        </a>
        <ul>
          <li <?php if($_GET['display']=='departement') echo 'class="active"' ?>><a href="?page=para&display=departement" ><span class="icon-th-large"></span><span class="text">D&eacute;partement</span></a></li>
          <li <?php if($_GET['display']=='groupe') echo 'class="active"' ?>><a href="?page=para&display=groupe" ><span class="icon-list"></span><span class="text">Services</span></a></li> 
          <li <?php if($_GET['display']=='contact' ) echo 'class="active"' ?> ><a href="?page=para&display=contact"><span class="icon-user"></span><span class="text">Utilisateurs</span></a></li>
                 
        </ul>
     </li>
  <?php }?> 
</ul>
        
<div class="dr"><span class=""></span></div>

  <div class="widget-fluid">
      <div id="menuDatepicker"></div>
  </div>
        
        
        