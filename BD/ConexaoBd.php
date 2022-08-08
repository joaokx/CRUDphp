<?php

class ConexaoBd{ 
    var $connection;

    function openConnect(){
        $servername = 'localhost';
        $username ='root';
        $password = '';
        $dbname =  'carro';
        $this -> connection = new  mysqli($servername, $username, $password, $dbname);
    }
    function getConnect(){
        return $this -> connection;
    }
}
?>  