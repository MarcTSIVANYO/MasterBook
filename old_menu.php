 
<div class="breadLine">            
            <div class="arrow"></div>
            <div class="adminControl active">
                <?php echo stripslashes($_SESSION['appmail']['myname']) ?>
            </div>
        </div>
        
        <div class="admin">
            <div class="image">
                <img style="width: 50px; height: 50px;" src="profil/<?php echo $_SESSION['appmail']['myphoto']?>" class="img-polaroid"/>                
            </div>
            <ul class="control">  
            <?php if($classacces->Is_Acces_Menu($_SESSION['appmail']['id_pers'],'chat')){?>            
                <li><span class="icon-comment"></span> <a href="javascript:ouvre_popup('chat/',960,1000,1)">Chat</a> <a href="#" user-data="<?php echo $_SESSION['appmail']['id_pers']?>" id="chatnonvu" class="caption red bg"></a></li>
                <?php }?>
                <li><span class="icon-cog"></span> <a href="javascript:openwindows('profile.php',960,500)">Profil</a></li>
                <li><span class="icon-share-alt"></span> <a href="?logout=1">D&eacute;connexion</a></li>
            </ul>
            <div class="info">
                <span></span>
            </div>
        </div>
        
        <ul class="navigation"> 
           
            <li <?php if(PAGE=='doc' ){echo "class='active openable'";}else{echo "class='openable'";} ?>>
                <a href="#">
                    <span class="isw-grid"></span><span class="text">DOCUMENTS</span>
                </a>
                 <ul>
                   <?php
                    $menu_type_document=$classdocument->liste_type_document(0,'',1);
                    foreach($menu_type_document as $tabmenu_type_document)
                    {
                        if($classdocument->Is_acces_document_type($tabmenu_type_document['id_type_doc'],$_SESSION['appmail']['id_pers'])){
                    ?>
                    <li <?php if($_GET['typedocument']==$tabmenu_type_document['id_type_doc']) echo 'class="active"' ?> >
                        <a href="?page=doc&display=type_document&typedocument=<?php echo $tabmenu_type_document['id_type_doc']?>"><span class="icon-th-large"></span><span class="text"><?php echo addslashes($tabmenu_type_document['intitule_type_doc'])?></span></a>
                    </li>                           
                    <?php
                         }
                    }
                    ?> 
                </ul>
            </li>
            
            
            <?php if($classacces->Is_Acces_Menu($_SESSION['appmail']['id_pers'],'contactextern'))
            {?>
                        <li <?php if(PAGE=='grpcontact' ){echo "class='active openable'";}else{echo "class='openable'";} ?>>
                                <a href="#">
                                    <span class="isw-grid"></span><span class="text">CONTACTS</span>
                                </a>
                          <ul>
                          
                              <li <?php if($_GET['display']=='contactextern' ) echo 'class="active"' ?> ><a href="?page=grpcontact&display=contactextern"><span class="icon-th-large"></span><span class="text">Contacts</span></a></li>
                  <li <?php if($_GET['display']=='groupecontact') echo 'class="active"' ?>><a href="?page=grpcontact&display=groupecontact" ><span class="icon-th-large"></span><span class="text">Groupe</span></a></li>
                  
                             
                           </ul>
                        </li>
            <?php }?>
            
            
            
            <?php if($classacces->Is_Acces_Menu($_SESSION['appmail']['id_pers'],'mail'))
            {?>
                        <li <?php if(PAGE=='pagenote' ){echo "class='active openable'";}else{echo "class='openable'";} ?>>
                                <a href="#">
                                    <span class="isw-grid"></span><span class="text">MESSAGERIES</span>
                                </a>
                          <ul>
                            <li <?php if($_GET['display']=='compose' ) echo 'class="active"' ?> ><a href="javascript:openwindows('compose.php',960,500)"><span class="icon-th-large"></span><span class="text"> Nouveau message</span></a></li>
                            <li <?php if($_GET['display']=='inbox' ) echo 'class="active"' ?> ><a href="?page=pagenote&display=inbox"><span class="icon-th-large"></span><span class="text"> Messages re&ccedil;us <span id="msglu" style="background-color: #A5302C;" class="badge msg"><?php echo $classemail->NombreMsgNonLu($_SESSION['appmail']['id_pers'])?></span></span></a></li>
                            <li <?php if($_GET['display']=='sent') echo 'class="active"' ?>><a href="?page=pagenote&display=sent" ><span class="icon-th-large"></span><span class="text"> Messages envoy&eacute;s</span></a></li>
                            <li <?php if($_GET['display']=='recommandation_courrier_mine' ) echo 'class="active"' ?> ><a href="?page=pagenote&display=recommandation_courrier_mine"><span class="icon-th-large"></span><span class="text">Courriers &agrave; traiter</span></a></li>
                            
                           </ul>
                        </li>
            <?php }?>
            
            
            <?php if($classacces->Is_Acces_Menu($_SESSION['appmail']['id_pers'],'visiteur')){?>
                         <li <?php if(PAGE=='pagevisiteur' ){echo "class='active openable'";}else{echo "class='openable'";} ?>>
                                <a href="#">
                                    <span class="isw-grid"></span><span class="text">FICHE DES VISITEURS</span>
                                </a>
                          <ul>
                            <li <?php if($_GET['display']=='visiteur' ) echo 'class="active"' ?> ><a href="?page=pagevisiteur&display=visiteur"><span class="icon-th-large"></span><span class="text">Fiche des visiteurs</span></a></li>
                            <li <?php if($_GET['display']=='mes_visites' ) echo 'class="active"' ?> ><a href="?page=pagevisiteur&display=mes_visites"><span class="icon-th-large"></span><span class="text">Mes visites</span></a></li>
                          </ul>
                        </li>
            <?php }?>
            
            <?php if($classacces->Is_Acces_Menu($_SESSION['appmail']['id_pers'],'courrier')){?>
                        <li <?php if(PAGE=='pagecourrier' ){echo "class='active openable'";}else{echo "class='openable'";} ?>>
                                <a href="#">
                                    <span class="isw-grid"></span><span class="text">COURRIERS</span>
                                </a>
                          <ul>
                            <li <?php if($_GET['display']=='courriers_depart' ) echo 'class="active"' ?> ><a href="?page=pagecourrier&display=courriers_depart"><span class="icon-th-large"></span><span class="text">Courriers D&eacute;part</span></a></li>
                            <li <?php if($_GET['display']=='courriers_arrivee' ) echo 'class="active"' ?> ><a href="?page=pagecourrier&display=courriers_arrivee"><span class="icon-th-large"></span><span class="text">Courriers Arriv&eacute;s</span></a></li>
                            </ul>
                        
                         <?php }?>
            
            
            <?php if($classacces->Is_Acces_Menu($_SESSION['appmail']['id_pers'],'sms')){?>
                        <li <?php if(PAGE=='pagesms' ){echo "class='active openable'";}else{echo "class='openable'";} ?>>
                                <a href="#">
                                    <span class="isw-grid"></span><span class="text">SMS</span>
                                </a>
                            <ul>
                                <li <?php if($_GET['display']=='smsenvoye' ) echo 'class="active"' ?> ><a href="javascript:openwindows('smsenvoye.php',960,500)"><span class="icon-th-large"></span><span class="text">Nouveau SMS</span></a></li>
                                <li <?php if($_GET['display']=='smsliste') echo 'class="active"' ?>><a href="?page=pagesms&display=smsliste" ><span class="icon-th-large"></span><span class="text"> SMS envoy&eacute;s</span></a></li>
                            </ul>
                        </li>
                       <?php }?>
            
            
            
            
            
            
            
            
            
            
            
            
            
             <?php if($classacces->Is_Acces_Menu($_SESSION['appmail']['id_pers'],'emailing')){?>
                        <li <?php if(PAGE=='pageemailing' ){echo "class='active openable'";}else{echo "class='openable'";} ?>>
                                <a href="#">
                                    <span class="isw-grid"></span><span class="text">EMAILING</span>
                                </a>
                          <ul>
                            <li <?php if($_GET['display']=='composeemailing' ) echo 'class="active"' ?> ><a href="javascript:openwindows('emailing.php',960,500)"><span class="icon-th-large"></span><span class="text">Nouveau emailing</span></span></a></li>
                            <li <?php if($_GET['display']=='sentemailing') echo 'class="active"' ?>><a href="?page=pageemailing&display=sentemailing" ><span class="icon-th-large"></span><span class="text">Emailing envoy&eacute;</span></span></a></li>
                           </ul>
                        </li>
                         <?php }?>
            
            
            
            
            
            
            
             <?php if($classacces->Is_Acces_Menu($_SESSION['appmail']['id_pers'],'para')){
             ?>
             <li <?php if(PAGE=='para' ){echo "class='active openable'";}else{echo "class='openable'";} ?>>
                <a href="#">
                    <span class="isw-grid"></span><span class="text">PARAMETRES</span>
                </a>
                <ul>
                  <li <?php if($_GET['display']=='scatdoc' ) echo 'class="active"' ?> ><a href="?page=para&display=scatdoc"><span class="icon-th-large"></span><span class="text">Titre document</span></a></li>
                  <li <?php if($_GET['display']=='catdoc' ) echo 'class="active"' ?> ><a href="?page=para&display=catdoc"><span class="icon-th-large"></span><span class="text">Cat&eacute;gorie de documents</span></a></li>
                  <li <?php if($_GET['display']=='typedoc' ) echo 'class="active"' ?> ><a href="?page=para&display=typedoc"><span class="icon-th-large"></span><span class="text">Type de documents</span></a></li>
                            
                  <li <?php if($_GET['display']=='contact' ) echo 'class="active"' ?> ><a href="?page=para&display=contact"><span class="icon-th-large"></span><span class="text">Contacts</span></a></li>
                  <li <?php if($_GET['display']=='groupe') echo 'class="active"' ?>><a href="?page=para&display=groupe" ><span class="icon-th-large"></span><span class="text">Groupe</span></a></li>
                  <li <?php if($_GET['display']=='departement') echo 'class="active"' ?>><a href="?page=para&display=departement" ><span class="icon-th-large"></span><span class="text">Poste</span></a></li>        
                </ul>
             </li>
            <?php }?>    
            
        </ul>
        
        
        
        