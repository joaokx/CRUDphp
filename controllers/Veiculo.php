<?php
    class VeiculoController{

        var $veiculo;

        function __construct(){
            require_once("models/VeiculoModel.php");
            $this -> veiculo = new VeiculoModel();
        }

        public function index(){
            require_once("views/Header.php");
            require_once("views/Cadastro.php");
            require_once("views/Footer.php");
        }

        public function cadastroVeiculo(){
            require_once("views/Header.php");
            require_once("views/Cadastro.php");
            require_once("views/Footer.php");
        }

        public function cadastroVeiculoAc(){
            $array['nroChassi'] = $_POST["nroChassi"];
            $array['marca'] = $_POST['marca'];
            $array['modelo'] = $_POST['modelo'];
            $array['ano'] = $_POST['ano'];
            $array['placa'] = $_POST['placa'];
            $array['cor'] = $_POST['cor'];
            $array['caracteristica'] = $_POST['caracteristica'];
            

            $this -> veiculo -> cadastrarVeiculo($array);
            $id = $this -> veiculo -> getConsult();
            $this -> cadastroVeiculo();
        }

        public function listagem(){
            $this -> veiculo -> listarVeiculo();
            $result = $this -> veiculo -> getConsult();
    
            $array = array();
    
            while($line = $result->fetch_assoc()){
                array_push($array, $line);
            }
            require_once ("views/Header.php");
            require_once ("views/Listagem.php");
            require_once ("views/Footer.php");
        }

        public function alterarVeiculo($id){
            $this -> veiculo -> consultId($id);
            $result = $this -> veiculo -> getConsult();

            if ($array = $result -> fetch_assoc()){
                require_once ("views/Header.php");
                require_once ("views/Alteracao.php");
                require_once ("views/Footer.php");
            }
        }

        public function alterarVeiculoAc(){
            $array["id"] = $_POST["id"]; 
            $array['nroChassi'] = $_POST["nroChassi"];
            $array['marca'] = $_POST['marca'];
            $array['modelo'] = $_POST['modelo'];
            $array['ano'] = $_POST['ano'];
            $array['placa'] = $_POST['placa'];
            $array['cor'] = $_POST['placa'];
            $array['caracteristica'] = $_POST['caracteristica'];

            $this -> veiculo -> alterarVeiculo($array);
            $this -> listagem();
        }
        
        public function deletarVeiculo($id){
            $this -> veiculo -> deletarVeiculo($id);
            $this -> listagem();
        }

        public function pesquisarVeiculo($dado){
            $this -> veiculo -> pesquisarVeiculo($dado);
            $result = $this -> veiculo -> getConsult();
            
            $array = array();
    
            while($line = $result->fetch_assoc()){
                array_push($array, $line);
            }
            require_once ("views/Header.php");
            require_once ("views/Listagem.php");
            require_once ("views/Footer.php");
        }

    }
?>