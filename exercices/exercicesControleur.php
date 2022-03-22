<?php 

$tabRes = array();
define('DB_USER', 'sql5479981');
define('DB_PASS', 'T2WuDe3Ibc');
define('DB_HOST', 'sql5.freemysqlhosting.net');
define('DB_DATABASE', 'sql5479981');
require_once("../includes/modele.inc.php");
require_once("../exercices/exercices_DAO.php");
require_once("../db/conn.php");
$exercices = new exerciceDAO(DB_USER, DB_PASS, DB_HOST, DB_DATABASE);
$exercices->init("exercicecatalogue", "idexercicecatalogue");

function lister(){
	global $tabRes, $exercices,$crud;
	$tabRes['action'] = "lister";
	try {
		$tabRes['listeExercices'] = array();
		$tabRes['listeExercices'] = $exercices->getExercices();
		foreach($tabRes['listeExercices'] as $ex){
			$cat = $crud->getNameOfCat($ex->idcategorie);
			$ex->idcategorie = $cat;
			$tabRes['listeExercices'][] = $ex;
		}
	} catch (Exception $e) {
	} finally {
	}
}


function rechercher(){
	global $tabRes, $exercices, $crud;
	$rctitre = $_POST['rctext'];
	$tabRes['action'] = "rechercher";
	$requete = "SELECT * FROM exercicecatalogue WHERE LOWER(nom) LIKE '%$rctitre%' limit 25 ";
	try {
		$unModele = new exercicesModele($requete, array());
		$stmt = $unModele->executer();
		$tabRes['listeRechercher'] = array();
		while ($ligne = $stmt->fetch(PDO::FETCH_OBJ)) {
			$tabRes['listeRechercher'][] = $ligne;
		}
		foreach($tabRes['listeRechercher'] as $ex){
			$cat = $crud->getNameOfCat($ex->idcategorie);
			$ex->idcategorie = $cat;
			$tabRes['listeRechercher'][] = $ex;
		}
	} catch (Exception $e) {
	} finally {
	}
}

function listerParGenre()
{
	global $tabRes,$crud,$exercices;
	$genre = $_POST['genre'];
	$tabRes['action'] = "listerParGenre";
	try {
		$tabRes['listeExercices'] = array();
		$tabRes['listeExercices'] = $exercices->getExoByCat($genre);
		foreach($tabRes['listeExercices'] as $ex){
			$cat = $crud->getNameOfCat($ex->idcategorie);
			$ex->idcategorie = $cat;
			$tabRes['listeExercices'][] = $ex;
		}
	} catch (Exception $e) {
	} finally {
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
    
echo json_encode($tabRes);

?>