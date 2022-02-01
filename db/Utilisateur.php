<?php
class Utilisateur {
    public $idUser;
    public $email;
    public $firstName;
    public $lastName;
    public $date;

    public function __construct($id,$email,$first,$last,$date)
    {
        $this->idUser = $id;
        $this->email = $email;
        $this->firstName = $first;
        $this->lastName = $last;
        $this->date = $date;
    }
} 
?>