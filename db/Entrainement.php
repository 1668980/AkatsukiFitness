<?php
class Entrainement {
    public $id;
    public $name;
    public $difficulte;
    public $type;
    public $duree;
    public $ExerciseList;
  

    public function __construct($id,$name,$difficulte,$type,$duree,$ExerciseList)
    {
        if($id != 0 ){
            $this->idexercice = $id;
        }else{
            $this->idexercice = 0;
        }
    }

} 
?>