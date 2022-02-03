<?php
class Utilisateur {
    public $idUser;
    public $email;
    public $firstName;
    public $lastName;
    public $date;
    public $password;
    public $gender;

    public function __construct($id,$last,$first,$email,$date)
    {
        if($id != 0 ){
            $this->idUser = $id;
        }else{
            $this->idUser = 0;
        }
        $this->lastName = $last;
        $this->firstName = $first;
        $this->email = $email;
        $this->date = $date;
        $this->gender = "homme";
    }

    public function setPassword($pswd){
        $this->password = $pswd;
    }
} 
?>