<?php 
	class agendaDAO extends conexao
	{
		public function __construct()
		{
			parent:: __construct();
		}
		
		public function buscarTodos()
		{
			$sql = "SELECT * FROM contacts";
			try
			{
				$stmt = $this->db->prepare($sql);
				$stmt->execute();
				$this->db = null;
				$resultado = $stmt->fetchAll(PDO::FETCH_OBJ);
				return $resultado;
				
			}
			catch(Exception $e)
			{
				return "Problema ao buscar os contatos";	
			}
		}
		public function inserir($agenda)
		{
			$sql = "INSERT INTO contacts (name, phone, observations) VALUES (?, ?, ?)";
			try
			{
				$stmt = $this->db->prepare($sql);
				$stmt->bindValue(1, $agenda->getName());
				$stmt->bindValue(2, $agenda->getPhone());
				$stmt->bindValue(3, $agenda->getObservations());
				$stmt->execute();
				$this->db = null;
				return "Contato inserido com sucesso!";
			}
			catch(Exception $e)
			{
				return "Problema ao inserir contato";	
			}
		}
		public function buscarUm($agenda)
		{
			$sql = "SELECT * FROM contacts WHERE id = ?";
			try
			{
				$stmt = $this->db->prepare($sql);
				$stmt->bindValue(1, $agenda->getId());
				$stmt->execute();
				$this->db = null;
				$resultado = $stmt->fetchAll(PDO::FETCH_OBJ);
				return $resultado;
				
			}
			catch(Exception $e)
			{
				return "Problema ao buscar um contato";	
			}
		}
		public function alterar($agenda)
		{
			$sql = "UPDATE contacts SET name = ?, phone = ?, observations = ? WHERE id = ?";
			try
			{
				$stmt = $this->db->prepare($sql);
				$stmt->bindValue(1, $agenda->getName());
				$stmt->bindValue(2, $agenda->getPhone());
				$stmt->bindValue(3, $agenda->getObservations());
				$stmt->bindValue(4, $agenda->getId());
				$stmt->execute();
				$this->db = null;
				return "Contato alterado com sucesso!";
			}
			catch(Exception $e)
			{
				return "Problema ao alterar contato";	
			}
		}
		public function excluir($agenda)
		{
			$sql = "DELETE FROM contacts WHERE id = ?";
			try
			{
				$stmt = $this->db->prepare($sql);
				$stmt->bindValue(1, $agenda->getId());
				$stmt->execute();
				$this->db = null;
			return "Contato excluido com sucesso!";
			}
			catch(Exception $e)
			{
				return "Problema ao excluir contato";	
			}
		}
    }
?>