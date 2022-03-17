<?php 

class exerciceDao extends BaseDAO
{
    protected $_tableName;
	protected $_primaryKey;
	protected $_tableName2;

	public function init($tableName, $primmaryKey){
		$this->_tableName = $tableName;
		$this->_primaryKey = $primmaryKey;
	}

	public function __construct($user, $pass, $host, $database){
		parent::__construct($user, $pass, $host, $database);
	}

	public function getExerciceByTitre($nom){
		$result = $this->fetch($nom, 'nom');
		return $result;
	}

    public function getExercices(){
        $result = $this->fetchAll();
        return $result;
    }

	public function getExoByCat($idCat){
		$result = $this->fetchByCat($idCat);
        return $result;
	}
}

abstract class baseDAO{
	protected $__connection;
	
	public function __construct(){
		$this->_connectToDB(DB_USER, DB_PASS, DB_HOST, DB_DATABASE);
	}

	private function _connectToDB($user, $pass, $host, $database){
		$this->__connection = new mysqli($host, $user, $pass, $database);
		if ($this->__connection->connect_errno) {
			echo "Probleme de connexion au serveur de bd";
			exit();
		}
		
	}

	public function fetch($value, $key = NULL){
		$rows = array();
		if (is_null($key)){
			$key = $this-> _primaryKey;
		}

		$sql = "select * from $this->_tableName where {$key}=?";
		$stmt = $this->__connection->prepare($sql);
		$stmt->bind_param("i", $value);
		$stmt->execute();
		$results1 = $stmt->get_result();
		while ($result = mysqli_fetch_array($results1)) {
			$rows[] = $result;
		}
		return $rows;
	}

	public function getCatbyId(){
		$rows = array();

		$sql = "select * from $this->_tableName ";
		$stmt = $this->__connection->prepare($sql);
		$stmt->execute();
		$results = $stmt->get_result();			
		while ($ligne = mysqli_fetch_object($results)) {
			$rows[] = $ligne;
		}
		return $rows;
	}

	public function fetchByCat($idCat){
		$rows = array();
		$sql = "select * from $this->_tableName where idcategorie = ?";
		$stmt = $this->__connection->prepare($sql);
		$stmt->bind_param("i", $idCat);
		$stmt->execute();
		$results = $stmt->get_result();
			
		while ($ligne = mysqli_fetch_object($results)) {
			$rows[] = $ligne;
		}
		return $rows;
	}

	public function fetchAll(){
		$rows = array();
		$sql = "select * from $this->_tableName limit 25";
		$stmt = $this->__connection->prepare($sql);
		$stmt->execute();
		$results = $stmt->get_result();
			
		while ($ligne = mysqli_fetch_object($results)) {
			$rows[] = $ligne;
		}
		return $rows;
	}

	public function update($keyedArray){
		$sql = "update {$this->_tableName} set ";
		$updates = array();
	
		foreach ($keyedArray as $column=> $value) {
			$updates[] = "{$column}='{$value}'";
		}
		$sql .= implode(',', $updates);
		$sql .= "where idexercicecatalogue=?";
		$stmt = $this->__connection->prepare($sql);
		$stmt->bind_param("i", $keyedArray[$this->_primaryKey]);
		$stmt->execute();
	}
	
	public function insert($donnees){
		$sql = "insert into {$this->_tableName} values (0,";
		$sql .= implode(',', $donnees);
		$sql .= ")";
		$stmt = $this->__connection->prepare($sql);
		$stmt->execute();
	}
}

?>

