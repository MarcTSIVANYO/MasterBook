<?php
 
Class Document{
    
   private $dbh;
    
   public function __construct(){ 
        $this->dbh = new Database();
    } 
    
    
   public function liste_doc_groupe($ligne=0,$trie=''){
     if($ligne) $limit="limit 0,$ligne";
     $visible=intval($visible);
     return $this->dbh->query("select * from doc_groupe  $trie $limit");
   }
   
   
   public function liste_doc_groupe_for_session($session_doc_grpe,$ligne=0,$trie=''){
     if($ligne) $limit="limit 0,$ligne";
     $visible=intval($visible);
     return $this->dbh->query("select * from doc_groupe where session_doc_grpe='$session_doc_grpe'  $trie $limit");
   }
   
   
   
   public function InfoSur_doc_groupe($id_doc_grpe){
    $tab=$this->dbh->query("select * from doc_groupe  where id_doc_grpe='$id_doc_grpe'");
    $result=$tab->fetch();
    return $result;
   }
   
   public function this_doc_groupe($id_doc_grpe){
    return $this->dbh->query("select * from doc_groupe  where id_doc_grpe='$id_doc_grpe'");
   }
   
   
   public function Supprimer_doc_groupe($id_doc_grpe){
    return $this->dbh->exec("delete from doc_groupe   where id_doc_grpe='$id_doc_grpe'");
   }
   
   

   
   public function insertion_doc_groupe($options=array()){
    $default =array("intitule_doc_grpe"=>"",
                     "session_doc_grpe"=>"",
                     "id_doc_grpe"=>""
                        );
    $options = array_merge($default, $options);
    extract($options);
       	try
		{
			  $grpe_insert=$this->dbh->exec("insert into doc_groupe set 
                intitule_doc_grpe='$intitule_doc_grpe',session_doc_grpe='$session_doc_grpe'");
                    
       }
		catch(PDOException $e)
		{
			echo 'PDO ' . $method . ' Error: ' . $e->getMessage();
		}
		return intval($grpe_insert);
            
    
   }
   
   
   public function modification_doc_groupe($options=array()){
    $default =array("intitule_doc_grpe"=>"",
                    "session_doc_grpe"=>"",
                    "id_doc_grpe"=>""
                        );
    $options = array_merge($default, $options);
    extract($options);
       	try
		{
			  $grpe_insert=$this->dbh->exec("update doc_groupe set 
                intitule_doc_grpe='$intitule_doc_grpe',
                session_doc_grpe='$session_doc_grpe'
                where id_doc_grpe='$id_doc_grpe'
               ");
                    
        }
		catch(PDOException $e)
		{
			echo 'PDO ' . $method . ' Error: ' . $e->getMessage();
		}
		return intval($grpe_insert);
            
    
   }
    
}
$classdocument=new Document();
?>