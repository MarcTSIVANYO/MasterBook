<?php

/**
 * @author NepsterJay
 * @copyright 2014
 */
Class Acces{
    
   private $dbh;
    
   public function __construct(){ 
        $this->dbh = new Database();
    } 
    
   public function SuppAvantInsertion($id_grpe,$session){
    return $this->dbh->exec("delete from table_acces  where id_grpe='$id_grpe' and session='$session'");
   }
   
   public function Is_Acces($id_grpe,$autre_grpe,$session){
    $tab=$this->dbh->query("select * from table_acces  where id_grpe='$id_grpe' and autre_grpe='$autre_grpe' and session='$session'");
    return $tab->rowCount();
   }
   
    public function Is_Acces_Menu($id_pers,$session){
    $tab=$this->dbh->query("select * from table_acces  where id_grpe in (select id_grpe from person where id_pers='$id_pers')  and session='$session'");
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
			  $acces_insert=$this->dbh->exec("insert into table_acces set 
                id_grpe='$id_grpe',
                autre_grpe='$autre_grpe',
                session='$session'");
                    
       }
		catch(PDOException $e)
		{
			echo 'PDO ' . $method . ' Error: ' . $e->getMessage();
		}
		return intval($acces_insert);
            
    
   }
   
  
    
}
$classacces=new Acces();
?>