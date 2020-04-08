 <?php
    include('config.php'); 
    if(count($_POST))
    { 
            $req=$classactive->toActive($_POST["pwd"],$_POST["code"]); 
            if($req->rowCount() > 0)
            { 
                $tabses=$req->fetch();
                $duree=$tabses['duree'];
                $id=$tabses['id_code'];                 
                $ladate=date('d-m-Y');
                $date_save=date('d-m-Y',strtotime('+'.$duree.' month',strtotime($ladate))); 
                $option=array("structure"=>addslashes($_POST['structure']),
                      "email"=>addslashes($_POST['email']),
                      "code"=>$id, 
                      "date_fin"=>$date_save,
                      "active"=>"1"
                  );  
                $insert=$classactive->insertion($option);
                if($insert){  
                    $des=$classactive->desactive($id); 
                    $suivant=1;
                }
                 
            }else
            {
                $n="Compte Administrateur ou Code d' activation incorrect";
                $operationalert="<b style='color:red'>Informations incorrectes. Veuillez contacter le fournisseur. </b>"; 
            } 

        
    }
?>
<!DOCTYPE html>
<html>
<head>
 
<meta charset="utf-8">
 <title>MasterBook-Activation</title>
<meta name="keywords" content=""/>
<meta name="description" content="">
<meta name="author" content="Suivi des suffrages">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
 
<script type="text/javascript"> </script>
<link rel="stylesheet" type="text/css" href="assets/skin/default_skin/css/ie_split1.css">
<link rel="stylesheet" type="text/css" href="assets/skin/default_skin/css/ie_split2.css">
<link rel="stylesheet" type="text/css" href="assets/skin/default_skin/css/ie_split3.css">
 
<link rel="stylesheet" type="text/css" href="assets/admin-tools/admin-forms/css/admin-forms.css">
 
<link rel="shortcut icon" href="img/favicon.png">
  
</head>
<body class="external-page sb-l-c sb-r-c">
 
<div id="main" class="animated fadeIn" style="background-color: #669999;">
 
<section id="content_wrapper" >
 
<section id="content">
<div class="admin-form theme-info" id="login1" style="margin-top:30px;">

<div  class="panel panel-success  mt10 br-n" style="padding-top: 20px;" >
<div class="row mb15 table-layout">
    <div class="col-xs-6 va-m pln">
        <a href="">
            <img src="img/active.png" title="MasterBook-Activation" class="img-responsive w250">
        </a>
    </div> 
</div>
 
<form method="post" action="" id="contact" style="border-top: 2px solid black">
<div class="panel-body bg-light p30">
<div class="row">
<div class="col-md-offset-2 col-sm-8"> 

<?php if(!$suivant){ ?>

    <div style="text-align: center;">
        <?php
            echo $operationalert;
             
        ?>
    </div>
    <div class="section">
        <label for="login" class="field-label text-muted fs18 mb10">Structure :</label>
        <label for="password" class="field prepend-icon">
            <input type="text" required="" name="structure"  class="gui-input" placeholder="Structure"> 
            <label for="password" class="field-icon"><i class="fa fa-user"></i></label>
        </label> 
    </div>
    <div class="section">
        <label for="login" class="field-label text-muted fs18 mb10">Email :</label>
        <label for="password" class="field prepend-icon">
            <input type="email" required="" name="email"  class="gui-input" placeholder="Email"> 
            <label for="password" class="field-icon"><i class="fa fa-envelope"></i></label>
        </label> 
    </div>
    <div class="section">
        <label for="login" class="field-label text-muted fs18 mb8 ">Mot de passe :</label>
        <label for="login" class="field prepend-icon">
            <input type="password" required="" name="pwd"  class="gui-input" placeholder="Administrateur"> 
            <label for="password" class="field-icon"><i class="fa fa-lock"></i></label>
        </label>
    </div>
    <div class="section">
        <label for="login" class="field-label text-muted fs18 mb8 ">Code d'activation :</label>
        <label for="login" class="field prepend-icon">
                 
            <input type="text" required="" name="code" id="code" class="gui-input" placeholder="Activation"> 
            <label for="password" class="field-icon"><i class="fa fa-lock"></i></label>
        </label>
    </div>
<?php }else{  ?>
    <div class="alert alert-info">                
        <h4>Success!</h4>
         Activation effectu&eacute;e avec succ&egrave;s
    </div>
    <div class="section">
        <label class="field-label text-muted fs18 mb8 ">Date d'expration :</label> 
        <label class="field-label text-muted fs18 mb8 "><?php echo $date_save; ?></label> 
    </div>
<?php }
?>

</div> 
</div>
</div>
 
<div class="panel-footer clearfix p10 ph15">
Version 1.0 
    <?php if($suivant){ ?>
        <a href="login.php" class="btn btn-primary mr10 pull-right" type="button">Connexion</a>
    <?php }else{ ?>
        <button type="submit" class="button btn-primary mr10 pull-right">Activer</button>
    <?php } ?>
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