<?php
 
Class Visiteur{
    
   private $dbh;
    
   public function __construct(){ 
        $this->dbh = new Database();
    } 
    
   
    
    
    public function InfoSur($id_visiteur){
        $tab=$this->dbh->query("select * from visiteur where  id_visiteur='".$id_visiteur."'");
        $result=$tab->fetch();
        return $result;
    }
    
    
    
    public function insertion($options=array()){
    $default=array("nom_visiteur"=>"",
              "societe_visiteur"=>"",
              "contact_visiteur"=>"",
              "motif_visiteur"=>"",
              "message_visiteur"=>"",
              "person_visiteur"=>"",
              "type_visiteur"=>"",
              "date"=>"",
              "enregistreur"=>"",
              "id_visiteur"=>""
              );
    $options = array_merge($default, $options);
    extract($options);
       	try
		{
			  $pers_insert=$this->dbh->exec("insert into visiteur set 
              nom_visiteur='$nom_visiteur',
              societe_visiteur='$societe_visiteur',
              contact_visiteur='$contact_visiteur',
               type_visiteur='$type_visiteur',
              motif_visiteur='$motif_visiteur',
              message_visiteur='$message_visiteur',
              person_visiteur='$person_visiteur',
              enregistreur='$enregistreur'");
                    
       }
		catch(PDOException $e)
		{
			echo 'PDO ' . $method . ' Error: ' . $e->getMessage();
		}
		return intval($pers_insert);
            
    
   }
    
    public function modification($options=array()){
    $default=array("nom_visiteur"=>"",
              "societe_visiteur"=>"",
              "contact_visiteur"=>"",
              "motif_visiteur"=>"",
              "message_visiteur"=>"",
              "person_visiteur"=>"",
              "type_visiteur"=>"",
              "date"=>"",
              "enregistreur"=>"",
              "id_visiteur"=>""
              );
    $options = array_merge($default, $options);
    extract($options);
       	try
		{
			  $pers_update=$this->dbh->exec("update visiteur set 
              nom_visiteur='$nom_visiteur',
              societe_visiteur='$societe_visiteur',
              contact_visiteur='$contact_visiteur',
              type_visiteur='$type_visiteur',
              motif_visiteur='$motif_visiteur',
              message_visiteur='$message_visiteur',
              person_visiteur='$person_visiteur',
              date='$date',
              enregistreur='$enregistreur'
              where id_visiteur='$id_visiteur'");
              //echo $login_pers."jjjj";
                    
       }
		catch(PDOException $e)
		{
			echo 'PDO ' . $method . ' Error: ' . $e->getMessage();
		}
		return intval($pers_update);
            
    
   }
    
    public function Supprimer($id_visiteur){
    return $this->dbh->exec("update visiteur set visible=0  where id_visiteur='$id_visiteur'");
   }
    
    
    public function liste($ligne=0,$trie='',$visible=1){
        if($ligne) $limit="limit 0,$ligne";
        $visible=intval($visible);
        return $this->dbh->query("select * from visiteur where visible='$visible' $trie $limit");
    }
    
    public function Mes_Enregistrements_Visiteur($ligne=0,$trie='',$enregistreur,$visible=1){
        if($ligne) $limit="limit 0,$ligne";
        $visible=intval($visible);
        return $this->dbh->query("select * from visiteur v,person p where p.id_pers=v.person_visiteur and v.enregistreur='$enregistreur' and v.visible='$visible' $trie $limit");
    }
    
    public function Mes_Visiteurs($ligne=0,$trie='',$me,$visible=1){
        if($ligne) $limit="limit 0,$ligne";
        $visible=intval($visible);
        return $this->dbh->query("select * from visiteur v,person p where p.id_pers=v.person_visiteur and v.person_visiteur='$me' and v.visible='$visible' $trie $limit");
    }
    
     
}
$classvisiteur= new Visiteur();
?>