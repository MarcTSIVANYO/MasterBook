<?php

    function tronque($chaine, $longueur = 120)
    {
        $chaine=strip_tags($chaine);
        if (empty ($chaine))
        {
        return "";
        }
        elseif (strlen ($chaine) < $longueur)
        {
        return $chaine;
        }
        elseif (preg_match ("/(.{1,$longueur})\s./ms", $chaine, $match))
        {
        return $match [1] . "...";
        }
        else
        {
        return substr ($chaine, 0, $longueur) . "...";
    }
    }

/* Voici comment cela doit se faire désormais. */
    
    function tronque_old($str, $nb = 150) {
        //Pour enlever les balises HTML d'une chaîne de caractères
        $str=strip_tags($str);
        //convertir en utf-8;
        $str=($str);
      // Si le nombre de caractères présents dans la chaine est supérieur au nombre 
      // maximum, alors on découpe la chaine au nombre de caractères 
      if (strlen($str) > $nb) 
      {
        $str = substr($str, 0, $nb);
        $position_espace = strrpos($str, " "); //on récupère l'emplacement du dernier espace dans la chaine, pour ne pas découper un mot.
        $texte = substr($str, 0, $position_espace);  //on redécoupe à la fin du dernier mot
        $str = $texte." ..."; //puis on rajoute des ...
      }
      return $str; //on retourne la variable modifiée
    }
    

    function sans_accents($str)
    {
       //les accents
        $str = trim($str);
        $str = strtr($str,"ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ","AAAAAAaaaaaaOOOOOOooooooEEEEeeeeCcIIIIiiiiUUUUuuuuyNn");
        $str = preg_replace('#\&([A-za-z])(?:acute|cedil|circ|grave|ring|tilde|uml)\;#', '\1', $str);
        $str = preg_replace('#\&([A-za-z]{2})(?:lig)\;#', '\1', $str); // pour les ligatures e.g. '&oelig;'
        $str = preg_replace('#\&[^;]+\;#', '', $str); // supprime les autres caractères
        $str = str_replace("'"," ", $str);
        return $str;
    }
    
        /*** remplacement demot
        * @param $str Chaîne initiale
        * @param $out Chaîne à remplacer
        * @param $in Chaîne de remplacement
        * @return nouvelle Chaîne
        */
   function remplace_mot($str,$out,$in){
      return  str_replace($out, $in, $str); 
   }
   function sans_espace($str){
    $str = preg_replace('/\s/', '', $str);
    return $str;
   }
   
   /*** existance d'une sous chaine dans une chaine
        * @param $str_inclue sous chaine
        * @param $str Chaine initiale
        * @return true or false
        */
   function in_chaine($str_inclue,$str){
      return strpos(strtolower($str_inclue), strtolower($str))!== FALSE;
   }
 
 
function datesql_to_frenchdate($date_brute)
		{
		   
		    list($date,$heure)=explode(" ",$date_brute);
            $date=substr($date,0,10);
            list($year,$month,$day) = explode("-",$date);
            $date = "$day/$month/$year";
			//$months = array ("janvier","fevrier","mars","avril","mai","juin","juillet","aout","septembre","octobre","novembre","decembre");
			return $date;
		}
function frenchdate_to_datesql($date)
		{
            $date=substr($date,0,10);
            list($day,$month,$year) = explode("/",$date);
            $date = "$year-$month-$day";
			//$months = array ("janvier","fevrier","mars","avril","mai","juin","juillet","aout","septembre","octobre","novembre","decembre");
			return $date;
		}
   
   function complete_chaine($str,$str_lenght="",$pad_str="",$cote=""){
        $chaine= str_pad($str, $str_lenght, $cote);
        if(strtolower($cote)==='left') 
        $chaine= str_pad($str, $str_lenght, $pad_str, STR_PAD_LEFT);
        if(strtolower($cote)==='right') 
        $chaine= str_pad($str, $str_lenght, $pad_str, STR_PAD_RIGHT);
        if(strtolower($cote)==='both') 
        $chaine= str_pad($str, $str_lenght, $pad_str, STR_PAD_BOTH);
        return $chaine;  
   }
  
  
function YourLastMsgByToken($token){
    $sql=mysql_query("select max(id_msg) as lastidmsg from message where token='$token'");
    $tab=mysql_fetch_array($sql);
    return $tab['lastidmsg'];
}  

function NombreMsgNonLu($id_pers){
    $sql=mysql_query("select * from destinataire where id_pers='$id_pers' and lu='n'");
    $nb=mysql_num_rows($sql);
    return $nb;
}



function telecharger_fichier($fichier,$dossier=DOSSIER_ATTACHE)
{
 $chemin = $dossier."/". $fichier;
 $images_ext = array('jpg', 'jpeg', 'png', 'bmp', 'gif');
 if(file_exists($chemin) && is_file($chemin))
 {
  $path_parts = pathinfo($fichier);
  //$image_format = substr(strrchr($chemin, '.'), 1);
  $image_format=strtolower($path_parts['extension']);
  if(in_array($image_format, $images_ext))
   header('Content-Type: image/' . $image_format);
  else
  {
   header('Content-Description: File Transfer');
   header('Content-Type: application/octet-stream');
   header('Content-Disposition: attachment; filename=' . basename($chemin));
   header('Content-Transfer-Encoding: binary');
   header('Expires: 0');
   header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
   header('Pragma: public');
   header('Content-Length: ' . filesize($chemin));
  }
  readfile($chemin);
  exit;  
 }
}
  
  
   
