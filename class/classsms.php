<?php
// Pour envoyer un SMS sur Wassa vous devez respecter les r�gles suivantes :
// - $from : numero de telephone ou alphanum�rique (Ex: Testcompte (11 caract�res Maxi))
// - $to : destinataire pr�c�d� de l'indicatif EX : 0022891XXXXXX
// - $text : Le test � envoyer (160 caract�res pour une page, Maxi 4 pages et 153 caract�res par page pour plus d'une page)
//Exemple d'envoi de SMS :
// pr�paration des variables
//$from ="TestCompte";
//$to ="0022891XXXXXX";
//$text ="bonjour 2015";
//$text = urlencode($text);

// envoi du SMS
//echo $return = send($from,$to,$text,"00228");

// Si le SMS a r�ussi, vous obtiendrez une r�ponse qui affiche en Json les d�tails de l'envoi
//{"from":"TestCompte","to":"22891659414","country":"00228","text":"bonjour 2015","route":"2","msgId":"WassaTest54bf61b914116538909806","status":"OK","price":"12F CFA","balance":"9988F CFA"} 
// Ex : l'id du message (WassaTestXXXXXXXXXXXXXXXXX) vous permettra de faire une mise � jour du statut du message � travers le rapport de livraison
class wassa_sms{
private $url='http://wassasms.com/secure_gate/route/m2.php';
private $username= 'Your UserName Here';

private $password= 'Your Password Here';

private $apikey= 'Your API Key Here';
private $from= 'Your number';
// Nous n'acceptons que les requetes en post et toutes les requetes passent par l'objet Json qui envoie la requ�te � travers 
// La variable requete (ligne 18)
private $dbh;
    
   public function __construct(){ 
        $this->dbh = new Database();
    } 

function send($to,$text,$code='228'){
                           
		$postfields = array(
		    'user' => $username,
			'pass' => $password,
			'from' => $this->from,
			'to' => $to,
			'text' => urlencode($text),
			'country_code' =>$code	
		);
		
		$requete = json_encode($postfields);
		$postfields = array('requete'=>$requete);
		// a ne pas changer
		$curl = curl_init();
		
		curl_setopt($curl, CURLOPT_URL, $this->url);
		curl_setopt($curl, CURLOPT_COOKIESESSION, true);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $postfields);
		
		        $retour  = curl_exec($curl);
				return $retour;
                curl_close($curl);
}

function InsertInDB($messageto,$message,$messageid){
       return $this->dbh->exec("insert into historiquesms set 
                     messageto='$messageto',
                     message='$message',
                     messageid='$messageid'
                     ");
    }
public function liste($ligne=0,$trie=''){
     if($ligne) $limit="limit 0,$ligne";
     return $this->dbh->query("select * from historiquesms   $trie $limit");
   }
}
$classSMS= new wassa_sms;