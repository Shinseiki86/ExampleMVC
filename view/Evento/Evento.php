    <?php 
        if (!isset($_SESSION)) { session_start(); }
        if(!$_SESSION["user"] || ($_SESSION["rol"] != 0)){
            header('Location: ./');
        }
    ?>
<h1 class="page-header">Evento</h1>

<div class="well well-sm text-right">
    <a class="btn btn-primary" href="?c=Evento&a=Crud">Nuevo Evento</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th style="width:180px;">Evento</th>
            <th>Fecha</th>
            <th>Descripción</th>
            <th style="width:60px;"></th>
            <th style="width:60px;"></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar() as $r): ?>
        <tr>
            <td><?php echo $r->id_Evento; ?></td>
            <td><?php echo $r->fecha_Evento; ?></td>
            <td><?php echo $r->descripcion_Evento; ?></td>
            <td>
                <a href="?c=Evento&a=Crud&id_Evento=<?php echo $r->id_Evento; ?>">Editar</a>
            </td>
            <td>
                <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=Evento&a=Eliminar&id_Evento=<?php echo $r->id_Evento; ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table> 
