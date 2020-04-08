<?php
 
Class departement{
    
   private $dbh;
    
   public function __construct(){ 
        $this->dbh = new Database();
    } 
    
    
   public function liste($ligne=0,$trie='',$visible=1){
     if($ligne) $limit="limit 0,$ligne";
     $visible=intval($visible);
     return $this->dbh->query("select * from departement  where visible='$visible' $trie $limit");
   }
   

   
   
   public function InfoSurDepartement($id_departement){
    $tab=$this->dbh->query("select * from departement  where id_departement='$id_departement'");
    $result=$tab->fetch();
    return $result;
   }
   
   public function this_departement($id_departement){
    return $this->dbh->query("select * from departement  where id_departement='$id_departement'");
   }
   
   
   public function Supprimer($id_departement){
    return $this->dbh->exec("update departement set visible=0  where id_departement='$id_departement'");
   }
   
   
   
   public function libelle_departement($id_departement){
      $tab=$this->dbh->query("select * from departement  where id_departement='$id_departement'");
      $result=$tab->fetch();
      return $result['lib_departement'];
   }
   
   public function insertion($options=array()){
    $default =array("lib_departement"=>"",
                    "desc_departement"=>""
                        );
    $options = array_merge($default, $options);
    extract($options);
       	try
		{
			  $departement_insert=$this->dbh->exec("insert into departement set 
                lib_departement='$lib_departement',
               desc_departement='$desc_departement'");
                    
       }
		catch(PDOException $e)
		{
			echo 'PDO ' . $method . ' Error: ' . $e->getMessage();
		}
		return intval($departement_insert);
            
    
   }
   
   
   public function modification($options=array()){
    $default =array("lib_departement"=>"",
                    "desc_departement"=>"",
                    "id_departement"=>""
                        );
    $options = array_merge($default, $options);
    extract($options);
       	try
		{
			  $departement_insert=$this->dbh->exec("update departement set 
                lib_departement='$lib_departement',
               desc_departement='$desc_departement'
               where id_departement='$id_departement'
               ");
                    
        }
		catch(PDOException $e)
		{
			echo 'PDO ' . $method . ' Error: ' . $e->getMessage();
		}
		return intval($dest_insert);
            
    
   }
    
}
$classdepartement=new departement();
?>