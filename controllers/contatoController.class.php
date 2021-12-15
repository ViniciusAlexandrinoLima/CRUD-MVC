<?php
	require_once "models/conexao.class.php";
	require_once "models/contatoDAO.class.php";
	require_once "models/contato.class.php";

	
	class contatoController
	{
		public function listar()
		{
			$contatoDAO = new contatoDAO();
			$ret = $contatoDAO->buscarTodos();
			require_once "views/listarContato.php";
			
		}

		public function inserir()
		{
			if($_POST)
			{
				if($_POST["name"] == "" && $_POST["phone"] == "" && $_POST["observations"] == "")
				{
					echo "Para cadastrar precisa preencha todos os dados!";
				} else
				{
					$contato = new contato(null, $_POST["name"], $_POST["phone"], $_POST["observations"]);
					$contatoDAO = new contatoDAO();
					$ret = $contatoDAO->inserir($contato);
					header("location:index.php?controle=contatoController&metodo=listar&msg=$ret");
				}
			}
			require_once "views/form_contato.html";
		}
		public function alterar()
		{
			if(isset($_GET["id"]))
			{
				$contato = new contato($_GET["id"]);
				$contatoDAO = new contatoDAO();
				$ret = $contatoDAO->buscarUm($contato);
				require_once "views/edit_contato.php";
			}
			if($_POST)
			{
				if($_POST["name"] == '' && $_POST["phone"] == '' && $_POST["observations"] == '')
				{
					echo "Preencha todos os dados para alterar!";
				}
				else
				{
					$contato = new contato($_POST["id"], $_POST["name"], $_POST["phone"], $_POST["observations"]);
					$contatoDAO = new contatoDAO();
					$retorno = $contatoDAO->alterar($contato);
					header("location:index.php?controle=contatoController&metodo=listar&msg=$retortno");
				}
			}
		}
		public function excluir()
		{
			if(isset($_GET["id"]))
			{
				$contato = new contato($_GET["id"]);
				$contatoDAO = new contatoDAO();
				$retorno = $contatoDAO->excluir($contato);
				header("location:index.php?controle=contatoController&metodo=listar&msg=$retorno");
			}
		}
    }
?>