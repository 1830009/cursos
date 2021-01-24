<h1 class="page-header">
    <?php echo $alm->Curso != null ? $alm->Curso : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=inscripcion&x=0">Inscripcion</a></li>
  <li class="active"><?php echo $alm->Curso != null ? $alm->Curso : 'Nuevo Registro'; ?></li>
</ol>

<form id="frm-alumno" action="?c=Inscripcion&a=Guardar&x=0" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Nombre del Curso</label>
        <select name="curso" class="form-control">
            <?php
            
                $conexion= mysqli_connect('localhost','root','','colegio');
                $consulta ="SELECT id,Nombre FROM cursos";
            
                $registros=mysqli_query($conexion,$consulta);
                // var_dump($registros);
                if($registros->num_rows>0){
                    while($fila = $registros -> fetch_assoc()){
                        echo '<option value='.$fila['id'].'>'.$fila['Nombre'].'</option>';
                    }
                }
            ?>
        </select>

        <label>Nombre del Alumno</label>
        <select name="alumno" class="form-control">
            <?php
                $consulta ="SELECT id,Nombre FROM alumnos";
            
                $registros=mysqli_query($conexion,$consulta);
                // var_dump($registros);
                if($registros->num_rows>0){
                    while($fila = $registros -> fetch_assoc()){
                        echo '<option value='.$fila['id'].'>'.$fila['Nombre'].'</option>';
                    }
                    mysqli_close($conexion);
                }

            ?>
        </select>
    </div>
    <div class="text-right">
        <button class="btn btn-success">Inscribir</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-alumno").submit(function(){
            return $(this).validate();
        });
    })
</script>