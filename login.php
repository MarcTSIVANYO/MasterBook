<?php
include('config.php'); 
if(count($_POST))
	{

            $dbh = new Database();
    	 	$connectReq=$dbh->query("select * from person where login_pers='".$_POST['login']."' and pwd_pers='".$_POST['password']."'and visible=1") or die(mysql_error());
            
            if($connectReq->rowCount() > 0)
    		{
    		     $tabses=$connectReq->fetch();
                     $_SESSION['appmail']['id_pers']=$tabses['id_pers'];
             $_SESSION['appmail']['me']=$tabses['id_pers'];
             $_SESSION['appmail']['token']=md5(time()."_".$_SESSION['appmail']['id_pers']);
             $_SESSION['appmail']['login']=$tabses['login_pers'];
             $_SESSION['appmail']['mygroup']=$tabses['id_grpe'];
             $_SESSION['appmail']['username']=$tabses['username'];
             $_SESSION['appmail']['myphoto']=$tabses['photo'];
             $_SESSION['chatuser'] = $tabses['id_pers'];
             $_SESSION['chatuser_name'] = $tabses['nom']; //; Must be already set
             $_SESSION['appmail']['myname']=$tabses['nom'];
             $_SESSION['appmail']['timeconnect']=time();
             $connecte=$classperson->connecte($_SESSION['appmail']['id_pers']);
                     header("location:index.php");
        			exit();
                 
    		}else
    		{
    			$n='Login ou Mot de passe incorrect';
                $operationalert='<b style="color:red">Login ou Mot de passe incorrect. Veuillez r&eacute;essayer </b>'; 
    		} 

	    
	}


?>
<!DOCTYPE html>
<html>
<head>
 
<meta charset="utf-8">
 <title>MasterBook</title>
<meta name="keywords" content=""/>
<meta name="description" content="">
<meta name="author" content="Suivi des suffrages">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
 
<script type="text/javascript"> 
</script>
<link rel="stylesheet" type="text/css" href="assets/skin/default_skin/css/ie_split1.css">
<link rel="stylesheet" type="text/css" href="assets/skin/default_skin/css/ie_split2.css">
<link rel="stylesheet" type="text/css" href="assets/skin/default_skin/css/ie_split3.css">
 
<link rel="stylesheet" type="text/css" href="assets/admin-tools/admin-forms/css/admin-forms.css">
 
<link rel="shortcut icon" href="img/favicon.png">
  
</head>
<body class="external-page sb-l-c sb-r-c">
 
<div id="main" class="animated fadeIn" style="background-color: #669999;">
 
<section id="content_wrapper" >
 <!-- 
<div id="canvas-wrapper">
<canvas id="demo-canvas"></canvas>
</div> -->
 
<section id="content">
<div class="admin-form theme-info" id="login1" style="margin-top:30px;">

<div  class="panel panel-success  mt10 br-n" style="padding-top: 20px;" >
<div class="row mb15 table-layout">
    <div class="col-xs-6 va-m pln">
        <a href="" title="Return to Dashboard">
            <img src="img/eng.png" title="" class="img-responsive w250">
        </a>
    </div> 
</div>
 
<form method="post" action="" id="contact" style="border-top: 2px solid black">
<div class="panel-body bg-light p30">
<div class="row">
<div class="col-md-offset-2 col-sm-8"> 
<div style="text-align: center;">
    <?php
        echo $operationalert;
    ?>
</div>
<div class="section">
<label for="login" class="field-label text-muted fs18 mb8 ">Login :</label>
<label for="login" class="field prepend-icon">
    <input type="text" required="" name="login" id="login" class="gui-input" placeholder="Login">
    <label for="login" class="field-icon"><i class="fa fa-user"></i></label>
</label>
</div>
 
<div class="section">
<label for="login" class="field-label text-muted fs18 mb10">Mot de passe :</label>
<label for="password" class="field prepend-icon">
<input type="password" required="" name="password" id="password" class="gui-input" placeholder="Mot de passe">
<label for="password" class="field-icon"><i class="fa fa-lock"></i></label>
</label>
</div>
 
</div>
<!-- <div class="col-sm-5 br-l br-grey pl30">
<img src="img/b_logo.png" width="100%" />
</div> -->
</div>
</div>
 
<div class="panel-footer clearfix p10 ph15">
Version 1.0 <button type="submit" class="button btn-primary mr10 pull-right">Se Connecter</button>
</div>
 
</form>
</div>
</div>
</section>
 
</section>
 
</div>
 
 
 
<script type="text/javascript" src="vendor/jquery/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="vendor/jquery/jquery_ui/jquery-ui.min.js"></script>
 
<script type="text/javascript" src="assets/js/bootstrap/bootstrap.min.js"></script>
 
<script type="text/javascript" src="assets/js/pages/login/EasePack.min.js"></script>
<script type="text/javascript" src="assets/js/pages/login/rAF.js"></script>
<script type="text/javascript" src="assets/js/pages/login/TweenLite.min.js"></script>
<script type="text/javascript" src="assets/js/pages/login/login.js"></script>
 
<script type="text/javascript" src="assets/js/utility/utility.js"></script>
<script type="text/javascript" src="assets/js/main.js"></script>
<script type="text/javascript" src="assets/js/demo.js"></script>
 
<script type="text/javascript">
        jQuery(document).ready(function() {

            "use strict";

            // Init Theme Core      
            Core.init();

            // Init Demo JS
           // Demo.init();

            // Init CanvasBG and pass target starting location
            CanvasBG.init({
                Loc: {
                    x: window.innerWidth / 2,
                    y: window.innerHeight / 3.3
                },
            });


        });
    </script>
 
</body>
</html>