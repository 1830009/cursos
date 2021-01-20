<h1 class="page-header">
    <?php echo $alm->id != null ? $alm->Nombre : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=Curso">Cursos</a></li>
  <li class="active"><?php echo $alm->id != null ? $alm->Nombre : 'Nuevo Registro'; ?></li>
</ol>

<form id="frm-curso" action="?c=Curso&a=Guardar&x=0" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $alm->id; ?>" />
    
    <div class="form-group">
        <label>Nombre</label>
        <input type="text" name="Nombre" value="<?php echo $alm->Nombre; ?>" class="form-control" placeholder="Ingrese el Nombre del Curso" data-validacion-tipo="requerido|min:3" />
    </div>
    
    <div class="form-group">
        <label>Profesor</label>
        <input type="text" name="Profesor" value="<?php echo $alm->Profesor; ?>" class="form-control" placeholder="Ingrese El Nombre del Profesor"  />
    </div>
    
    <div class="form-group">
        <label>Carrera</label>
        <input type="text" name="Carrera" value="<?php echo $alm->Carrera; ?>" class="form-control" placeholder="Ingrese su Carrera"/>
    </div>
    
    <div class="form-group">
        <label>Fecha de Inicio</label>
        <input type="text" name="Inicio" value="<?php echo $alm->Inicio; ?>" class="form-control datepicker" placeholder="Ingrese la Fecha de Inicio" data-validacion-tipo="requerido" />
    </div>
    <div class="form-group">
        <label>Fecha de Finalización</label>
        <input type="text" name="Fin" value="<?php echo $alm->Fin; ?>" class="form-control datepicker" placeholder="Ingrese la Fecha de Finalización" data-validacion-tipo="requerido" />
    </div>
    
    <hr />
    
    <div class="text-right">
        <button class="btn btn-success">Guardar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-curso").submit(function(){
            return $(this).validate();
        });
    })
</script>