<?php
 
Class sms{
    
   private $dbh;
   protected $msg_recu;
   protected $msg_compose;
   protected $msg_envoye;
    
   public function __construct(){ 
        $this->dbh = new Database();
    } 
    
    
    public function YourLastMsgByToken($token){
        $tab=$this->dbh->query("select max(id_msg) as lastidmsg from messagesms where token='$token'");
        $result=$tab->fetch();
        return $result['lastidmsg'];
    }
    
    
    public function NombreMsgNonLu($id_pers){
        $sql=$this->dbh->query("select * from destinatairesms where id_pers='$id_pers' and lu='n'");
        return $sql->rowCount();
    }
    
    
    public function MsgLu($id_pers,$id_msg){
        return $this->dbh->exec("update destinatairesms set lu='o' where id_pers='$id_pers' and  id_msg='$id_msg'");
    }
    
    
    public function ListDestMsgEnvoye($id_msg){
    return $this->dbh->query("select * from  destinatairesms d, person p where  d.id_pers=p.id_pers  and d.id_msg='$id_msg'");    
    }
    
    
    
    
   public function msg_recu($id_pers,$ligne=0,$trie=''){
     if($ligne) $limit="limit 0,$ligne";
     return $this->dbh->query("select * from destinatairesms d, messagesms m, person p where d.id_msg=m.id_msg and m.id_pers=p.id_pers and d.id_pers='".$id_pers."' $trie $limit");
   }
   
   public function lire_un_msg_recu($id_msg){
    $tab=$this->dbh->query("select * from  messagesms m, person p where  m.id_pers=p.id_pers  and m.id_msg='$id_msg'");
    return $tab->fetch();
   }
   
   
   public function msg_envoye($id_pers,$ligne=0,$trie=''){
     if($ligne) $limit="limit 0,$ligne";
     return $this->dbh->query("select * from  messagesms m, person p where  m.id_pers=p.id_pers and m.id_pers='".$id_pers."' $trie $limit");
   }
   
   
   
    
   
   
   public function lire_un_msg_envoye($id_pers,$id_msg){
    $tab=$this->dbh->query("select * from  messagesms m, person p where  m.id_pers=p.id_pers  and m.id_msg='$id_msg' and m.id_pers='$id_pers'");
    return $tab->fetch();
   }
   
   
   
   
   
   public function msg_compose($id_pers,$destinataire_msg=array(),$token,$options=array()){
        $default =array("objet_msg"=>"",
                        "texte_msg"=>"",
                        "attache_msg"=>"",
                        "token"=>"",
                        "id_pers"=>""
                        );
    $options = array_merge($default, $options);
    //extract($options);
   
       	try
		{
			  $msg_insert=$this->dbh->exec("insert into messagesms set 
                    objet_msg='".$options['objet_msg']."',	
                	texte_msg='".$options['texte_msg']."', 
                	attache_msg='".$options['attache_msg']."', 	
                	token='".$options['token']."',	
                	id_pers='".$options['id_pers']."'");
           $lastmsgbytoken=$this->YourLastMsgByToken($token);      
           if($lastmsgbytoken>0){
              foreach($destinataire_msg as $key=>$val){
                  $dest_insert=$this->dbh->exec("insert  into destinatairesms set 
                   	id_msg='$lastmsgbytoken',	
                	id_pers='$val'
                 ");  
                 //$nail=new mime_mail;
                 //$nail->send();
              }
           }
                    
       }
		catch(PDOException $e)
		{
			echo 'PDO ' . $method . ' Error: ' . $e->getMessage();
		}
		return intval($dest_insert);
            
    }   
}
$classsms=new sms();
?>