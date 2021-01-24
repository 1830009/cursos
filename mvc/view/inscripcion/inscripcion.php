<h1 class="page-header">Inscripciones</h1>

<div class="well well-sm text-right">
    <a class="btn btn-primary" href="?c=Inscripcion&a=Crud&x=0">Nueva Inscripcion</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th style="width:180px;">Alumno</th>
            <th>Curso</th>
            <th style="width:60px;"></th>
            
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar() as $r):
    ?>
        <tr>
            <td><?php echo $r->alumno; ?></td>
            <td><?php echo $r->curso; ?></td>
            
            <td>
                <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=Inscripcion&x=0&a=Eliminar&idA=<?php echo $r->idA;?>&idC=<?php echo $r->idC;?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table> 