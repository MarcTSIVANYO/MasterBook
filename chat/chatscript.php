<?php
define ('DBPATH','localhost');
define ('DBUSER','root');
define ('DBPASS','');
define ('DBNAME','msechanges_db');

session_start();
global $dbh;
$dbh = mysql_connect(DBPATH,DBUSER,DBPASS);
mysql_selectdb(DBNAME,$dbh);

if($_GET['action']=='appendchatbody')appendchatbody();
if($_GET['action']=='insertchat')insertchat();
if($_GET['action']=='beatchat')beatchat();
if($_GET['action']=='nonvuchatajax')nonvuchatajax();
if($_GET['action']=='meschatnonvu')meschatnonvu();

if($_GET['action']=='userconnecte')userconnecte();

if($_GET['action']=='voirchat')voirchat();
if($_GET['action']=='totalnonvuchatajax')totalnonvuchatajax();



function appendchatbody(){
    $arrayday=array("Dimanche","Lundi","Mardi","Mercredi","Jeudi","Vendredi","Samedi");
    //$_SESSION['appmail']['chatwith']['person'.$_SESSION['appmail']['chatwith']['id']]=0;
    
    if(isset($_SESSION['appmail']['me']) && isset($_SESSION['appmail']['chatwith']['id'])){
        $timeconnect=$_SESSION['appmail']['timeconnect'];
        $chatwith=$_SESSION['appmail']['chatwith']['id'];
        //$data=$_SESSION['appmail']['chatwith']["person$chatwith"];
        $sql = "select * from chat where 
        ((chat.from = '".mysql_real_escape_string($_SESSION['appmail']['me'])."' 
        AND chat.to = '".mysql_real_escape_string($_SESSION['appmail']['chatwith']['id'])."'
        )
        OR 
        (chat.to = '".mysql_real_escape_string($_SESSION['appmail']['me'])."' 
             AND chat.from = '".mysql_real_escape_string($_SESSION['appmail']['chatwith']['id'])."'
        ))
        
        order by id DESC ";
	    $query = mysql_query($sql);
        $nbr=mysql_num_rows($query);
        if($nbr){
        //$data=$_SESSION['appmail']['chatwith']["person$chatwith"].'___nbre='.$nbr;
        if($_SESSION['appmail']['chatwith']["person$chatwith"]<$nbr)
        {
    	//while ($chat = mysql_fetch_array($query)) 
        $chat = mysql_fetch_array($query);
        {
    	   $name=stripslashes($_SESSION['appmail']['chatwith']['nom']);
    	   $classpull='itemOut';
           $jour=date('d-m-Y H:i',strtotime($chat['sent']));//$arrayday[date('l',$chat['sent'])].', '.date('h:i',$chat['sent']);
    	   
           $sqlperson="select * from person where id_pers='".$_SESSION['appmail']['chatwith']['id']."'";
           $queryperson = mysql_query($sqlperson);
           $tabpersonmysql=mysql_fetch_array($queryperson);
            $avatar=$tabpersonmysql['photo'];
           
           if($_SESSION['appmail']['me']==$chat['from']){
    	       $classpull='itemIn';
               $name="Moi";
               $sqlperson="select * from person where id_pers='".$_SESSION['appmail']['me']."'";
               $queryperson = mysql_query($sqlperson);
               $tabpersonmysql=mysql_fetch_array($queryperson);
                $avatar=$tabpersonmysql['photo'];
    	   } 
           
           
           
           
           
           
            	   $data.='<div class="'.$classpull.'">
                            <a href="#" class="image"><img src="../profil/'.$avatar.'" class="img-polaroid"/></a>
                            <div class="text">
                                <div class="info clearfix">
                                    <span class="name">'.$name.'</span>
                                    <span class="date">'.$jour.'</span>
                                </div>'. 
                                 sanitize(stripslashes($chat['message']))
                           .'</div>
                        </div>';
                            
                
                
        	}
            
            $_SESSION['appmail']['chatwith']["person$chatwith"]=$nbr;
        } 
       }
    }else{
        
    }
    echo $data;
}




function appendchatbodypage(){
    $arrayday=array("Dimanche","Lundi","Mardi","Mercredi","Jeudi","Vendredi","Samedi");
    //$_SESSION['appmail']['chatwith']['person'.$_SESSION['appmail']['chatwith']['id']]=0;
    if(isset($_SESSION['appmail']['me']) && isset($_SESSION['appmail']['chatwith']['id'])){
        $timeconnect=$_SESSION['appmail']['timeconnect'];
        $chatwith=$_SESSION['appmail']['chatwith']['id'];
        $sql = "select * from chat where 
        ((chat.from = '".mysql_real_escape_string($_SESSION['appmail']['me'])."' 
        AND chat.to = '".mysql_real_escape_string($_SESSION['appmail']['chatwith']['id'])."'
        )
        OR 
        (chat.to = '".mysql_real_escape_string($_SESSION['appmail']['me'])."' 
             AND chat.from = '".mysql_real_escape_string($_SESSION['appmail']['chatwith']['id'])."'
        ))
        
        order by sent ASC  $sqllimit";
	    $query = mysql_query($sql);
        $nbr=mysql_num_rows($query);
        if($nbr){
            //$data=$_SESSION['appmail']['chatwith']["person$chatwith"];
        {
    	while ($chat = mysql_fetch_array($query)) {
    	   $name=stripslashes($_SESSION['appmail']['chatwith']['nom']);
    	   $classpull='itemOut';
           $jour=date('d-m-Y H:i',strtotime($chat['sent']));//$arrayday[date('l',$chat['sent'])].', '.date('h:i',$chat['sent']);
    	  
          
           $sqlperson="select * from person where id_pers='".$_SESSION['appmail']['chatwith']['id']."'";
           $queryperson = mysql_query($sqlperson);
           $tabpersonmysql=mysql_fetch_array($queryperson);
            $avatar=$tabpersonmysql['photo'];
           
           if($_SESSION['appmail']['me']==$chat['from']){
    	       $classpull='itemIn';
               $name="Moi";
               $sqlperson="select * from person where id_pers='".$_SESSION['appmail']['me']."'";
               $queryperson = mysql_query($sqlperson);
               $tabpersonmysql=mysql_fetch_array($queryperson);
                $avatar=$tabpersonmysql['photo'];
    	   }  
            	   $data.='<div class="'.$classpull.'">
                            <a href="#" class="image"><img src="../profil/'.$avatar.'" class="img-polaroid"/></a>
                            <div class="text">
                                <div class="info clearfix">
                                    <span class="name">'.$name.'</span>
                                    <span class="date">'.$jour.'</span>
                                </div>'. 
                                 sanitize(stripslashes($chat['message']))
                           .'</div>
                        </div>';
                            
                
                
        	}
            
            $_SESSION['appmail']['chatwith']["person$chatwith"]=$nbr;
        }
    
            
            
         
       }
    }else{
        
    }
    echo $data;
}



