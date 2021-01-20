<h1 class="page-header">
    <?php echo $alm->id != null ? $alm->Nombre : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=Alumno">Alumnos</a></li>
  <li class="active"><?php echo $alm->id != null ? $alm->Nombre : 'Nuevo Registro'; ?></li>
</ol>

<form id="frm-alumno" action="?c=Alumno&a=InscribirSQL&x=0" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $alm->id; ?>" />
    
    <div class="form-group">
    <div class="form-group">
        <label>Nombre del Curso</label>
        <input type="hidden" name="Curso" value="<?php echo $alm->id; ?>" class="form-control"/>
    </div>
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
    </div>
    <div class="text-right">
        <button class="btn btn-success">Guardar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-alumno").submit(function(){
            return $(this).validate();
        });
    })
</script>