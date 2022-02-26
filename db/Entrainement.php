<?php
require_once 'db/Exercice.php';
class Entrainement {
    public $id;
    public $name;
    public $difficulte;
    public $type;
    public $listExercises = array();
    

    public function __construct($id,$name,$difficulte,$type){
        if($id != 0 ){
            $this->idexercice = $id;
        }else{
            $this->idexercice = 0;
        }
        $this->name = $name;
        $this->difficulte = $difficulte;
        $this->type = $type;
    }
} 
?>