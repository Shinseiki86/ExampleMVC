<?php
class Logro
{
	private $pdo;
    
    public $id_Logro;
    public $participacion;
 

	public function __CONSTRUCT()
	{
		try
		{
			$this->pdo = Database::StartUp();     
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	
	public function Listar()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM logros");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($id)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM logros WHERE id_Logro = ?");
			          

			$stm->execute(array($id));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($id)
	{
		try 
		{
			$stm = $this->pdo
			            ->prepare("DELETE FROM logros WHERE id_Logro = ?");			          

			$stm->execute(array($id));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar($data)
	{
		try 
		{
			$sql = "UPDATE logros SET 
						participacion  = ?
				    WHERE id_Logro = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->participacion, 
                        $data->id_Logro, 
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Logro $data)
	{
		try 
		{
		$sql = "INSERT INTO logros (participacion) 
		        VALUES (?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->participacion,
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	

}