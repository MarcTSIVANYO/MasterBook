<?php
 
Class Active{
    
  private $dbh;
    
  public function __construct(){ 
        $this->dbh = new Database();
  } 
    
  public function toActive($pwd,$code,$active=1){
    return $tab=$this->dbh->query("select * from sactive  where code='$code' and pwd='$pwd' and active='$active'"); 
  }
  public function currentActive($active=1,$ligne=1,$trie='order by id_active DESC'){
    if($ligne) $limit="limit 0,$ligne";
    return $this->dbh->query("select * from active where active='$active' $trie $limit"); 
     
  }
  public function desactive($code){
      return $this->dbh->exec("update sactive set active=0  where id_code='$code'");
  }
public function insertion($options=array()){
    $default=array("structure"=>"",
              "email"=>"",
              "code"=>"", 
              "date_fin"=>"", 
              "active"=>""
              );
    $options = array_merge($default, $options);
    extract($options);
        try
    { 
        $insert=$this->dbh->exec("insert into active set 
              structure='$structure',
              email='$email',
              code='$code',
              date_fin='$date_fin', 
              active='$active'");
                    
       }
    catch(PDOException $e)
    {
      echo 'PDO ' . $method . ' Error: ' . $e->getMessage();
    }
    return intval($insert); 
   }
    
     
}
$classactive= new Active();
?>