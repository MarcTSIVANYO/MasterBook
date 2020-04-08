<?php
session_start();
/**
 * @author NepsterJay
 * @copyright 2014
 */
define('DOSSIER_ATTACHE', 'attache_upload');
define('MOIS_COURANT', date('m'));
define('ANNEE_COURANTE', date('Y'));
define('ANNEE_COURANTE', date('Y'));
define('STR_PAD_DEPART',3);
define('STR_PAD_ARRIVEE',3);
define('CODEDEPART','/CR/D');
define('CODEARRIVEE','/CR/AR');
define('OURMAIL','megaxeli@gmail.com');
require('class/database.php');
require("class/email.php");
require("class/person.php");
require("class/groupe.php");
require("class/departement.php");
require("class/acces.php");
require("class/visiteur.php");
require("class/courriers_depart.php");
require("class/courriers_arrivee.php");
require("class/document.php");
require("class/classsms.php");
require("class/sms.php");
require("class/acces_entre_echange.php");
require("class/emailing.php");
include('utiles.php');
$arraymois=array("Janvier", "F&eacute;vrier", "Mars", "Avril", "Mai", "Juin", 
"Juillet", "Ao&ucirc;t", "Septembre", "Octobre", "Novembre", "D&eacute;cembre");
$arrayday=array("Dimanche","Lundi","Mardi","Mercredi","Jeudi","Vendredi","Samedi");
$arraydoc=array("DA"=>"D&eacute;claration d&apos;une activit&eacute;",
                "SA"=>"Suivi d&apos;une activit&eacute;",
                "RA"=>"Rapport d&apos;activit&eacute;",
                "CR"=>"Convocation de r&eacute;union",
                "CRR"=>"Compte rendu de r&eacute;union",
                "OM"=>"Ordre de mission",
                "RM"=>"Rapport de mission",
                "PV"=>"Planning des visites hebdomadaires",
                "SV"=>"Suivi d&apos;une visite",
                "CAMJMPW"=>"Contrat d&apos;assistance, de mise &agrave; jour et de maintenance de plateforme web",
                "CADHPW"=>"Contrat d&apos;achat de nom de domaine et d&apos;h&eacute;bergement",
                "CCPW"=>"Contrat de cr&eacute;ation de plateforme web",
                "FRIADHPW"=>"Fiche de recueil d&apos;informations pour l&apos;achat de nom de domaine et d&apos;h&eacute;bergement",
                "FRICPW"=>"Fiche de recueil d&apos;informations pour la cr&eacute;ation d&apos;une plateforme web",
                "FTAPW"=>"Fiche technique d&apos;administration d&apos;une plateforme web",
                "PFRIBTS"=>"Fiche de recueil d&apos;informations de besoins technologiques d&apos;une soci&eacute;t&eacute;"
);

$arraydocfic=array("DA"=>"declarationdactivite.docx",
                "SA"=>"suividactivite.docx",
                "RA"=>"rapportdactivite.docx",
                "CR"=>"convocationreunion.docx",
                "CRR"=>"compterendudereunion.docx",
                "OM"=>"ordredemission.docx",
                "RM"=>"rapportdemission.docx",
                "PV"=>"planninghebdo.docx",
                "SV"=>"compterendudevisite.docx",
                "CAMJMPW"=>"contratassmajmt.docx",
                "CADHPW"=>"contratdachatndhb.docx",
                "CCPW"=>"contratdecreationplateforme.docx",
                "FRIADHPW"=>"fichederecueildinfosndhb.docx",
                "FRICPW"=>"fichederecueildinfosplateforme.docx",
                "FTAPW"=>"fichetechniquedegestiondeplateforme.docx",
                "PFRIBTS"=>"fichederecueildebesoins.docx"
);
$upload_dirdoc='documentpdf/';
$fichetype_dirdoc='documentfictype/';
$upload_dircourrier='courrierscanne/'
?>