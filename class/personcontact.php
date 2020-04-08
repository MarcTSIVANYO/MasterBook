<?php
 
Class personcontact{
    
   private $dbh;
    
   public function __construct(){ 
        $this->dbh = new Database();
    } 
    
    
    public function LoginExiste($login_pers,$id_pers){
        $tab=$this->dbh->query("select * from personcontact where login_pers='$login_pers' and id_pers <>'".$id_pers."'");
        return $tab->rowCount();
    }
    
    public function nombredepersoncontact(){
        $tab=$this->dbh->query("select * from personcontact where visible=1");
        return $tab->rowCount();
    }
    
    public function Is_connect($id_pers){
        $tab=$this->dbh->query("select * from personcontact where visible=1 and connecte=1 and id_pers='$id_pers'");
        return $tab->rowCount();
    }
    
    public function InfoSur($id_pers){
        $tab=$this->dbh->query("select * from personcontact where  id_pers='".$id_pers."'");
        $result=$tab->fetch();
        return $result;
    }
    
    
    public function InfoSans($id_pers){
        return $this->dbh->query("select * from personcontact  where  id_pers <> '".$id_pers."'");
    }
    
    
    public function ListeAccespersoncontact($id_pers,$session,$ligne=0,$trie='',$visible=1){
        if($ligne) $limit="limit 0,$ligne";
        $visible=intval($visible);
        return $this->dbh->query("select * from personcontact  where  id_pers <> '".$id_pers."' and id_grpe in (select id_grpe from table_acces where session='$session' ) and visible='$visible' $trie $limit");
    }
    
    
    public function ListeAccesSmSpersoncontact($id_pers,$ligne=0,$trie='',$visible=1){
        if($ligne) $limit="limit 0,$ligne";
        $visible=intval($visible);
        return $this->dbh->query("select * from personcontact  where  id_pers <> '".$id_pers."' and smsactif='1'  and visible='$visible' $trie $limit");
    }
    public function ListeAccesEmailingpersoncontact($id_pers,$ligne=0,$trie='',$visible=1){
        if($ligne) $limit="limit 0,$ligne";
        $visible=intval($visible);
        return $this->dbh->query("select * from personcontact  where  id_pers <> '".$id_pers."' and emailingactif='1'  and visible='$visible' $trie $limit");
    }
    
    
    public function ListeAccespersoncontactconnecte($id_pers,$session,$ligne=0,$trie='',$visible=1){
        if($ligne) $limit="limit 0,$ligne";
        $visible=intval($visible);
        return $this->dbh->query("select * from personcontact  where  id_pers <> '".$id_pers."' and id_grpe in (select id_grpe from table_acces where session='$session' ) and visible='$visible' and connecte='1' $trie $limit");
    }
    
   
   
    
    
    public function insertion($options=array()){
    $default=array("nom"=>"",
              "login_pers"=>"",
              "pwd_pers"=>"",
              "photo"=>"",
              "tel"=>"",
              "cel"=>"",
              "fax"=>"",
              "email"=>"",
              "adresse"=>"",
              "smsactif"=>"",
              "emailingactif"=>"",
              "id_grpe"=>"",
              "id_pers"=>""
              );
    $options = array_merge($default, $options);
    extract($options);
       	try
		{
		  if($photo!=''){$sqlphoto="photo='$photo',";}
          
			  $pers_insert=$this->dbh->exec("insert into personcontact set 
              nom='$nom',
              login_pers='$login_pers',
              username='$login_pers',
              pwd_pers='$pwd_pers',
              tel='$tel',
              cel='$cel',
              fax='$fax',
              $sqlphoto
              email='$email',
              adresse='$adresse',
              smsactif='$smsactif',
              emailingactif='$emailingactif',
              id_grpe='$id_grpe'");
                    
       }
		catch(PDOException $e)
		{
			echo 'PDO ' . $method . ' Error: ' . $e->getMessage();
		}
		return intval($pers_insert);
            
    
   }
    
    public function modification($options=array()){
    $default=array("nom"=>"",
              "login_pers"=>"",
              "pwd_pers"=>"",
              "photo"=>"",
              "tel"=>"",
              "cel"=>"",
              "fax"=>"",
              "email"=>"",
              "adresse"=>"",
              "smsactif"=>"",
              "emailingactif"=>"",
              "id_grpe"=>"",
              "id_pers"=>""
              );
    $options = array_merge($default, $options);
    extract($options);
       	try
		{
		   if($photo!=''){$sqlphoto="photo='$photo',";}
          $vat="update personcontact set 
              nom='$nom',
              login_pers='$login_pers',
              pwd_pers='$pwd_pers',
              tel='$tel',
              cel='$cel',
              fax='$fax',
              $sqlphoto
              email='$email',
              adresse='$adresse',
              smsactif='$smsactif',
              emailingactif='$emailingactif',
              id_grpe='$id_grpe'  where id_pers='$id_pers'";
			  $pers_update=$this->dbh->exec("update personcontact set 
              nom='$nom',
              login_pers='$login_pers',
              pwd_pers='$pwd_pers',
              tel='$tel',
              cel='$cel',
              fax='$fax',
              $sqlphoto
              email='$email',
              adresse='$adresse',
              smsactif='$smsactif',
              emailingactif='$emailingactif',
              id_grpe='$id_grpe'  where id_pers='$id_pers'");
              //echo $login_pers."jjjj";
                    
       }
		catch(PDOException $e)
		{
			echo 'PDO ' . $method . ' Error: ' . $e->getMessage();
		}
        //echo $vat;
		return intval($pers_update);
            
    
   }
    
    public function Supprimer($id_pers){
    return $this->dbh->exec("update personcontact set visible=0  where id_pers='$id_pers'");
   }
   
   public function deconnecte($id_pers){
    return $this->dbh->exec("update personcontact set connecte=0  where id_pers='$id_pers'");
   }
   
   public function connecte($id_pers){
    return $this->dbh->exec("update personcontact set connecte=1  where id_pers='$id_pers'");
   }
    
    
    public function liste($ligne=0,$trie='',$visible=1){
        if($ligne) $limit="limit 0,$ligne";
        $visible=intval($visible);
        return $this->dbh->query("select * from personcontact where visible='$visible' $trie $limit");
    }
    public function ListeSans($id_pers,$ligne=0,$trie='',$visible=1){
        if($ligne) $limit="limit 0,$ligne";
        $visible=intval($visible);
        return $this->dbh->query("select * from personcontact  where  id_pers <> '".$id_pers."' and visible='$visible' $trie $limit");
    }
    
    public function ListepersoncontactThisGroup($id_group,$ligne=0,$trie='',$visible=1){
        if($ligne) $limit="limit 0,$ligne";
        $visible=intval($visible);
        return $this->dbh->query("select * from personcontact  where  id_grpe='$id_group' and visible='$visible' $trie $limit");
    }
     
}
$classpersoncontact= new personcontact();
?>