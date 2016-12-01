    <?php 
        if (!isset($_SESSION)) { session_start(); }
        if(!$_SESSION["user"] || ($_SESSION["rol"] != 0)){
            header('Location: ./');
        }
    ?>
<h1 class="page-header">Logro</h1>

<div class="well well-sm text-right">
    <a class="btn btn-primary" href="?c=Logro&a=Crud">Nuevo Logro</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th style="width:180px;">Logro</th>
            <th>participacion</th>
 
            <th style="width:60px;"></th>
            <th style="width:60px;"></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($this->model->Listar() as $r): ?>
        <tr>
            <td><?php echo $r->id_Logro; ?></td>
            <td><?php echo $r->participacion; ?></td>
            <td>
                <a href="?c=Logro&a=Crud&id_Logro=<?php echo $r->id_Logro; ?>">Editar</a>
            </td>
            <td>
                <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=Logro&a=Eliminar&id_Logro=<?php echo $r->id_Logro; ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table> 
