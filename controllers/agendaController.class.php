<?php
	require_once "models/conexao.class.php";
	require_once "models/agendaDAO.class.php";
	require_once "models/agenda.class.php";

	
	class agendaController
	{
		public function listar()
		{
			$agendaDAO = new agendaDAO();
			$ret = $agendaDAO->buscarTodos();
			require_once "views/listarAgenda.php";
			
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
					$agenda = new agenda(null, $_POST["name"], $_POST["phone"], $_POST["observations"]);
					$agendaDAO = new agendaDAO();
					$ret = $agendaDAO->inserir($agenda);
					header("location:index.php?controle=agendaController&metodo=listar&msg=$ret");
				}
			}
			require_once "views/form_contato.html";
		}
		public function alterar()
		{
			if(isset($_GET["id"]))
			{
				$agenda = new agenda($_GET["id"]);
				$agendaDAO = new agendaDAO();
				$ret = $agendaDAO->buscarUm($agenda);
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
					$agenda = new agenda($_POST["id"], $_POST["name"], $_POST["phone"], $_POST["observations"]);
					$agendaDAO = new agendaDAO();
					$retorno = $agendaDAO->alterar($agenda);
					header("location:index.php?controle=agendaController&metodo=listar&msg=$retortno");
				}
			}
		}
		public function excluir()
		{
			if(isset($_GET["id"]))
			{
				$agenda = new agenda($_GET["id"]);
				$agendaDAO = new agendaDAO();
				$retorno = $agendaDAO->excluir($agenda);
				header("location:index.php?controle=agendaController&metodo=listar&msg=$retorno");
			}
		}
    }
?>