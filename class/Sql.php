<?php

//criação de classe (SQL) para interagir com o banco de dados
//sql herda PDO
class Sql extends PDO{
	//cria variável de conexão
	private $conn;
	
	//cria metodo construtor com a conexão no banco, para ser chamado assim que um novo objeto da classe for criado.
	public function __construct(){
		//utiliza o this pois a variavel é private fora do método
		//cria objeto do PDO e faz a conexão com o banco
		$this->conn = new PDO("mysql:dbname=dbphp7;host=localhost", "root", "");
	}

	////////UTILIZAÇÃO DE COMANDOS SQL/////////

	private function setParams($statment, $parameters = array()){
		foreach ($parameters as $key => $value) {
			$this->setParam($key, $value);
		}
	}

	private function setParam($statment, $key, $value){
		$statment->bindParam($key, $value);
	}


	//cria método query(que vai enviar comandos pro sql).
	//OBS: variavel rawQuery recebe o codigo bruto sql
	//OBS: variavel params vai receber os parametros para serem usados no comando sql
	public function query($rawQuery, $params = array()){
		//stmt = instrução recebe comando prepare para gerar uma instrução preparada.
		$stmt = $this->conn->prepare($rawQuery);

		$this->setParams($stmt, $params);

		$stmt->execute();
		return $stmt;


	}

	public function select ($rawQuery, $params = array()):array{
		$stmt = $this->query($rawQuery, $params);
		return $stmt -> fetchAll(PDO::FETCH_ASSOC);
	}
}

?>