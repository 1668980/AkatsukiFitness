<?php
class Exercise {
    public $idExercise;
    public $idexercicecatalogue;
    public $poids;
    public $repetitions;
    public $sets;
    public $duree;
    public $dureepause;
   

    public function __construct($id,$idexercicecatalogue,$poids,$repetitions,$sets,$duree,$dureepause)
    {
        if($id != 0 ){
            $this->idExercise = $id;
        }else{
            $this->idExercise = 0;
        }
        
        $this->idexercicecatalogue = $idexercicecatalogue;
        $this->poids = $poids;
        $this->repetitions = $repetitions;
        $this->sets = $sets;
        $this->duree = $duree;
        $this->dureepause = $dureepause;
    }

} 
?>