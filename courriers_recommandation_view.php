<?php
include('top_page.php');
include('header.php');
 
$id_courrier_recommandation=$_GET['id_courrier_recommandation'];



$tabcourrier=$classarrivee->ma_recommandation_pour_ce_courrier($id_courrier_recommandation,$_SESSION['appmail']['id_pers']);
    $recommandation=stripcslashes($tabcourrier['recommandation']);
$classperson=new Person(); 
?>
<div class="social-box" style="margin: 10px auto;">
        <div style="border-bottom: 2px solid black; margin-bottom: 10px;">
             RECOMMANDATION
        </div>
        <div style="border: 1px solid blue; padding:20px;">
            <?php echo $recommandation;?>
        </div>
        
            
    </div> 

    <div class="social-box" style="margin: 10px auto;">
        
        <div class="footer">
            <button class="btn" onclick="closewindows()">Fermer</button>          
        </div>
    </div>
</div>
