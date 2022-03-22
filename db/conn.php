<?php
//connection (local)
// $host = 'localhost';
// $db = 'akatsuki_db';
// $user = 'root';
// $pass = '';
// $chartset = 'utf8mb4';

// remote database connection (online)
// Port number: 3306

$host = 'sql5.freemysqlhosting.net';
$db = 'sql5479981';
$user = 'sql5479981';
$pass = 'T2WuDe3Ibc';
$chartset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;chartset=$chartset";

try {
    // initialize php data object
    $pdo = new PDO($dsn, $user, $pass);
    // show errors
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo '<h1 class="text-success">Hello Database</h1>';
} catch (PDOException $e) {
    throw new PDOException($e->getMessage());
    // echo '<h1 class="text-danger">No Database Found</h1>';

}

// initialize CRUD for database operation functions
require_once 'Crud.php';
//require_once 'Utilisateur.php';
$crud = new Crud($pdo);

//$crud->creerUnCompte(new Utilisateur(0,'Admin', 'Monsieur', 'admin@gmail.com', '1998-01-31'));

//  $crud->insertUser('admin','aaa')
