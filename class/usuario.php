<?php
  

	require_once('conexao.php');

	class usuario extends conexao{

		private $email;
		private $senha;
		private $nome;
		private $sobre;
		private $telefone;
		private $tipo;
		private $user_id;

		function __construct(){

			if(!isset($_SESSION)){

				session_start();

			}else{

				return false;

			}

		}

		public function login(){

			
			if($this->validar() == false){

				$pdo = parent::getDB();

				$login = $pdo->prepare("SELECT id, email, senha FROM usuario WHERE email = :email AND senha = :senha");
				$login->bindValue(":email", $this->getemail(), PDO::PARAM_STR);
				$login->bindValue(":senha", $this->getsenha(), PDO::PARAM_STR);
				$login->execute();

				$count = $login->rowCount();

				if($count == '1'){

					$row = $login->fetch();

					$_SESSION['id'] = $row['id'];

					return true;

				}else{

					return false;

				}

			}else{

				return false;

			}
		}
        
		public function cadastro(){

			if($this->validar()){

				$pdo = parent::getDB();

				$cadastro = $pdo->prepare("INSERT INTO usuario (email, nome, sobre, telefone, tipo, senha) VALUES (:email, :nome, :sobre, :telefone, :tipo, :senha)");
				$cadastro->bindValue(":email", $this->getemail(), PDO::PARAM_STR);
				$cadastro->bindValue(":nome", $this->getnome(), PDO::PARAM_STR);
				$cadastro->bindValue(":sobre", $this->getsobre(), PDO::PARAM_STR);
				$cadastro->bindValue(":telefone", $this->gettelefone(), PDO::PARAM_STR);
				$cadastro->bindValue(":tipo", $this->gettipo(), PDO::PARAM_STR);
				$cadastro->bindValue(":senha", $this->getsenha(), PDO::PARAM_STR);
				$cadastro->execute();

				$count = $cadastro->rowCount();

				if($count == '1'){
									
					return ture;

				}else{

					return false;

				}

			}else{
				return false;
			}

		}

		private function validar(){

			$pdo = parent::getDB();

			$validar = $pdo->prepare("SELECT email FROM usuario WHERE email = :email");
			$validar->bindValue(":email", $this->getemail(), PDO::PARAM_STR);
			$validar->execute();

			$count = $validar->rowCount();

			if ($count == '1') {
				
				return false;

			}else{

				return true;

			}

		}

		//fazer a parte de recupera senha por email ou sms falta api sms...
		public function recupera(){

			if($this->validar()){

				return true;

			}else{

				return false;

			}

		}

		public function proteger(){

			if(isset($_SESSION['id'])){

				return true;

			}else{

				return false;

			}

		}

		public function sair(){

			if(isset($_SESSION['id'])){

				session_destroy();

				if(isset($_SESSION['id'])){

					return false;

				}else{

					return true;

				}

			}else{

				return false;

			}
		}


		public function atulizar(){

			if($this->getuser_id() == $_SESSION['id']){

				$pdo = parent::getDB();	

				$atulizar = $pdo->prepare("UPDATE usuario SET senha = :senha, nome = :nome, sobre = :sobre, telefone = :telefone WHERE id = :user_id");
				$atulizar->bindValue(":senha", $this->getsenha(), PDO::PARAM_STR);
				$atulizar->bindValue(":nome", $this->getnome(), PDO::PARAM_STR);
				$atulizar->bindValue(":sobre", $this->getsobre(), PDO::PARAM_STR);
				$atulizar->bindValue(":telefone", $this->gettelefone(), PDO::PARAM_STR);
				$atulizar->bindValue(":user_id", $this->getuser_id(), PDO::PARAM_INT);
				$atulizar->execute();

				$count = $atulizar->rowCount();

				if ($count == '1') {

					return true;
					
				}else{

					return false;

				}

			}else{

				return false;

			}

		}

		public function dados(){

				$pdo = parent::getDB();

				$dados = $pdo->prepare("SELECT * FROM usuario WHERE id = :user_id");
				$dados->bindValue(":user_id", $this->getuser_id(), PDO::PARAM_INT);
				$dados->execute();

				$count = $dados->rowCount();

				if($count =='1'){

					return $dados->fetch(PDO::FETCH_ASSOC);

				}else{

					return false;

				}
		}

		public function setemail($email){
			$this->email = $email;
		}
		public function setsenha($senha){
			$this->senha = md5($senha);
		}
		public function setnome($nome){
			$this->nome = $nome;
		}
		public function setsobre($sobre){
			$this->sobre = $sobre;
		}
		public function settelefone($telefone){
			$this->telefone = $telefone;
		}
		public function settipo($tipo){
			$this->tipo = $tipo;
		}
		public function setuser_id($user_id){
			$this->user_id = $user_id;
		}

		public function getemail(){
			return $this->email;
		}
		public function getsenha(){
			return $this->senha;
		}
		public function getnome(){
			return $this->nome;
		}
		public function getsobre(){
			return $this->sobre;
		}
		public function gettelefone(){
			return $this->telefone;
		}
		public function gettipo(){
			return $this->tipo;
		}
		public function getuser_id(){
			return $this->user_id;
		}

	}