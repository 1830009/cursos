<h1 class="page-header">Cursos</h1>

<div class="well well-sm text-right">
    <a class="btn btn-primary" href="?c=Curso&a=Crud&x=0">Nuevo Curso</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th style="width:180px;">Curso</th>
            <th>Profesor</th>
            <th>Carrera</th>
            <th style="width:120px;">F. Inicio</th>
            <th style="width:120px;">F. Fin</th>
            <th style="width:60px;"></th>
            <th style="width:60px;"></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar() as $r): ?>
        <tr>
            <td><?php echo $r->Nombre; ?></td>
            <td><?php echo $r->Profesor; ?></td>
            <td><?php echo $r->Carrera; ?></td>
            <td><?php echo $r->Inicio;?></td>
            <td><?php echo $r->Fin; ?></td>
            <td>
                <a href="?c=curso&a=Crud&x=0&id=<?php echo $r->id; ?>">Editar</a>
            </td>
            <td>
                <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=Curso&x=0&a=Eliminar&id=<?php echo $r->id; ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table> 