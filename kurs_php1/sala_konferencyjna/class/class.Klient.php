<?php
//require_once("../db.php");
    class Client 
    {
        protected $name;
        protected $surname;
        protected $id_reservation;

        public function __construct($name, $surname, $id_reservation = 0)
        {
            $this->name = $name;
            $this->surname = $surname;
            $this->id_reservation = $id_reservation;
        }

        public function getClient_name ()
        {
            return $this->name;
        }
        public function getClient_surname ()
        {
            return $this->surname;
        }
        public function getClient_id_reservation ()
        {
            return $this->id_reservation;
        }
        public function setClient ($name, $surname, $id_reservation = 0)
        {
            $this->name = $name;
            $this->surname = $surname;
            $this->id_reservation = $id_reservation;
        }
        public function setClient_id_reservation ($id_reservation)
        {
            $this->id_reservation = $id_reservation;
        }
        public function saveToBaseClient($db)
        {
            $db->query("INSERT INTO clients (firstname, surname, id_reservation) 
                VALUE (?, ?, ?);
            ", $this->name, $this->surname, $this->id_reservation);
        }
    }
?>