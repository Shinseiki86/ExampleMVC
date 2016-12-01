    <?php 
        if (!isset($_SESSION)) { session_start(); }
        if(!$_SESSION["user"] || ($_SESSION["rol"] != 0)){
            header('Location: ./');
        }
    ?>
<h1 class="page-header">
    <?php echo $ev->id_Evento != null ? "Evento No. ".$ev->id_Evento." ".$ev->descripcion_Evento : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=Evento">Eventos</a></li>
  <li class="active"><?php echo $ev->id_Evento != null ? $ev->id_Evento : 'Nuevo Registro'; ?></li>
</ol>

<form id="frm-Evento" action="?c=Evento&a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id_Evento2" id="id_Evento2" value="<?php echo $ev->id_Evento; ?>" />
    
    <div class="form-group">
        <label>Código Evento</label>
        <input type="text" name="id_Evento" id="id_Evento" value="<?php echo $ev->id_Evento; ?>" class="form-control" placeholder="" disabled />
    </div>

    <div class="form-group">
        <label>Fecha</label>
        <input type="date" name="fecha_Evento" value="<?php echo $ev->fecha_Evento; ?>" class="form-control" placeholder="Ingrese fecha del evento" data-validacion-tipo="requerido|min:1" />
    </div>
    
    <div class="form-group">
        <label>Descripcion</label>
        <input type="text" name="descripcion_Evento" value="<?php echo $ev->descripcion_Evento; ?>" class="form-control" placeholder="Ingrese descripcion del evento" data-validacion-tipo="requerido|min:4" />
    </div>

    
    
    <div class="text-right">
        <button class="btn btn-success">Guardar</button>
    </div>
</form>

<script>
    $(document).ready(function(){

        $("#frm-Evento").submit(function(){
            return $(this).validate();
        });


    })
</script>