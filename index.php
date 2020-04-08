<?php
include("./config.php");
if($_GET['logout']){
        $deconnecte=$classperson->deconnecte($_SESSION['appmail']['id_pers']);
        @session_destroy();
        header("location:login.php");
        exit();
}

$active=$classactive->currentActive()->fetch();  
$id=$active["id_active"]; 
if($active){ 
    $now=date("d-m-Y");
    //$fin=date('d-m-Y',$active["date_fin"]);
    $fin=$active["date_fin"]; 
    $dureesejour = (strtotime($fin) - strtotime($now));  
    $delai=$dureesejour/86400; 
    if($delai>1){
        if($delai<11){ $_SESSION['expiration']=$delai; }
        if(!isset($_SESSION['appmail']['login'])){
          header("location:login.php");  
          exit();
        }
    }else{ 
        header("location:active.php");  
        exit(); 
    }
}else{
    header("location:active.php");  
    exit();
}



$_SESSION['appmail']['display']=$_GET['display'];
define(DISPLAY,$_GET['display']);
define(PAGE,$_GET['page']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include('header.php') ?>
</head>
<body>
<div class="wrapper green">
    
    <div class="header">
        <a class="logo" href="index.php"><img src="img/logo.png" alt="MasterBook -  Partages & Echanges" title="MasterBook - Moteur de Partages & Echanges"/></a>          
            <ul class="header_menu">
                <li class="list_icon"><a href="#">&nbsp;</a></li>
                <li class="settings_icon">
                    <a href="#" class="link_themeSettings">&nbsp;</a> 
                </li>
            </ul>    
        </div>
    <div class="menu">                
        <?php include('menu.php') ?>
    </div>
        
    <div class="content">
         <div class="breadLine"> 
                <?php if($_SESSION['expiration']){ ?>
                    <ul class="breadcrumb">
                        <li style="padding-left: 20px;">Votre licence s'expire dans</li>                
                        <li style="color: red"> <?php echo $_SESSION['expiration'] ?>  jours</li>
                    </ul>
                <?php } ?> 
                <ul class="buttons">
                    <li>
                        <a href="#" class="link_bcPopupList"><span class="glyphicon glyphicon-user"></span><span class="text">En ligne</span></a>

                        <div id="bcPopupList" class="popup">
                            <div class="head clearfix">
                                <div class="arrow"></div>
                                <span class="isw-users"></span>
                                <span class="name">Liste des Utilisateurs</span>
                            </div>
                            <div class="body-fluid users">
                            <?php 
                                $userliste=$classperson->listeConnecte(1,'order by nom asc');
                                foreach ($userliste as $userlistevalue) { 
                                    $id=stripcslashes($userlistevalue["id_pers"]);
                                    $nom=stripcslashes($userlistevalue["nom"]);
                                    $photo=stripcslashes($userlistevalue["photo"]); 
                                    $fichier= "profil/".$photo;
                            ?>

                                <div class="item clearfix">
                                    <div class="image"><a href="javascript:void(0)"><img src="<?php echo $fichier; ?>" width="32"/></a></div>
                                    <div class="info">
                                        <a href="javascript:void(0)" class="name"><?php echo $nom; ?></a> 
                                        <?php if($_SESSION['appmail']['id_pers']==$id) echo " ( Vous ) " ?>
                                        <span>Connect&eacute;</span>
                                    </div>
                                </div>
                               <?php } ?>
                            </div>
                            <div class="footer"> 
                                <button class="btn btn-danger link_bcPopupList" type="button">Close</button>
                            </div>
                        </div>  
                    </li>    

                    <li>
                        <a href="?logout=1" title="D&eacute;connexion">Se D&eacute;connecter</a> 
                    </li>    
                </ul>

            </div>

         <div class="workplace">
             <?php include('displaycontent.php') ?>             
        </div>        
    </div> 

 </div> 
</body>
</html>
<script type="text/javascript">
</script>