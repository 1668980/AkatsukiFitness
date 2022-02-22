<?php
class Entrainement {
    public $id;
    public $idUser;
    public $name;
    public $difficulte;
    public $type;
    

    public function __construct($id,$idUser,$name,$difficulte,$type){
        if($id != 0 ){
            $this->idexercice = $id;
        }else{
            $this->idexercice = 0;
        }
        
        $this->idUser = $idUser;
        $this->name = $name;
        $this->difficulte = $difficulte;
        $this->type = $type;
       


    }

} 
?>