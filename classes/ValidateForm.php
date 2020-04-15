<?php
include "Database.php";

//validation class
class ValidateForm extends Database {
    public $data;
    private $fields =["fname","lname","email","pass"];
    public $errors =[];

    public function __construct($postData)
    {
        parent::__construct();
        $this->data =$postData;
        foreach($this->fields as $field){
            if(!array_key_exists($field,$this->data)){
                print_r("'$field' Does not Exist in form"); 
            }
        }
        $this->validateName();
        $this->validateLastName();
        $this->validateEmail();


        if(!array_filter($this->errors)){
            $fname =$this->data["fname"];
            $lname =$this->data["lname"];
            $email =$this->data["email"];
            $pass =$this->data["pass"];

            $sql="INSERT INTO `users`(`fname`,`lname`,`email`,`password`) VALUES ('$fname','$lname','$email','$pass')";
            $this->query($sql);
            
            header("Location: signup_successfull.php");
           
        }

    }
    
    private function validateName(){
        if(empty($this->data["fname"])){
             $this->error("fname","you can't leave this field empty");
        }else{
            if(strlen($this->data['fname']) < 4){
                $this->error("fname","please type more than 4 characters");

            }if(strlen($this->data['fname']) >=10 ){
                $this->error("fname","please type less than 12 characters");
            }

        }

    }
    // validating last name
    private function validateLastName(){
        if(empty($this->data["lname"])){
             $this->error("lname","you can't leave this field empty");
        }else{
            if(strlen($this->data['lname']) < 4){
                $this->error("lname","please type more than 4 characters");

            }if(strlen($this->data['lname']) >=10 ){
                $this->error("lname","please type less than 12 characters");
            }

        }

    }
    // Validating Email
    private function validateEmail(){
        if(empty($this->data["email"])){
             $this->error("email","you can't leave this field empty");
        }else{
            if(!filter_var($this->data['email'],FILTER_VALIDATE_EMAIL)){
                $this->error("email","Please Type Valid Email");

            }

        }

    }

    private function error($key,$value){
        $this->errors[$key]=$value;
    }
}