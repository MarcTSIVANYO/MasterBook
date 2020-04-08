<?php
 
Class Document{
    
   private $dbh;
    
   public function __construct(){ 
        $this->dbh = new Database();
    } 
    
    
   public function liste_document($ligne=0,$trie=''){
     if($ligne) $limit="limit 0,$ligne";
     $visible=intval($visible);
     return $this->dbh->query("select * from document  $trie $limit");
   }
   
   public function liste_document_type($type_doc,$ligne=0,$trie=''){
     if($ligne) $limit="limit 0,$ligne";
     $visible=intval($visible);
     return $this->dbh->query("select * from document  where type_doc='$type_doc' $trie $limit");
   }
   
   
    public function liste_document_etat_type($type_doc,$etat,$ligne=0,$trie=''){
     if($ligne) $limit="limit 0,$ligne";
     $visible=intval($visible);
     return $this->dbh->query("select * from document  where type_doc='$type_doc' and etat_doc='$etat' $trie $limit");
   }
   
   public function liste_document_etat_type_pour_niveau($pourniveau,$type_doc,$etat,$ligne=0,$trie=''){
     if($ligne) $limit="limit 0,$ligne";
     $visible=intval($visible);
     return $this->dbh->query("select * from document  where type_doc='$type_doc' and pour_id_niveau_doc='$pourniveau' and etat_doc='$etat'  $trie $limit");
   }
   
    public function liste_document_etat_type_par_niveau($auteur_doc_transfert,$parniveau,$type_doc,$etat,$ligne=0,$trie=''){
     if($ligne) $limit="limit 0,$ligne";
     $visible=intval($visible);
     return $this->dbh->query("select * from document  where type_doc='$type_doc' and par_id_niveau_doc='$parniveau' and etat_doc='$etat' and auteur_doc_transfert='$auteur_doc_transfert' $trie $limit");
   }
  
   
   
   public function InfoSur_document($id_doc){
    $tab=$this->dbh->query("select * from document  where id_doc='$id_doc'");
    $result=$tab->fetch();
    return $result;
   }
   
   public function this_document($id_doc){
    return $this->dbh->query("select * from document  where id_doc='$id_doc'");
   }
   
   
   public function liste_document_enyoye_par($auteur_doc_transfert,$type_doc,$ligne=0,$trie=''){
     if($ligne) $limit="limit 0,$ligne";
    return $this->dbh->query("select * from document  where auteur_doc_transfert='$auteur_doc_transfert' and type_doc='$type_doc'  $trie $limit");
   }
   
   public function liste_document_recu_par($pourqui,$type_doc,$ligne=0,$trie=''){
     if($ligne) $limit="limit 0,$ligne";
    return $this->dbh->query("select * from transfert_document t, document d  where t.id_doc=d.id_doc and t.pourqui='$pourqui' and d.type_doc='$type_doc'  $trie $limit");
   }
   
   
   public function Supprimer_document($id_doc){
    return $this->dbh->exec("delete from document   where id_doc='$id_doc'");
   }
   
   public function validation_document($id_doc,$etat_doc){
    $lastmod=time();
    return $this->dbh->exec("update document set etat_doc='$etat_doc',lastmod='$lastmod'   where id_doc='$id_doc'");
   }
   
    public function InfoSur_suggestions_pour_ce_document($id_doc,$suggestion_pour,$suggestion_par){
    $tab=$this->dbh->query("select * from suggestion_document  where id_doc='$id_doc' and pourqui='$suggestion_pour' and parqui='$suggestion_par'");
    $result=$tab->fetch();
    return $result;
   }
   
   public function inserer_suggestions_pour_ce_document($id_doc,$suggestion_doc,$suggestion_pour,$suggestion_par){
    $lastmod=time();
    $this->supprimer_suggestions_pour_ce_document($id_doc,$suggestion_pour,$suggestion_par);
    $pour_insert=$this->dbh->exec("insert into suggestion_document set id_doc='$id_doc', pourqui='$suggestion_pour',parqui='$suggestion_par',suggestion_doc='$suggestion_doc' ");
           return $pour_insert;
    }
    
    public function supprimer_suggestions_pour_ce_document($id_doc,$suggestion_pour,$suggestion_par){
    //$lastmod=time();
    $pour_insert=$this->dbh->exec("delete suggestion_document where id_doc='$id_doc' and pourqui='$suggestion_pour' and parqui='$suggestion_par'");
    return $pour_insert;
    }
   
    public function toutes_suggestions_de_ce_document_pour($id_doc,$pourqui,$ligne=0,$trie=''){
     if($ligne) $limit="limit 0,$ligne";
    return $this->dbh->query("select * from suggestion_document where id_doc='$id_doc' and pourqui='$pourqui'  $trie $limit");
   }
   
   
   public function nbre_suggestions_de_ce_document_pour($id_doc,$pourqui){ 
    $tab=$this->dbh->query("select * from suggestion_document where id_doc='$id_doc' and pourqui='$pourqui'");
    return $tab->rowCount();
   }
   
   
   public function recharge_document($id_doc,$fichier_doc){
    $lastmod=time();
    return $this->dbh->exec("update document set fichier_doc='$fichier_doc',lastmod='$lastmod'   where id_doc='$id_doc'");
   }
   
   
   
   
   public function InfoSur_transfert_document($id_transfert){
    $tab=$this->dbh->query("select * from transfert_document  where id_transfert='$id_transfert'");
    $result=$tab->fetch();
    return $result;
   }
   
   
   public function Last_document_auteur($auteur_doc_transfert){
    $tab=$this->dbh->query("select Max(id_doc) as maxid from document  where auteur_doc_transfert='$auteur_doc_transfert'");
    $result=$tab->fetch();
    return intval($result['maxid']);
   }
   
   
   
   public function supprimer_transfert_document($my_last_id_doc,$pourquival,$auteur_doc_transfert){
    //$lastmod=time();
    $my_last_id_doc=intval($my_last_id_doc);
    $pour_insert=$this->dbh->exec("delete transfert_document set id_doc='$my_last_id_doc', pourqui='$pourquival',parqui='$auteur_doc_transfert'");
    return $pour_insert;
    }
   
   
   public function transfert_document($my_last_id_doc,$pourqui=array()){
    $my_last_id_doc=intval($my_last_id_doc);
    $auteur_doc_transfert=$_SESSION['appmail']['me'];
    if($my_last_id_doc){
                foreach($pourqui as $val){
                       $this->supprimer_transfert_document($my_last_id_doc,$val,$auteur_doc_transfert);
                    $pour_insert=$this->dbh->exec("insert into transfert_document set id_doc='$my_last_id_doc', pourqui='$val',parqui='$auteur_doc_transfert'");
                } 
              }
     return $pour_insert;
   }
   
   
    public function liste_personne_recu_transfert_document_by_me($id_doc,$auteur_doc_transfert,$ligne=0,$trie=''){
    if($ligne) $limit="limit 0,$ligne";
    $result=$this->dbh->query("select * from transfert_document  where id_doc='$id_doc' and parqui='$auteur_doc_transfert' $trie $limit ");
    return $result;
   }
   
   
   
   
   public function insertion_document($options=array(),$pourqui=array()){
    $default =array("intitule_doc"=>"",
                     "date_doc"=>"",
                     "type_doc"=>"",
                     "fichier_doc"=>"",
                     "id_doc"=>""
                        );
    $options = array_merge($default, $options);
    extract($options);
       	try
		{
		     $auteur_doc_transfert=$_SESSION['appmail']['me'];
		      $lastmod=time();
			  $doc_insert=$this->dbh->exec("insert into document set 
                intitule_doc='$intitule_doc',date_doc='$date_doc',fichier_doc='$fichier_doc',type_doc='$type_doc',lastmod='$lastmod',auteur_doc_transfert='$auteur_doc_transfert'");
              
              $my_last_id_doc=$this->Last_document_auteur($auteur_doc_transfert);
              
              if($my_last_id_doc && $doc_insert){
                foreach($pourqui as $val){
                    $pour_insert=$this->dbh->exec("insert into transfert_document set id_doc='$my_last_id_doc', pourqui='$val',parqui='$auteur_doc_transfert' ");
                }
                 
              }
                          
       
       }
		catch(PDOException $e)
		{
			echo 'PDO ' . $method . ' Error: ' . $e->getMessage();
		}
		return intval($doc_insert);
            
    
   }
   
   
   
   
   
   
   /**     SOUS  CATEGORIE DOCUMENT     ***/
   
   
   public function insertion_document_scategorie($options=array()){
    $default =array("intitule_scat_doc"=>"",
                     "fichier_scat_doc"=>"",
                     "indice_scat_doc"=>"",
                     "visible_scat_doc"=>"",
                     "id_cat_doc"=>"",
                     "id_grpe"=>"",
                     "id_scat_doc"=>""
                        );
    $options = array_merge($default, $options);
    extract($options);
       	try
		{
		      $lastmod=time();
              $fichier='';
               if(strlen(trim($fichier_scat_doc))>0) $fichier=",fichier_scat_doc='$fichier_scat_doc'";
			  $grpe_insert=$this->dbh->exec("insert into document_scategorie set 
                intitule_scat_doc='$intitule_scat_doc',id_cat_doc='$id_cat_doc',id_grpe='$id_grpe',visible_scat_doc='$visible_scat_doc', indice_scat_doc='$indice_scat_doc' $fichier ");
                    
        }
		catch(PDOException $e)
		{
			echo 'PDO ' . $method . ' Error: ' . $e->getMessage();
		}
		return intval($grpe_insert);
            
    
   }
   
   
   
    public function modification_document_scategorie($options=array()){
    $default =array("intitule_scat_doc"=>"",
                     "fichier_scat_doc"=>"",
                     "indice_scat_doc"=>"",
                     "visible_scat_doc"=>"",
                     "id_cat_doc"=>"",
                      "id_grpe"=>"",
                     "id_scat_doc"=>""
                        );
    $options = array_merge($default, $options);
    extract($options);
       	try
		{
		      $lastmod=time();
              $fichier='';
               if(strlen(trim($fichier_scat_doc))>0) $fichier=",fichier_scat_doc='$fichier_scat_doc'";
			  $grpe_insert=$this->dbh->exec("update document_scategorie set 
                intitule_scat_doc='$intitule_scat_doc',id_cat_doc='$id_cat_doc',id_grpe='$id_grpe',visible_scat_doc='$visible_scat_doc', indice_scat_doc='$indice_scat_doc' $fichier  where id_scat_doc='$id_scat_doc'");
                    
        }
		catch(PDOException $e)
		{
			echo 'PDO ' . $method . ' Error: ' . $e->getMessage();
		}
		return intval($grpe_insert);
            
    
   }
   
   
   
   
   public function supprimer_document_scategorie($id_scat_doc){
    return $this->dbh->exec("delete from document_scategorie   where id_scat_doc='$id_scat_doc'");
   }
   
    public function liste_document_scategorie($ligne=0,$trie='',$visible=1){
     if($ligne) $limit="limit 0,$ligne";
     $visible=intval($visible);
     if($visible==2){
        $sqlvisible="";
     }else{
        $sqlvisible=" and s.visible_scat_doc=$visible";
     }
     return $this->dbh->query("select * from document_scategorie s,document_categorie c where s.id_cat_doc=c.id_cat_doc  $sqlvisible  $trie $limit");
   }
   
   
   
   
   public function liste_document_scategorie_by_categorie($id_cat_doc,$ligne=0,$trie='',$visible=1){
     if($ligne) $limit="limit 0,$ligne";
     $visible=intval($visible);
     if($visible==2){
        $sqlvisible="";
     }else{
        $sqlvisible=" and s.visible_scat_doc=$visible";
     }
     return $this->dbh->query("select * from document_scategorie s,document_categorie c where s.id_cat_doc=c.id_cat_doc and c.id_cat_doc='$id_cat_doc'  $sqlvisible  $trie $limit");
   }
   
   
   public function liste_document_scategorie_group_by_groupe($id_cat_doc,$visible=1){
     $visible=intval($visible);
     if($visible==2){
        $sqlvisible="";
     }else{
        $sqlvisible=" and visible_scat_doc=$visible";
     }
    return $this->dbh->query("select * from groupe where id_grpe in (select id_grpe from document_scategorie where id_cat_doc='$id_cat_doc' $sqlvisible)");
   }
   
   
   public function liste_document_scategorie_by_groupe($id_cat_doc,$id_grpe,$visible=1){
     $visible=intval($visible);
     if($visible==2){
        $sqlvisible="";
     }else{
        $sqlvisible=" and visible_scat_doc=$visible";
     }
     return $this->dbh->query("select * from document_scategorie where id_cat_doc='$id_cat_doc' and id_grpe='$id_grpe'  $sqlvisible ");
   }
   
   
   
   
   public function InfoSur_document_scategorie($id_scat_doc){
    $tab=$this->dbh->query("select * from document_scategorie s,document_categorie c where s.id_cat_doc=c.id_cat_doc and s.id_scat_doc='$id_scat_doc'");
    $result=$tab->fetch();
    return $result;
   }
   
public function supprimer_acces_document_scategorie($id_scat_doc,$id_pers){
    return $this->dbh->exec("delete from acces_document_scategorie   where id_scat_doc='$id_scat_doc' and  id_pers='$id_pers'");
   }
   
public function supprimer_acces_document_scategorie_byId($id){
    return $this->dbh->exec("delete from acces_document_scategorie   where id='$id'");
   }
   
   
   
   public function liste_acces_thisdocument_scategorie($id_scat_doc,$ligne=0,$trie='',$visible=1){
        if($ligne) $limit="limit 0,$ligne";
        $visible=intval($visible);
        return $this->dbh->query("select *  from acces_document_scategorie d, person p, niveau_document n where d.id_scat_doc='$id_scat_doc' and  d.id_pers=p.id_pers and p.visible='$visible' and n.id_niveau_doc=d.id_niveau_doc  $trie $limit");
    }
   
   
   public function Is_acces_document_type($id_type_doc,$id_pers){
        $tab=$this->dbh->query("select *  from acces_document_scategorie where id_pers='$id_pers' and  id_scat_doc in (select id_scat_doc from  document_scategorie where id_cat_doc in(select id_cat_doc from document_categorie where id_type_doc='$id_type_doc' ))");
        return $tab->rowCount();
    }
    
     public function Is_acces_document_categorie($id_cat_doc,$id_pers){
        $tab=$this->dbh->query("select *  from acces_document_scategorie where id_pers='$id_pers' and  id_scat_doc in (select id_scat_doc from  document_scategorie where id_cat_doc='$id_cat_doc') ");
        return $tab->rowCount();
    }
    
     public function Is_acces_document_scategorie($id_scat_doc,$id_pers){
        $tab=$this->dbh->query("select *  from acces_document_scategorie where id_pers='$id_pers' and  id_scat_doc ='$id_scat_doc'");
        return $tab->rowCount();
    }
    
    
    public function Is_acces_group_document_scategorie($id_pers,$id_grpe){
        $tab=$this->dbh->query("select *  from acces_document_scategorie where id_pers='$id_pers' and  id_scat_doc in (select id_scat_doc from document_scategorie where id_grpe='$id_grpe')");
        return $tab->rowCount();
    }
    
    
    
     public function Is_niveau_document_scategorie($id_scat_doc,$id_niveau_doc,$id_pers){
        $tab=$this->dbh->query("select *  from acces_document_scategorie where id_niveau_doc='$id_niveau_doc' and id_pers='$id_pers' and  id_scat_doc ='$id_scat_doc'");
        return $tab->rowCount();
    }
    
    public function Mon_niveau_document_scategorie($id_scat_doc,$id_pers){
        $tab=$this->dbh->query("select *  from acces_document_scategorie where  id_pers='$id_pers' and  id_scat_doc ='$id_scat_doc'");
        $result=$tab->fetch();
        return $result['id_niveau_doc'];
    }
    
    
   
   
   
   
   
public function acces_document_scategorie($options=array()){
    $default =array("id_pers"=>"",
                     "id_scat_doc"=>"",
                     "id_niveau_doc"=>""
                     );
    $options = array_merge($default, $options);
    extract($options);
       	try
		{
		      $this->supprimer_acces_document_scategorie($id_scat_doc,$id_pers);
			  $grpe_insert=$this->dbh->exec("insert into acces_document_scategorie set 
                 id_pers='$id_pers',
                 id_niveau_doc='$id_niveau_doc',
                 id_scat_doc='$id_scat_doc'");
                    
        }
		catch(PDOException $e)
		{
			echo 'PDO ' . $method . ' Error: ' . $e->getMessage();
		}
		return intval($grpe_insert);
            
    
   }

   
  
  public function niveau_document_scategorie($options=array()){
    $default =array("niveau_doc"=>"",
                     "id_scat_doc"=>"",
                     "indice_niveau_doc"=>"",
                     "id_niveau_doc"=>""
                     );
    $options = array_merge($default, $options);
    extract($options);
       	try
		{
			  $grpe_insert=$this->dbh->exec("insert into niveau_document set 
                 niveau_doc='$niveau_doc',
                 indice_niveau_doc='$indice_niveau_doc',
                 id_scat_doc='$id_scat_doc'");
                    
        }
		catch(PDOException $e)
		{
			echo 'PDO ' . $method . ' Error: ' . $e->getMessage();
		}
		return intval($grpe_insert);
            
    
   }
  
   public function supprimer_niveau_document_scategorie($id_niveau_doc){
    return $this->dbh->exec("delete from niveau_document   where id_niveau_doc='$id_niveau_doc'");
   }
   
  
  public function liste_niveau_thisdocument_scategorie($id_scat_doc,$ligne=0,$trie=''){
        if($ligne) $limit="limit 0,$ligne";
        $visible=intval($visible);
        return $this->dbh->query("select *  from niveau_document  where id_scat_doc='$id_scat_doc'");
    }
    
    
   public function liste_person_acces_niveau_thisdocument_scategorie($id_niveau_doc){
        if($ligne) $limit="limit 0,$ligne";
        $visible=intval($visible);
        return $this->dbh->query("select *  from acces_document_scategorie a, person p   where a.id_pers=p.id_pers and a.id_niveau_doc='$id_niveau_doc'");
    } 
    
  
  
   public function InfoSur_niveau($id_niveau_doc){
        if($ligne) $limit="limit 0,$ligne";
        $visible=intval($visible);
        $tab=$this->dbh->query("select *  from niveau_document  where id_niveau_doc='$id_niveau_doc'");
        $result=$tab->fetch();
        return $result;
    }
  
   
  
  
  
          /**       CATEGORIE DOCUMENT     ***/
   
   
   public function insertion_document_categorie($options=array()){
    $default =array("intitule_cat_doc"=>"",
                     "indice_cat_doc"=>"",
                     "id_type_doc"=>"",
                     "visible_cat_doc"=>"",
                     "id_cat_doc"=>""
                        );
    $options = array_merge($default, $options);
    extract($options);
       	try
		{
		      $lastmod=time();
			  $grpe_insert=$this->dbh->exec("insert into document_categorie set 
                intitule_cat_doc='$intitule_cat_doc',id_type_doc='$id_type_doc',visible_cat_doc='$visible_cat_doc',indice_cat_doc='$indice_cat_doc'");
                    
        }
		catch(PDOException $e)
		{
			echo 'PDO ' . $method . ' Error: ' . $e->getMessage();
		}
		return intval($grpe_insert);
            
    
   }
   
   
   
    public function modification_document_categorie($options=array()){
    $default =array("intitule_cat_doc"=>"",
                     "indice_cat_doc"=>"",
                     "id_type_doc"=>"",
                     "visible_cat_doc"=>"",
                     "id_cat_doc"=>""
                        );
    $options = array_merge($default, $options);
    extract($options);
       	try
		{
		      $lastmod=time();
			  $grpe_insert=$this->dbh->exec("update document_categorie set 
                intitule_cat_doc='$intitule_cat_doc',id_type_doc='$id_type_doc',visible_cat_doc='$visible_cat_doc',indice_cat_doc='$indice_cat_doc' where id_cat_doc='$id_cat_doc'");
                    
        }
		catch(PDOException $e)
		{
			echo 'PDO ' . $method . ' Error: ' . $e->getMessage();
		}
		return intval($grpe_insert);
            
    
   }
   
   
   
   
   public function supprimer_document_categorie($id_cat_doc){
    return $this->dbh->exec("delete from document_categorie   where id_cat_doc='$id_cat_doc'");
   }
   
    public function liste_document_categorie($ligne=0,$trie='',$visible=1){
     if($ligne) $limit="limit 0,$ligne";
     $visible=intval($visible);
     if($visible==2){
        $sqlvisible="";
     }else{
        $sqlvisible=" and c.visible_cat_doc=$visible";
     }
     return $this->dbh->query("select * from document_categorie c,document_type t where c.id_type_doc=t.id_type_doc  $sqlvisible  $trie $limit");
   }
   
   
   
   
   public function liste_document_categorie_by_type($id_type_doc,$ligne=0,$trie='',$visible=1){
     if($ligne) $limit="limit 0,$ligne";
     $visible=intval($visible);
     if($visible==2){
        $sqlvisible="";
     }else{
        $sqlvisible=" and c.visible_cat_doc=$visible";
     }
     return $this->dbh->query("select * from document_categorie c,document_type t where c.id_type_doc=t.id_type_doc and t.id_type_doc='$id_type_doc'  $sqlvisible  $trie $limit");
   }
   
   
   
   public function InfoSur_document_categorie($id_cat_doc){
    $tab=$this->dbh->query("select * from document_categorie c,document_type t where c.id_type_doc=t.id_type_doc and c.id_cat_doc='$id_cat_doc'");
    $result=$tab->fetch();
    return $result;
   }
   
   
   
   
   
   
   
   
   
   
   
   
   
   /**       Type DOCUMENT     ***/
   
   public function insertion_type_document($options=array()){
    $default =array("intitule_type_doc"=>"",
                     "indice_type_doc"=>"",
                     "visible_type_doc"=>"",
                     "id_type_doc"=>""
                        );
    $options = array_merge($default, $options);
    extract($options);
       	try
		{
		      $lastmod=time();
			  $grpe_insert=$this->dbh->exec("insert into document_type set 
                intitule_type_doc='$intitule_type_doc',
                indice_type_doc='$indice_type_doc',visible_type_doc='$visible_type_doc'");
                    
       }
		catch(PDOException $e)
		{
			echo 'PDO ' . $method . ' Error: ' . $e->getMessage();
		}
		return intval($grpe_insert);
            
    
   }
   
   
   public function modification_type_document($options=array()){
    $default =array("intitule_type_doc"=>"",
                     "indice_type_doc"=>"",
                     "visible_type_doc"=>"",
                     "id_type_doc"=>""
                        );
    $options = array_merge($default, $options);
    extract($options);
       	try
		{
		      $lastmod=time();
			  $grpe_insert=$this->dbh->exec("update document_type set 
                intitule_type_doc='$intitule_type_doc',indice_type_doc='$indice_type_doc',visible_type_doc='$visible_type_doc' where id_type_doc='$id_type_doc' ");
                    
       }
		catch(PDOException $e)
		{
			echo 'PDO ' . $method . ' Error: ' . $e->getMessage();
		}
		return intval($grpe_insert);
            
    
   }
   
   
   public function liste_type_document($ligne=0,$trie='',$visible=1){
     if($ligne) $limit="limit 0,$ligne";
      $visible=intval($visible);
     if($visible==2){
        $sqlvisible="";
     }else{
        $sqlvisible=" where visible_type_doc=$visible";
     }
     return $this->dbh->query("select * from document_type $sqlvisible  $trie $limit");
   }
   
   
   public function InfoSur_type_document($id_type_doc){
    $tab=$this->dbh->query("select * from document_type  where id_type_doc='$id_type_doc'");
    $result=$tab->fetch();
    return $result;
   }
    
}
$classdocument=new Document();
?>