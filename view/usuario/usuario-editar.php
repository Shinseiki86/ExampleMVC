    <?php 
        if (!isset($_SESSION)) { session_start(); }
        if(!$_SESSION["user"] || ($_SESSION["rol"] != 0)){
            header('Location: ./');
        }
    ?>
<h1 class="page-header">
    <?php echo $usu->id_usuario != null ? $usu->nombre : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=Usuario">Usuarios</a></li>
  <li class="active"><?php echo $usu->id_usuario != null ? $usu->nombre : 'Nuevo Registro'; ?></li>
</ol>

<form id="frm-Docente" action="?c=Usuario&a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id_ceduladoc2" id="id_ceduladoc2" value="<?php echo $usu->id_ceduladoc; ?>" />
    <input type="hidden" name="tipo_usuariop" id="tipo_usuariop" value="<?php echo $usu->tipo_usuario; ?>" />
    <input type="hidden" name="id_usuario2" id="id_usuario2" value="<?php echo $usu->id_usuario; ?>" />
    
    <div class="form-group">
        <label>Id Usuario</label>
        <input type="text" name="id_usuario" value="<?php echo $usu->id_usuario; ?>" class="form-control" placeholder="Ingrese su Id" disabled/>
    </div>

    <div class="form-group">
        <label>Nombre Usuario</label>
        <input type="text" name="nombre" value="<?php echo $usu->nombre; ?>" class="form-control" placeholder="Ingrese nombre usuario" data-validacion-tipo="requerido|min:3" />
    </div>



    <div class="form-group">
        <label>Apellido Usuario</label>
        <input type="text" name="apellido" value="<?php echo $usu->apellido; ?>" class="form-control" placeholder="Ingrese apellido de usuario" data-validacion-tipo="requerido|min:3" />
    </div>


    <div class="form-group">
        <label>Password</label>
        <input type="password" name="password" value="<?php echo $usu->password; ?>" class="form-control" placeholder="Ingrese contraseña" data-validacion-tipo="requerido|min:3" />
    </div>

    <div class="form-group">
        <label for="sel1">Tipo Usuario:</label>
        <select class="form-control" id="tipo_usuario" name="tipo_usuario" data-validacion-tipo="requerido">
                <option value="">Seleccione</option>
                <option value="0">Administrador</option>
                <option value="1">Usuario Normal</option>
        </select>
    </div>

     <div class="form-group">
        <label for="sel1">Docente:</label>
        <select class="form-control" id="id_ceduladoc" name="id_ceduladoc" data-validacion-tipo="requerido">
                <option value="">Seleccione</option>
                <?php foreach($this->model->ListarDocentes() as $r): ?>
                <?php  echo "<option value=".$r->id_ceduladoc.">".$r->nombre." ".$r->apellido."</option>";  ?>
                <?php endforeach; ?>
        </select>
    </div>
    
    <hr />
    
    <div class="text-right">
        <button class="btn btn-success">Guardar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-docente").submit(function(){
            return $(this).validate();
        });

        if($('#id_ceduladoc2').val().length > 0){         
            $("#id_ceduladoc option[value="+ $('#id_ceduladoc2').val() +"]").attr("selected",true);
        }

         if($('#tipo_usuariop').val().length > 0){ 
            $("#tipo_usuario option[value="+ $('#tipo_usuariop').val() +"]").attr("selected",true);
        }

    })
</script>