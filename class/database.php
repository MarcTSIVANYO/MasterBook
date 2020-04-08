<?php
 
class Database extends pdo {

    private $dbtype; 
    private $host;     
    private $user;
    private $pass; 
    private $database; 

    public function __construct(){ 
        $this->dbtype ='mysql'; 
        $this->host = 'localhost'; 
        $this->user = 'root'; 
        $this->pass = ''; 
        $this->database = 'masterbook_db'; 
        $dns = $this->dbtype.':dbname='.$this->database.";host=".$this->host; 
        parent::__construct( $dns, $this->user, $this->pass ); 
    }     
}
?>