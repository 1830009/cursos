<?php
class Curso
{
	private $pdo;
    
    public $id;
    public $Nombre;
    public $Profesor;
    public $Carrera;
    public $Inicio;
    public $Fin;


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

			$stm = $this->pdo->prepare("SELECT * FROM cursos");
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
			          ->prepare("SELECT * FROM cursos WHERE id = ?");
			          

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
			            ->prepare("DELETE FROM cursos WHERE id = ?");			          

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
			$sql = "UPDATE cursos SET 
						Nombre          = ?, 
						Profesor        = ?,
                        Carrera         = ?,
						Inicio          = ?, 
						Fin             = ?
				    WHERE id = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->Nombre, 
                        $data->Profesor,
                        $data->Carrera,
                        $data->Inicio,
                        $data->Fin,
                        $data->id
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Curso $data)
	{
		try 
		{
		$sql = "INSERT INTO cursos (Nombre,Profesor,Carrera,Inicio,Fin) 
		        VALUES (?, ?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->Nombre,
                    $data->Profesor, 
                    $data->Carrera, 
                    $data->Inicio,
                    $data->Fin,
                    //date('Y-m-d')
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}