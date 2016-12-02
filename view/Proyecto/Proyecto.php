    <?php 
        if (!isset($_SESSION)) { session_start(); }
        if(!$_SESSION["user"]){
            header('Location: ./');
        }
    ?>
<h1 class="page-header">Gestion de Proyectos: Liderazgo y emprendimiento</h1>

<div class="well well-sm text-right">
    <a id="btn-new-Proyecto" class="btn btn-primary" href="?c=Proyecto&a=Crud">Nuevo Proyecto</a>
    <a id="btn-new-Proyecto" class="btn btn-danger" href="pdf.php">Exportar PDF</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th style="width:180px;">Proyecto</th>
            <th>Fecha Proyecto</th>
            <th>Descripcion</th>
            <th>Justificacion</th>
            <th>Resultados</th>
            <th>Convocatoria</th>
            
            <th style="width:60px;"></th>
            <th style="width:60px;"></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($this->model->Listar() as $r): ?>
        <tr>
            <td><?php echo $r->id_Proyecto; ?></td>
            <td><?php echo $r->fecha_Proyecto; ?></td>
            <td><?php echo $r->descripcion; ?></td>
       
            <td><?php echo $r->justificacion; ?></td>
            <td><?php echo $r->resultado; ?></td>
        
           <td><?php echo $r->convocatoria; ?></td>

    <td>
                <a id="col-editar" href="?c=Proyecto&a=Crud&id_Proyecto=<?php echo $r->id_Proyecto; ?>">Editar</a>
            </td>
            <td>
                <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=Proyecto&a=Eliminar&id_Proyecto=<?php echo $r->id_Proyecto; ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table> 


    <?php 
        if (isset($_SESSION) && ($_SESSION["rol"] != 0)) {
		  echo '<script>';
		  echo '$("#btn-new-Proyecto").addClass("hide");';
		  echo '$("tr td:nth-child(8)").hide();';
		  echo '$("tr td:nth-child(9)").hide();';
		  echo '</script>';
		}

    ?>
