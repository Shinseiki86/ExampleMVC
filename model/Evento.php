<?php
class Evento
{
	private $pdo;
    
    public $id_Evento;
    public $fecha_Evento;
    public $descripcion_Evento;
    

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

			$stm = $this->pdo->prepare("SELECT * FROM Eventos");
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
			          ->prepare("SELECT * FROM Eventos WHERE id_Evento = ?");
			          

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
			            ->prepare("DELETE FROM Eventos WHERE id_Evento = ?");			          

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
			$sql = "UPDATE Eventos SET 
						fecha_Evento       = ?,
						descripcion_Evento	 = ?
				    WHERE id_Evento = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->fecha_Evento, 
                        $data->descripcion_Evento,
                        $data->id_Evento
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Evento $data)
	{
		try 
		{
		$sql = "INSERT INTO Eventos (fecha_Evento,descripcion_Evento) 
		        VALUES (?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
					$data->fecha_Evento, 
                    $data->descripcion_Evento,
                )
			);

		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	

}