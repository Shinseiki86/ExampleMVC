    <?php 
        if (!isset($_SESSION)) { session_start(); }
        if(!$_SESSION["user"] || ($_SESSION["rol"] != 0)){
            header('Location: ./');
        }
    ?>
<h1 class="page-header">
    <?php echo $log->id_Logro != null ? "Logro No. ".$log->id_Logro." ".$log->participacion : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=Logro">Logros</a></li>
  <li class="active"><?php echo $log->id_Logro != null ? $log->participacion : 'Nuevo Registro'; ?></li>
</ol>

<form id="frm-Logro" action="?c=Logro&a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id_Logro2" id="id_Logro2" value="<?php echo $log->id_Logro; ?>" />
    

    <div class="form-group">
        <label>Código Logro</label>
        <input type="text" name="id_Logro" id="id_Logro" value="<?php echo $log->id_Logro; ?>" class="form-control" placeholder="" disabled />
    </div>


    <div class="form-group">
        <label>Participación</label>
        <input type="text" name="participacion" value="<?php echo $log->participacion; ?>" class="form-control" placeholder="Ingrese la participacion del logro" data-validacion-tipo="requerido|min:4" />
    </div>

    
    
    <div class="text-right">
        <button class="btn btn-success">Guardar</button>
    </div>
</form>

<script>
    $(document).ready(function(){

        $("#frm-Logro").submit(function(){
            return $(this).validate();
        });


    })
</script>