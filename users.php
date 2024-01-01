<?php

class Users{
        private $id;
        private $username;
        private $email;
        private $phone;
        private $adresse;
        private $ville;
        private $password;
        private $type;

        public function __construct($id,$username,$email,$phone,$adresse,$ville,$password,$type) {
            $this->id = $id;
            $this->username = $username;
            $this->email=$email;
            $this->phone=$phone;
            $this->adresse= $adresse;
            $this->ville=$ville;
            $this->password=$password;
            $this->type = $type;
        }


        /**
         * Get the value of username
         */ 
        public function getUsername()
        {
                return $this->username;
        }

        /**
         * Get the value of email
         */ 
        public function getEmail()
        {
                return $this->email;
        }

        /**
         * Get the value of phone
         */ 
        public function getPhone()
        {
                return $this->phone;
        }

        /**
         * Get the value of adresse
         */ 
        public function getAdresse()
        {
                return $this->adresse;
        }

        /**
         * Get the value of ville
         */ 
        public function getVille()
        {
                return $this->ville;
        }

        /**
         * Get the value of password
         */ 
        public function getPassword()
        {
                return $this->password;
        }

        /**
         * Get the value of type
         */ 
        public function getType()
        {
                return $this->type;
        }

        /**
         * Get the value of id
         */ 
        public function getId()
        {
                return $this->id;
        }

        /**
         * Set the value of id
         *
         * @return  self
         */ 
        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }
    }

?>