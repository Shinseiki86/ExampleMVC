<?php
class Docente
{
	private $pdo;
    
    public $id_ceduladoc;
    public $nombre;
    public $apellido;
    public $experiencia;
    public $estudio;
    public $publicacion;
    public $id_Proyecto;

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

			$stm = $this->pdo->prepare("SELECT * FROM docentes");
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
			          ->prepare("SELECT * FROM docentes WHERE id_ceduladoc = ?");
			          

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
			            ->prepare("DELETE FROM docentes WHERE id_ceduladoc = ?");			          

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
			$sql = "UPDATE docentes SET 
				nombre          = ?, 
		        apellido        = ?,
				experiencia    = ?,
				estudio        = ?,
				publicacion    = ?,
				id_Proyecto     = ?
				WHERE id_ceduladoc = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->nombre, 
                        $data->apellido,
                        $data->experiencia,
                        $data->estudio,
                        $data->publicacion,
                        $data->id_Proyecto,
                        $data->id_ceduladoc
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Docente $data)
	{
		try 
		{
		$sql = "INSERT INTO docentes (id_ceduladoc,nombre,apellido,experiencia,estudio,publicacion,id_Proyecto) 
		        VALUES (?, ?, ?, ?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
					$data->id_ceduladoc,
                    $data->nombre,
                    $data->apellido,
					$data->experiencia,
                    $data->estudio,
                    $data->publicacion,
                    $data->id_Proyecto,
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}