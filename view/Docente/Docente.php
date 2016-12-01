    <?php 
        if (!isset($_SESSION)) { session_start(); }
        if(!$_SESSION["user"] || ($_SESSION["rol"] != 0)){
            header('Location: ./');
        }
    ?>
<h1 class="page-header">Docentes</h1>

<div class="well well-sm text-right">
    <a class="btn btn-primary" href="?c=Docente&a=Crud">Nuevo docente</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th style="width:180px;">Identificación</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Experiencia</th>
            <th>Estudio</th>
            <th>Publicacion</th>
            <th>Proyecto</th>
            <th style="width:60px;"></th>
            <th style="width:60px;"></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar() as $r): ?>
        <tr>
            <td><?php echo $r->id_ceduladoc; ?></td>
            <td><?php echo $r->nombre; ?></td>
            <td><?php echo $r->apellido; ?></td>
            <td><?php echo $r->experiencia; ?></td>
            <td><?php echo $r->estudio; ?></td>
            <td><?php echo $r->publicacion; ?></td>
            <td><?php echo $this->modelProy->Obtener($r->id_Proyecto)->descripcion; ?></td>
            <td>
                <a href="?c=Docente&a=Crud&id_ceduladoc=<?php echo $r->id_ceduladoc; ?>">Editar</a>
            </td>
            <td>
                <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=Docente&a=Eliminar&id_ceduladoc=<?php echo $r->id_ceduladoc; ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table> 