function miniature($upload_dir,$upload_dir_mini,$filename,$texte,$largeurMiniatureImage=100,$hauteurMiniatureImage=100){
                     
                    
                   /*************************************/   
                  //La super fonction CREATION MINIATURES
                  /*************************************/
                  
                  //on nettoie le nom du fichier
                  // fonction clean à créer avec expressions regulières...
                  //$destfilename=$filename;//clean($filename);
                  
                  //echo $destfilename;

                  //$dest=$upload_dir.$destfilename.".tmp";
                  //$destImg=$upload_dir.$destfilename;
                  //$destMini=$upload_dir."mini/".$destfilename; // Ici mon dossier MINI se trouve dans le dossier image principal
                                    
                //création de la miniature
                $destfilename=$filename;
                $destImg=$upload_dir.$destfilename;
                $destMini=$upload_dir_mini.$destfilename;
                
                list($name,$filenameext)=explode('.', $filename);
                
                if(strtoupper($filenameext)=="JPEG")
                $img_in = imagecreatefromjpeg($destImg);
                if(strtoupper($filenameext)=="JPG")
                $img_in = imagecreatefromjpeg($destImg);
                
                if(strtoupper($filenameext)=="PNG")
                $img_in = imagecreatefrompng($destImg);
                
                if(strtoupper($filenameext)=="GIF")
                $img_in = imagecreatefromgif($destImg);
                
                $srcX = imagesx($img_in);
                $srcY = imagesy($img_in);
                
                //infos du fichier config
               /* $largeurMiniatureImage=100;
                $hauteurMiniatureImage=100;*/
                
                $img_out = imagecreatetruecolor($largeurMiniatureImage, $hauteurMiniatureImage);
                //$bgColor = imagecolorallocate($img_out ,45 ,30 ,45 ); // fond mauve fonce : #2d1e2d
                $bgColor = imagecolorallocate($img_out ,255 ,255,255 );
                imagefill($img_out,0,0,$bgColor);
                
                if (($srcX/$srcY)>($largeurMiniatureImage/$hauteurMiniatureImage)) {
                    $ratio=$srcX/$largeurMiniatureImage;
                    $newX=0;
                    $newHeight=($srcY/$ratio);
                    $newY=($hauteurMiniatureImage-$newHeight)/2;
                    imagecopyresampled($img_out,$img_in,$newX,$newY,0,0,$largeurMiniatureImage,$newHeight,$srcX,$srcY);
                    $color = imagecolorallocate($img_out, 255, 0, 0);
                } else {
                    $ratio=$srcY/$hauteurMiniatureImage;
                    $newWidth=($srcX/$ratio);
                    $newX=($largeurMiniatureImage-$newWidth)/2;
                    $newY=0;
                    imagecopyresampled($img_out,$img_in,$newX,$newY,0,0,$newWidth,$hauteurMiniatureImage,$srcX,$srcY);
                    $color = imagecolorallocate($img_out, 0, 0, 0);
                }
                 
                imagestring($img_out, 2, 1, 85, $texte, $color);
                if(strtoupper($filenameext)=="JPEG")
                imagejpeg($img_out,$destMini);
                
                if(strtoupper($filenameext)=="JPG")
                imagejpeg($img_out,$destMini);
                
                if(strtoupper($filenameext)=="PNG")
                imagepng($img_out,$destMini);
                
                if(strtoupper($filenameext)=="GIF")
                imagegif($img_out,$destMini);
                
                //redimentionnement si trop grand
                $largeurMaxImage=250;
                $hauteurMaxImage=200;
                
                if ($srcX>$largeurMaxImage | $srcY>$hauteurMaxImage ) {
                    $ratioX=$srcX/$largeurMaxImage;
                    $ratioY=$srcY/$hauteurMaxImage;
                    
                    $ratio=max($ratioX,$ratioY);
                    
                    $img_out = imagecreatetruecolor($srcX/$ratio, $srcY/$ratio);
                    //$bgColor = imagecolorallocate($img_out ,255 ,255 ,255 ); // fond blanc
                    $bgColor = imagecolorallocate($img_out ,255 ,255 ,255 ); // fond mauve fonce : #2d1e2d
                    imagefill($img_out,0,0,$bgColor);
                    
                    imagecopyresampled($img_out,$img_in,0,0,0,0,$srcX/$ratio,$srcY/$ratio,$srcX,$srcY);
                    $blanc = imagecolorallocate($img_out, 255, 255, 255); 
                     imagestring($img_out, 0, 10, 50, $texte, $blanc);
                    
                    if(strtoupper($filenameext)=="JPEG")
                    imagejpeg($img_out,$destImg);
                    
                    if(strtoupper($filenameext)=="JPG")
                    imagejpeg($img_out,$destImg);
                    
                    if(strtoupper($filenameext)=="PNG")
                    imagepng($img_out,$destImg);
                    
                    if(strtoupper($filenameext)=="GIF")
                    imagegif($img_out,$destImg);
                    //unlink($dest);
                } else {
                  rename($destImg,$destImg);  
                }// pas de redimentionnement
                    

                      //Fin script miniature
} 	
?>