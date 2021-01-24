<?php
class Inscripcion
{
	private $pdo;
    
    public $Curso;
    public $Alumno;

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
			$Consulta="SELECT a.id idA,c.id idC,a.Nombre alumno,c.Nombre curso FROM alumno_curso ac JOIN alumnos a ON a.id=ac.Alumno_id JOIN cursos c ON c.id=ac.Curso_id";
			$stm = $this->pdo->prepare($Consulta);
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die('
			<script>
			function mensaje() {

			   alert("Lo sentimos, ocurrio un error al obtener los datos");
			   location.href="index.php?x=inscripcion";
			  }
			   
			  setTimeout(mensaje,1000);
			  </script>
		   ');
		}
	}

	public function Obtener($id)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM alumno_curso WHERE Alumno_id = ?");
			          

			$stm->execute(array($id));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die('
			 <script>
			 function mensaje() {
 
				alert("Lo sentimos, ocurrio un error al obtener los datos");
				location.href="index.php?x=inscripcion";
			   }
				
			   setTimeout(mensaje,1000);
			   </script>
			');
		}
	}

	public function Eliminar($id,$idc)
	{
		try 
		{
			$stm = $this->pdo
			            ->prepare("DELETE FROM alumno_curso WHERE Alumno_id = ? AND Curso_id= ?");			          

			$stm->execute(array($id,$idc));
		} catch (Exception $e) 
		{
			die('
			 <script>
			 function mensaje() {
 
				alert("Lo sentimos, No ha sido posible Eliminarlo");
				location.href="index.php?x=inscripcion";
			   }
				
			   setTimeout(mensaje,1000);
			   </script>
			');
		}
	}

	public function Actualizar($data)
	{
		try 
		{
			$sql = "UPDATE alumno_curso SET 
						Curso_id       = ?
				    WHERE Alumno_id = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->Curso,
                        $data->Alumno
					)
				);
		} catch (Exception $e) 
		{
			?>
			<script>
				alert('El alumno Ya se encuentra Inscrito en esta Materia');
			</script>
			<?php 
			
		}
	}

	public function Registrar(Inscripcion $data)
	{
		try 
		{
		$sql = "INSERT INTO alumno_curso (Alumno_id,Curso_id) 
		        VALUES (?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->Alumno,
                    $data->Curso
                )
			);
		} catch (Exception $e) 
		{
			 die('
			 <script>
			 function mensaje() {
 
				alert("Lo sentimos, El alumno ya se encuentra Inscrito");
				location.href="index.php?x=inscripcion";
			   }
				
			   setTimeout(mensaje,1000);
			   </script>
			');
		}
	}
}
