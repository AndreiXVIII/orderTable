<?php

    class Db
    {
        private $local = 'localhost';
        private $user = 'Andrei';
        private $password = 'root';
        private $db_base = 'orderTable';
        public $connect;

        public function __construct()
        {
            $this->connect = mysqli_connect($this->local, $this->user, $this->password, $this->db_base) or die (mysqli_error($this->connect));
            mysqli_query($this->connect, "SET NAMES 'utf8'");
        }

        public function query($query)
        {
            $result = mysqli_query($this->connect, $query) or die (mysqli_error($this->connect));
        }
    }