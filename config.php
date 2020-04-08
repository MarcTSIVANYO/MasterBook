<?php

session_start();
ini_set("display_errors", "0");
error_reporting(E_ALL ^ E_NOTICE);
date_default_timezone_set('UTC');
define('DOSSIER_ATTACHE', 'attache_upload');
define('MOIS_COURANT', date('m'));
define('ANNEE_COURANTE', date('Y'));
define('ANNEE_COURANTE', date('Y'));
define('STR_PAD_DEPART',3);
define('STR_PAD_ARRIVEE',3);
define('CODEDEPART','/CR/DE');
define('CODEARRIVEE','/CR/AR');
define('CHANGEREP',$CHANGEREP); 
define('UPLOAD_COURRIERS_SEND','fichiers/courriers_depart/');
define('UPLOAD_COURRIERS_RECU','fichiers/courriers_arrivee/');
require(CHANGEREP.'class/database.php');
require(CHANGEREP."class/email.php");
require(CHANGEREP."class/person.php");
require(CHANGEREP."class/groupe.php");
require(CHANGEREP."class/departement.php");
require(CHANGEREP."class/acces.php");
require(CHANGEREP."class/visiteur.php");
require(CHANGEREP."class/courriers_depart.php");
require(CHANGEREP."class/courriers_arrivee.php");
require(CHANGEREP."class/document.php");
require(CHANGEREP."class/classsms.php");
require(CHANGEREP."class/sms.php");
require(CHANGEREP."class/acces_entre_echange.php");
require(CHANGEREP."class/emailing.php");
require(CHANGEREP."class/active.php");
require(CHANGEREP."class/groupecontact.php");
require(CHANGEREP."class/personcontact.php");
include(CHANGEREP.'utiles.php');
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
$upload_dirdoc=CHANGEREP.'documentpdf/';
$fichetype_dirdoc=CHANGEREP.'documentfictype/';
$upload_dircourrier=CHANGEREP.'courrierscanne/'
?>