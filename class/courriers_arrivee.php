<?php 
Class arrivee{
    
   private $dbh;
    
   public function __construct(){ 
        $this->dbh = new Database();
    } 
     
    
    public function InfoSur($id_arrivee){
        $tab=$this->dbh->query("select * from courrier_arrivee where  id_arrivee='".$id_arrivee."'");
        $result=$tab->fetch();
        return $result;
    }
    
    
    public function insertion($options=array()){
    $default=array("noms_arrivee"=>"",
              "objets_arrivee"=>"",
              "datesurlalettre_arrivee"=>"",
              "numsurlalettre_arrivee"=>"",
              "ordre_arrivee"=>"",
              "date_arrivee"=>"",
              "fichier_arrivee"=>"",
              "enregistreur"=>"",
              "id_arrivee"=>""
              );
    $options = array_merge($default, $options);
    extract($options);
       	try
		{
          $sqlfichier='';
          if($fichier_arrivee!='') $sqlfichier="fichier_arrivee='$fichier_arrivee',";
			  $pers_insert=$this->dbh->exec("insert into courrier_arrivee set 
              noms_arrivee='$noms_arrivee',
              objets_arrivee='$objets_arrivee',
              datesurlalettre_arrivee='$datesurlalettre_arrivee',
              numsurlalettre_arrivee='$numsurlalettre_arrivee',
              date_arrivee='$date_arrivee',
              $sqlfichier 
              ordre_arrivee='$ordre_arrivee',
              enregistreur='$enregistreur'");
                    
       }
		catch(PDOException $e)
		{
			echo 'PDO ' . $method . ' Error: ' . $e->getMessage();
		}
		return intval($pers_insert);
            
    
   }
    
    public function modification($options=array()){
    $default=array("noms_arrivee"=>"",
              "objets_arrivee"=>"",
              "datesurlalettre_arrivee"=>"",
              "numsurlalettre_arrivee"=>"",
              "ordre_arrivee"=>"",
              "date_arrivee"=>"",
              "fichier_arrivee"=>"",
              "enregistreur"=>"",
              "id_arrivee"=>""
              );
    $options = array_merge($default, $options);
    extract($options);
       	try
		{
          $sqlfichier='';
          if($fichier_arrivee!='') $sqlfichier="fichier_arrivee='$fichier_arrivee',";
			  $pers_update_arrivee=$this->dbh->exec("update courrier_arrivee set 
              noms_arrivee='$noms_arrivee',
              objets_arrivee='$objets_arrivee',
              datesurlalettre_arrivee='$datesurlalettre_arrivee',
              numsurlalettre_arrivee='$numsurlalettre_arrivee',
              ordre_arrivee='$ordre_arrivee',
              date_arrivee='$date_arrivee',
              enregistreur='$enregistreur'
              where id_arrivee='$id_arrivee'"); 
                    
       }
		catch(PDOException $e)
		{
			echo 'PDO ' . $method . ' Error: ' . $e->getMessage();
		}
		return intval($pers_update_arrivee);
            
    
   }
    
    public function Supprimer($id_arrivee){
    return $this->dbh->exec("update courrier_arrivee set visible=0  where id_arrivee='$id_arrivee'");
   }
    
    
    public function liste($ligne=0,$trie='',$visible=1){
        if($ligne) $limit="limit 0,$ligne";
        $visible=intval($visible);
        return $this->dbh->query("select * from courrier_arrivee where visible='$visible' $trie $limit");
    }
    
    public function RequeteSql($completesql='select * from courrier_arrivee'){
        return $this->dbh->query($completesql);
    }
    
    public function Last_Compteur_Mois($mois,$annee){
        $tab=$this->dbh->query("select MAX(ordre_arrivee) as ordrearrivee from courrier_arrivee where month(date_arrivee)='$mois' and year(date_arrivee)='$annee' and visible='1'");
        $result=$tab->fetch();
        return $result['ordrearrivee'];   
    }
    
    public function RetunrCodeArrivee($compteur){
        return str_pad($compteur, STR_PAD_ARRIVEE, 0, STR_PAD_LEFT).CODEARRIVEE;   
    }
    
    
    public function Mes_Enregistrements_Arrivee($ligne=0,$trie='',$enregistreur,$visible=1){
        if($ligne) $limit="limit 0,$ligne";
        $visible=intval($visible);
        return $this->dbh->query("select * from courrier_arrivee v,person p where p.id_pers=v.enregistreur and v.enregistreur='$enregistreur' and v.visible='$visible' $trie $limit");
    }
    
   public function delete_this_courrier_recommandation_for_this_person($id_pers,$id_courrier){
        return $this->dbh->exec("delete from courrier_recommandation  where id_pers='$id_pers' and  id_courrier='$id_courrier' and type_courrier='A' ");
    }
    
    public function delete_courrier_recommandation($id_courrier){
        return $this->dbh->exec("delete from courrier_recommandation  where  id_courrier='$id_courrier' and type_courrier='A' ");
    }

public function insertion_courrier_recommandation($destinataire=array(),$options=array()){
    $default=array("id_courrier"=>"",
              "recommandation"=>"",
              "id_courrier_recommandation"=>""
              );
    $options = array_merge($default, $options);
    extract($options);
    try
		{
		    $this->delete_courrier_recommandation($id_courrier);
		   foreach($destinataire as $key=>$val){
			  $pers_insert=$this->dbh->exec("insert into courrier_recommandation set 
              id_courrier='$id_courrier',
              id_pers='$val',
              recommandation='$recommandation',
              type_courrier='A'");
           }       
       }
		catch(PDOException $e)
		{
			echo 'PDO ' . $method . ' Error: ' . $e->getMessage();
		}
		return intval($pers_insert); 
   }
   
   
   
   public function liste_courrier_recommandation_pour_ce_courrier($id_courrier,$ligne=0,$trie='',$visible=1){
        if($ligne) $limit="limit 0,$ligne";
        $visible=intval($visible);
        return $this->dbh->query("select * from courrier_recommandation r,courrier_arrivee a where r.id_courrier='$id_courrier' and r.id_courrier=a.id_arrivee and r.type_courrier='A' and a.visible='$visible' $trie $limit");
    }
    
    
     public function liste_courrier_recommandation_this_person($id_pers,$ligne=0,$trie='',$visible=1){
        if($ligne) $limit="limit 0,$ligne";
        $visible=intval($visible);
        return $this->dbh->query("select * from courrier_recommandation r,courrier_arrivee a where r.id_pers='$id_pers' and r.id_courrier=a.id_arrivee and r.type_courrier='A' and a.visible='$visible' $trie $limit");
    }
    public function ma_recommandation_pour_ce_courrier($id_courrier_recommandation,$id_pers){
        $tab=$this->dbh->query("select * from courrier_recommandation  where  id_courrier_recommandation='$id_courrier_recommandation' and id_pers='$id_pers' and type_courrier='A'");
        $result=$tab->fetch();
        return $result;
       }
    
    
   
   
   
    
    public function modification_courrier_recommandation($destinataire=array(),$options=array()){
    $default=array("id_courrier"=>"",
              "recommandation"=>"",
              "id_courrier_recommandation"=>""
              );
    $options = array_merge($default, $options);
    extract($options);
       	try
		{
		  foreach($destinataire as $key=>$val){
			  $pers_update_arrivee=$this->dbh->exec("update courrier_recommandation set 
              id_courrier='$id_courrier',
              recommandation='$recommandation',
              type_courrier='A'
              where id_courrier_recommandation='$id_courrier_recommandation' and id_pers='$val'"); 
           }         
       }
		catch(PDOException $e)
		{
			echo 'PDO ' . $method . ' Error: ' . $e->getMessage();
		}
		return intval($pers_update_arrivee);
            
    
   }



public function insertion_courrier_scanne($options=array()){
    $default=array("id_courrier"=>"",
              "fichier"=>"",
              "libfichier"=>"",
              "id_courrier_scanne"=>""
              );
    $options = array_merge($default, $options);
    extract($options);
       	try
		{
			  $pers_insert=$this->dbh->exec("insert into  courrier_scanne set 
              id_courrier='$id_courrier',
              fichier='$fichier',
              libfichier='$libfichier',
              type_courrier='A'");      
       }
		catch(PDOException $e)
		{
			echo 'PDO ' . $method . ' Error: ' . $e->getMessage();
		}
		return intval($pers_insert);
            
    
   }

public function liste_courrier_scanne_pour_ce_courrier($id_courrier,$ligne=0,$trie='',$visible=1){
        if($ligne) $limit="limit 0,$ligne";
        $visible=intval($visible);
        return $this->dbh->query("select * from courrier_scanne s,courrier_arrivee a where s.id_courrier='$id_courrier' and s.id_courrier=a.id_arrivee and s.type_courrier='A' and a.visible='$visible' $trie $limit");
    }

public function Supprimercourrierscanne($id_courrier_scanne){
        return $this->dbh->exec("delete from courrier_scanne  where  id_courrier_scanne='$id_courrier_scanne'");
    }
    
     
}
$classarrivee= new arrivee();
?>