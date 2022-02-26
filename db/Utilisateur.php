<?php
class Utilisateur {
    public $id_user;
    public $email;
    public $firstname;
    public $lastname;
    public $dob; //date_of_bith
    public $password;
    public $gender;
    public $weight;
    public $weight_goal;
    public $avatar;

    public function __construct($id,$lastname,$firstname,$email,$dob,$gender,$weight,$weight_goal,$avatar)
    {
        if($id != 0 ){
            $this->id_user = $id;
        }else{
            $this->id_user = 0;
        }
        $this->lastname = $lastname;
        $this->firstname = $firstname;
        $this->email = $email;
        $this->dob = $dob;
        $this->gender = $gender;
        $this->weight = $weight;
        $this->weight_goal = $weight_goal;
        $this->avatar = $avatar;

    }
    

    public function setPassword($pswd){
        $this->password = $pswd;
    }
} 
?>