function userconnecte1(){
   $query=mysql_query("select * from person  where  id_pers <> '".$_SESSION['appmail']['id_pers']."' and id_grpe in (select id_grpe from table_acces where session='chat' ) and visible='1' and connecte='1'");
 while ($tabpersonliste = mysql_fetch_array($query)) {$color='color: blue;'; if($tabpersonliste['id_pers']==$_SESSION['appmail']['chatwith']['id']) $color='color: green;';
   //$nonvuchat=nonvuchatde($tabpersonliste['id_pers']); 
$li.='<li class="well userliste connecte" user-data="'.$tabpersonliste["id_pers"].'" style="padding: 1px;margin-bottom:0px;">
<a    href="?chatwith='.$tabpersonliste["id_pers"].'">
   <span  style="'.$color.'">'.$tabpersonliste['nom'].'</span>
  <span class="bg"></span>
</a>
</li>';
}
echo $li;
}

function userconnecte(){
    $id_pers=$_GET['id_pers'];
   $query=mysql_query("select * from person  where  id_pers = '".$id_pers."'  and connecte='1'");
   $nbr=mysql_num_rows($query);
        //echo $sql;
   echo $nbr;

}









function insertchat(){
    $message=$_POST['message'];
    if(isset($_SESSION['appmail']['me']) && isset($_SESSION['appmail']['chatwith']['id'])){
     $sql ="insert into chat set 
        chat.from='".mysql_real_escape_string($_SESSION['appmail']['me'])."', 
        chat.to= '".mysql_real_escape_string($_SESSION['appmail']['chatwith']['id'])."',
        message= '".mysql_real_escape_string($message)."',
        sent=NOW(),
        recd=0
        ";
	    if(mysql_query($sql)){
	      $query=''; 
	    }else{
	      $query=mysql_error();
	    }
     }   
     echo $query;
}


function beatchat(){
    $sql ="select * from chat where chat.to= '".mysql_real_escape_string($_SESSION['appmail']['me'])."'
           and recd=0 limit 1";
        $nbr=0;
        $query=mysql_query($sql);
        $nbr=mysql_num_rows($query);
	    if($nbr>0){
	       $thistabchat=mysql_fetch_array($query);
           $thischatid=$thistabchat['id'];
           @mysql_query("update chat set recd=1 where id='$thischatid'");
	    }
     echo $nbr;
}

function nonvuchatde($from){
    $sql ="select * from chat where chat.to= '".mysql_real_escape_string($_SESSION['appmail']['me'])."'
          and chat.from='".$from."'
          and vu=0";
        $nbr=0;
        $query=mysql_query($sql) or die(mysql_error());
        $nbr=mysql_num_rows($query);
        //echo $sql;
     return $nbr;
}

function voirchat(){
    $from=$_POST['from'];
    @mysql_query("update chat set vu=1 where chat.from='".$from."' and chat.to= '".mysql_real_escape_string($_SESSION['appmail']['me'])."'");
}



function meschatnonvu(){
    $sql ="select * from chat where chat.to= '".mysql_real_escape_string($_SESSION['appmail']['me'])."'
          and vu=0";
        $nbr=0;
        $query=mysql_query($sql);
        $nbr=mysql_num_rows($query);
     echo $nbr;
}


function nonvuchatajax(){
    $from=$_POST['from'];
    $sql ="select * from chat where chat.to= '".mysql_real_escape_string($_SESSION['appmail']['me'])."'
          and chat.from='".$from."'
          and vu=0";
        $nbr=0;
        $query=mysql_query($sql);
        $nbr=mysql_num_rows($query);
     echo $nbr;
}

function totalnonvuchatajax(){
    $from=$_POST['from'];
    $sql ="select * from chat where chat.to= '".mysql_real_escape_string($_SESSION['appmail']['me'])."'
          and vu=0";
        $nbr=0;
        $query=mysql_query($sql);
        $nbr=mysql_num_rows($query);
     echo $nbr;
}



function sanitize($text) {
	$text = htmlspecialchars($text, ENT_QUOTES);
	$text = str_replace("\n\r","\n",$text);
	$text = str_replace("\r\n","\n",$text);
	$text = str_replace("\n","<br>",$text);
	return $text;
}

?>