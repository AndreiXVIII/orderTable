<?php

    require_once 'database/Db.php';

    class Form extends Db
    {
        public $showForm;
        private $request;
        private $mysqli;


        public function __construct()
        {
           $this->showForm = require_once("settings/create_order_form.php");
           $this->mysqli = new Db();
        }

        public function saveDataFromForm(){

           if (isset($_POST['sent'])) {
               $this->request = $_POST;
               $currentDate = date("Y-m-d H:i:s");
               $query = "INSERT INTO orderTable SET name='{$this->request['name']}', surname='{$this->request['last_name']}', phone='{$this->request['phone']}', email='{$this->request['email']}', city='{$this->request['city']}', sum='{$this->request['sum']}', date='{$currentDate}'";
               $this->mysqli->query( $query);
               return "Запись успешно сохранена";
           } 
        }
    }