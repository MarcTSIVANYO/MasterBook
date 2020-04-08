<?php
Class depart{
    
   private $dbh;
    
   public function __construct(){ 
        $this->dbh = new Database();
    } 
     
    public function InfoSur($id_depart){
        $tab=$this->dbh->query("select * from courrier_depart where  id_depart='".$id_depart."'");
        $result=$tab->fetch();
        return $result;
    }
    
    
    public function insertion($options=array()){
    $default=array("noms_depart"=>"",
              "objets_depart"=>"",
              "nbpieces_depart"=>"",
              "recepteur_depart"=>"",
              "ordre_depart"=>"",
              "date_depart"=>"",
              "enregistreur"=>"",
              "fichier_depart"=>"",
              "id_depart"=>""
              );
    $options = array_merge($default, $options);
    extract($options);
       	try
		{

          $sqlfichier='';
          if($fichier_depart!='') $sqlfichier="fichier_depart='$fichier_depart',";
			  $pers_insert=$this->dbh->exec("insert into courrier_depart set 
              noms_depart='$noms_depart',
              objets_depart='$objets_depart',
              nbpieces_depart='$nbpieces_depart',
              recepteur_depart='$recepteur_depart',
              $sqlfichier
              date_depart='$date_depart',
              ordre_depart='$ordre_depart',
              enregistreur='$enregistreur'"); 
       }
		catch(PDOException $e)
		{
			echo 'PDO ' . $method . ' Error: ' . $e->getMessage();
		}
		return intval($pers_insert); 
   }
    
    public function modification($options=array()){
    $default=array("noms_depart"=>"",
              "objets_depart"=>"",
              "nbpieces_depart"=>"",
              "recepteur_depart"=>"",
              "ordre_depart"=>"",
              "date_depart"=>"",
              "enregistreur"=>"",
              "fichier_depart"=>"",
              "id_depart"=>""
              );
    $options = array_merge($default, $options);
    extract($options);
       	try
		{ 
          $sqlfichier='';
          if($fichier_depart!='') $sqlfichier="fichier_depart='$fichier_depart',";
			  $pers_update_depart=$this->dbh->exec("update courrier_depart set 
              noms_depart='$noms_depart',
              objets_depart='$objets_depart',
              nbpieces_depart='$nbpieces_depart',
              recepteur_depart='$recepteur_depart',
              ordre_depart='$ordre_depart',
              $sqlfichier 
              date_depart='$date_depart',
              enregistreur='$enregistreur'
              where id_depart='$id_depart'"); 
                    
       }
		catch(PDOException $e)
		{
			echo 'PDO ' . $method . ' Error: ' . $e->getMessage();
		}
		return intval($pers_update_depart);
            
    
   }
    
    public function Supprimer($id_depart){
    return $this->dbh->exec("update courrier_depart set visible=0  where id_depart='$id_depart'");
   }
    
    
    public function liste($ligne=0,$trie='',$visible=1){
        if($ligne) $limit="limit 0,$ligne";
        $visible=intval($visible);
        return $this->dbh->query("select * from courrier_depart where visible='$visible' $trie $limit");
    }
    
    public function RequeteSql($completesql='select * from courrier_depart'){
        return $this->dbh->query($completesql);
    }
    
    public function Last_Compteur_Mois($mois,$annee){
        $tab=$this->dbh->query("select MAX(ordre_depart) as ordredepart from courrier_depart where month(date_depart)='$mois' and year(date_depart)='$annee' and visible='1'");
        $result=$tab->fetch();
        return $result['ordredepart'];   
    }
    
    public function RetunrCodeDepart($compteur){
        return str_pad($compteur, STR_PAD_DEPART, 0, STR_PAD_LEFT).CODEDEPART;   
    }
    
    
    public function Mes_Enregistrements_depart($ligne=0,$trie='',$enregistreur,$visible=1){
        if($ligne) $limit="limit 0,$ligne";
        $visible=intval($visible);
        return $this->dbh->query("select * from courrier_depart v,person p where p.id_pers=v.enregistreur and v.enregistreur='$enregistreur' and v.visible='$visible' $trie $limit");
    }
    

    
     
}
$classdepart= new depart();
?>