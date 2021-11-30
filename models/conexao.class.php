<?php
	abstract class conexao
	{
		protected $db;
		
		public function __construct()
		{
			//PDO - Multi-banco
			//parametros para abrir conexao com o Banco de dados : 1 - qual banco de dados será utilizado, 2 - servidor e 3 - nome do banco de dados (loja).
			
			$parametros = "mysql:host=localhost;dbname=agenda;charset=utf8mb4";
			//PDO: criar uma instância do objeto PDO (parâmetro para abertura, usuário do BD e senha).
			
			$this->db = new PDO($parametros, "root", "");
			//isso é necessário para versões menores do que 8 do php
			//$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
	}//fim classe
?>