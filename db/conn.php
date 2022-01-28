<?php 

    // developpment connection (local)
    $host = 'localhost';
    $db = 'akatsuki_db';
    $user = 'root';
    $pass = '';
    $chartset = 'utf8mb4';

    // remote database connection (online)
    // $host = 'remotemysql.com';
    // $db = '';
    // $user = '';
    // $pass = '';
    // $chartset = 'utf8mb4';

    $dsn = "mysql:host=$host;dbname=$db;chartset=$chartset";

    try {
        // initialize php data object
        $pdo =new PDO($dsn, $user, $pass);
        // show errors
        $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo '<h1 class="text-success">Hello Database</h1>';
    } catch(PDOException $e) {
        throw new PDOException($e -> getMessage());
       // echo '<h1 class="text-danger">No Database Found</h1>';

    }

    // initialize CRUD for database operation functions
    require_once 'crud.php';
    $crud = new crud($pdo);

  //  $crud->insertUser('admin','aaa')

    echo "<br> test"
?>