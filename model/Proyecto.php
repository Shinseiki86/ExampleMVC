<?php
class Proyecto
{
	private $pdo;
    
    public $id_Proyecto;
    public $fecha_Proyecto;
    public $descripcion;
    public $justificacion;
    public $resultado;
    public $convocatoria;
  
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

			$stm = $this->pdo->prepare("SELECT * FROM Proyectos");
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
			          ->prepare("SELECT * FROM Proyectos WHERE id_Proyecto = ?");
			          

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
			            ->prepare("DELETE FROM Proyectos WHERE id_Proyecto = ?");			          

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
			$sql = "UPDATE proyectos SET 
				fecha_Proyecto   = ?, 
		         descripcion     = ?,
				 justificacion   = ?,
				 resultado       = ?,
				 convocatoria    = ?
				  WHERE id_Proyecto = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->fecha_Proyecto, 
                        $data->descripcion,
                        $data->justificacion,
                        $data->resultado,
                        $data->convocatoria,
                        $data->id_Proyecto
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Proyecto $data)
	{
		try 
		{
		$sql = "INSERT INTO proyectos (fecha_Proyecto,descripcion,justificacion,resultado,convocatoria) 
		        VALUES (?, ?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->fecha_Proyecto,
                    $data->descripcion,
					$data->justificacion,
                    $data->resultado,
                    $data->convocatoria,
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}