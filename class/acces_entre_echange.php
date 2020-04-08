<?php
 
Class Acces_entre_echange{
    
   private $dbh;
    
   public function __construct(){ 
        $this->dbh = new Database();
    } 
    
   public function SuppAvantInsertion($id_grpe,$session){
    return $this->dbh->exec("delete from entre_echange  where id_grpe='$id_grpe' and session='$session'");
   }
   
   public function Is_Acces($id_grpe,$autre_grpe,$session){
    $tab=$this->dbh->query("select * from entre_echange  where id_grpe='$id_grpe' and autre_grpe='$autre_grpe' and session='$session'");
    return $tab->rowCount();
   }
   
   
   
   public function insertion($options=array()){
    $default =array("id_grpe"=>"",
                    "autre_grpe"=>"",
                    "session"=>""
                        );
    $options = array_merge($default, $options);
    extract($options);
       	try
		{
			  $Acces_entre_echange_insert=$this->dbh->exec("insert into entre_echange set 
                id_grpe='$id_grpe',
                autre_grpe='$autre_grpe',
                session='$session'");
                    
       }
		catch(PDOException $e)
		{
			echo 'PDO ' . $method . ' Error: ' . $e->getMessage();
		}
		return intval($Acces_entre_echange_insert);
            
    
   }
   
  
    
}
$classacces_entre_echange=new Acces_entre_echange();
?>