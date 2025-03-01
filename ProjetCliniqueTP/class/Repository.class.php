<?php
    class Repository
    {
        protected $stringConnexion = "mysql:host=localhost;dbname=projetclinique";

        protected $usager ="root";

        protected $password = "";

        public function __toString()
        {
            return $this->stringConnexion . " | " . $this->usager . " | " . $this->password;        
        }
    }
?>