<?php
 
Class groupecontact{
    
   private $dbh;
    
   public function __construct(){ 
        $this->dbh = new Database();
    } 
    
    
   public function liste($ligne=0,$trie='',$visible=1){
     if($ligne) $limit="limit 0,$ligne";
     $visible=intval($visible);
     return $this->dbh->query("select * from groupecontact  where visible='$visible' $trie $limit");
   }
   
   public function listeByDepartement($id_departement,$ligne=0,$trie='',$visible=1){
     if($ligne) $limit="limit 0,$ligne";
     $visible=intval($visible);
     return $this->dbh->query("select * from groupecontact  where id_departement='$id_departement'  and visible='$visible' $trie $limit");
   }
   
   
   public function InfoSur($id_grpe){
    $tab=$this->dbh->query("select * from groupecontact  where id_grpe='$id_grpe'");
    $result=$tab->fetch();
    return $result;
   }
   
   public function this_groupecontact($id_grpe){
    return $this->dbh->query("select * from groupecontact  where id_grpe='$id_grpe'");
   }
   
   
   public function Supprimer($id_grpe){
    return $this->dbh->exec("update groupecontact set visible=0  where id_grpe='$id_grpe'");
   }
   
   
   
   public function libelle_groupecontact($id_grpe){
      $tab=$this->dbh->query("select * from groupecontact  where id_grpe='$id_grpe'");
      $result=$tab->fetch();
      return $result['lib_grpe'];
   }
   
   public function insertion($options=array()){
    $default =array("lib_grpe"=>"",
                    "desc_grpe"=>"",
                    "id_departement"=>"",
                        );
    $options = array_merge($default, $options);
    extract($options);
       	try
		{
			  $grpe_insert=$this->dbh->exec("insert into groupecontact set 
                lib_grpe='$lib_grpe',
               desc_grpe='$desc_grpe',
               id_departement='$id_departement'
               ");
                    
       }
		catch(PDOException $e)
		{
			echo 'PDO ' . $method . ' Error: ' . $e->getMessage();
		}
		return intval($grpe_insert);
            
    
   }
   
   
   public function modification($options=array()){
    $default =array("lib_grpe"=>"",
                    "desc_grpe"=>"",
                    "id_departement"=>"",
                    "id_grpe"=>""
                        );
    $options = array_merge($default, $options);
    extract($options);
       	try
		{
			  $grpe_insert=$this->dbh->exec("update groupecontact set 
                lib_grpe='$lib_grpe',
               desc_grpe='$desc_grpe',
               id_departement='$id_departement'
               where id_grpe='$id_grpe'
               ");
                    
        }
		catch(PDOException $e)
		{
			echo 'PDO ' . $method . ' Error: ' . $e->getMessage();
		}
		return intval($grpe_insert);
            
    
   }
    
}
$classgroupecontact=new groupecontact();
?>