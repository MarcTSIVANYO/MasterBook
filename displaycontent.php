<?php
 
$display=$_GET['display'];
	switch($display)
	{
        case"compose":
			require("compose.php");
		break;
        case"inbox":
			require("inbox.php");
		break;
        case"sent":
			require("sent.php");
		break;
        case"archive":
			require("archive.php");
		break;
        case"read":
			require("read.php");
		break;
        case"readsent":
			require("readsent.php");
		break;
        case"chatinbox":
			require("chatinbox.php");
		break;
        
        case"contact":
			require("contact.php");
		break;
        
        case"profile":
			require("profile.php");
		break;
        case"groupe":
			require("groupe.php");
		break;
        case"departement":
			require("departement.php");
		break;
        
        
        case"visiteur":
			require("fiche_visiteur.php");
		break;
        case"mes_visites":
			require("mes_visites.php");
		break;
        case"courriers_depart":
			require("courriers_depart.php");
		break;
        case"courriers_arrivee":
			require("courriers_arrivee.php");
		break;
        case"recommandation_courrier_mine":
			require("recommandation_courrier_mine.php");
		break;
        
        case"typedoc":
			require("document_type.php");
		break;
        case"catdoc":
			require("document_categorie.php");
		break;
        case"scatdoc":
			require("document_sous_categorie.php");
		break;
        case"type_document":
			require("type_document_page.php");
		break;
        
        
        case"grpe_doc":
			require("document_group.php");
		break;
        case"doc_admin":
			require("document_administratif.php");
		break;
        case"doc_web":
			require("document_web.php");
		break;
        case"doc_presta":
			require("document_presta.php");
		break;
        case"smsenvoye":
			require("smsenvoye.php");
		break;
        case"smsliste":
			require("smsliste.php");
		break;
        case"readsms":
			require("readsms.php");
		break;
        case"smssolde":
			require("smssolde.php");
		break;
        case"composeemailing":
			require("emailing.php");
		break;
        case"sentemailing":
			require("listeemailing.php");
		break;
        case"reademailing":
			require("reademailing.php");
		break;
        
        case"contactextern":
			require("contactextern.php");
		break;
        
         case"groupecontact":
			require("groupecontact.php");
		break;
        
		default:
		require("home.php");
		break;
	}

?>
