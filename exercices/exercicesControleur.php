<?php 

$tabRes = array();
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_HOST', 'localhost');
define('DB_DATABASE', 'akatsuki_db');
require_once("../includes/modele.inc.php");
require_once("../exercices/exercices_DAO.php");
$exercices = new exerciceDAO(DB_USER, DB_PASS, DB_HOST, DB_DATABASE);
$exercices->init("exercicecatalogue", "idexercicecatalogue");

function lister(){
	global $tabRes, $exercices;
	$tabRes['action'] = "lister";
	try {
		$tabRes['listeExercices'] = array();
		$tabRes['listeExercices'] = $exercices->getExercices();
	} catch (Exception $e) {
	} finally {
	}
}


function rechercher(){
	global $tabRes, $exercices;
	$rctitre = $_POST['rctext'];
	$tabRes['action'] = "rechercher";
	try {
		$tabRes['listeRechercher'] = array();
		$tabRes['listeRechercher'] = $exercices->getexerciceByTitre($rctitre);
	} catch (Exception $e) {
	} finally {
	}
}

function listerParGenre()
{
	global $tabRes;
	$genre = $_POST['genre'];
	$tabRes['action'] = "listerParGenre";
	$requete = "SELECT * FROM exercices";
	try {
		$unModele = new exercicesModele($requete, array());
		$stmt = $unModele->executer();
		$tabRes['listeParGenre'] = array();
		while ($ligne = $stmt->fetch(PDO::FETCH_OBJ)) {
			$tabRes['listeExercices'][] = $ligne;
			$tabGenre = explode(',', $ligne->genres);
			foreach ($tabGenre as $v) {
				if ($v == $genre) {
					$tabRes['listeParGenre'][] = $ligne;
				} else {
				}
			}
		}
	} catch (Exception $e) {
		$tabRes['erreur'][] = $e;
	} finally {
		unset($unModele);
	}
}

$action = $_POST['action'];

switch ($action) {
	case "listerParGenre":
		listerParGenre();
		break;
	case "lister":
		lister();
		break;
    case "rechercher":
        rechercher();
        break;
}
    

?>