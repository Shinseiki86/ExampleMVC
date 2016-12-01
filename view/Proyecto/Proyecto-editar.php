    <?php 
        if (!isset($_SESSION)) { session_start(); }
        if(!$_SESSION["user"] || ($_SESSION["rol"] != 0)){
            header('Location: ./');
        }
    ?>
<h1 class="page-header">
    <?php echo $proy->id_Proyecto != null ? "Proyecto No. ".$proy->id_Proyecto." ".$proy->descripcion : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=Proyecto">Proyectos</a></li>
  <li class="active"><?php echo $proy->id_Proyecto != null ? $proy->id_Proyecto : 'Nuevo Registro'; ?></li>
</ol>

<form id="frm-Proyecto" action="?c=Proyecto&a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id_proyecto2" id="id_Proyecto2" value="<?php echo $proy->id_Proyecto; ?>" />
    
    
    <div class="form-group">
        <label>Código Proyecto</label>
        <input type="text" name="id_Proyecto" id="id_Proyecto" value="<?php echo $proy->id_Proyecto; ?>" class="form-control" placeholder="" disabled />
    </div>

    <div class="form-group">
        <label>Fecha Proyecto</label>
        <input type="date" name="fecha_Proyecto" value="<?php echo $proy->fecha_Proyecto; ?>" class="form-control" placeholder="Ingrese Fecha del Proyecto" data-validacion-tipo="requerido|min:1" />
    </div>

   

    <div class="form-group">
        <label>Descripcion</label>
        <input type="text" name="descripcion" value="<?php echo $proy->descripcion; ?>" class="form-control" placeholder="Ingrese Descripción" data-validacion-tipo="requerido|min:1" />
    </div>
    

   <div class="form-group">
        <label>Justificacion</label>
        <input type="text" name="justificacion" value="<?php echo $proy->justificacion; ?>" class="form-control" placeholder="Ingrese Justificación" data-validacion-tipo="requerido|min:1" />
    </div>
    

   <div class="form-group">
        <label>Resultados</label>
        <input type="text" name="resultado" value="<?php echo $proy->resultado; ?>" class="form-control" placeholder="Ingrese Resultados" data-validacion-tipo="requerido|min:1" />
    </div>

  <div class="form-group">
        <label>Convocatoria</label>
        <input type="text" name="convocatoria" value="<?php echo $proy->convocatoria; ?>" class="form-control" placeholder="Ingrese Convocatoria" data-validacion-tipo="requerido|min:1" />
    </div>

    <hr />
    
    <div class="text-right">
        <button class="btn btn-success">Guardar</button>
    </div>
</form>

<script>
    $(document).ready(function(){

        $("#frm-Proyecto").submit(function(){
            return $(this).validate();
        });

    })
</script>