    <?php 
        if (!isset($_SESSION)) { session_start(); }
        if(!$_SESSION["user"] || ($_SESSION["rol"] != 0)){
            header('Location: ./');
        }
    ?>
<h1 class="page-header">
    <?php echo $doc->id_ceduladoc != null ? "Docente ".$doc->id_ceduladoc." - ".$doc->nombre." ".$doc->apellido : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=Docente">Docentes</a></li>
  <li class="active"><?php echo $doc->id_ceduladoc != null ? $doc->id_ceduladoc : 'Nuevo Registro'; ?></li>
</ol>

<form id="frm-Docente" action="?c=Docente&a=Guardar" method="post" enctype="multipart/form-data">

    <input type="hidden" name="id_ceduladoc2" value="<?php echo $doc->id_ceduladoc; ?>" />
    
    <div class="form-group">
        <label>Identificación</label>
        <input type="text" name="id_ceduladoc" value="<?php echo $doc->id_ceduladoc; ?>" class="form-control" placeholder="Ingrese su identificacion" data-validacion-tipo="requerido|min:15" required />
    </div>

    <div class="form-group">
        <label>Nombres</label>
        <input type="text" name="nombre" value="<?php echo $doc->nombre; ?>" class="form-control" placeholder="Ingrese su nombre" data-validacion-tipo="requerido|min:3" required />
    </div>
    
    <div class="form-group">
        <label>Apellidos</label>
        <input type="text" name="apellido" value="<?php echo $doc->apellido; ?>" class="form-control" placeholder="Ingrese su apellido" data-validacion-tipo="requerido|min:10" required/>
    </div>

     <div class="form-group">
        <label>Experiencia</label>
        <input type="text" name="experiencia" value="<?php echo $doc->experiencia; ?>" class="form-control" placeholder="Ingrese sus años de experiencia" data-validacion-tipo="requerido|min:1" />
    </div>


    <div class="form-group">
        <label>Estudios</label>
        <input type="text" name="estudio" value="<?php echo $doc->estudio; ?>" class="form-control" placeholder="Ingrese sus estudios" data-validacion-tipo="requerido|min:1" />
    </div>



    <div class="form-group">
        <label>Publicacion</label>
        <input type="text" name="publicacion" value="<?php echo $doc->publicacion; ?>" class="form-control" placeholder="Ingrese publicaciones" data-validacion-tipo="requerido|min:1" />
    </div>


    <div class="form-group">
        <label>Proyecto Asignado</label>
            <select class="form-control" name="id_Proyecto" required>
                <option value="">Ingrese proyecto asignado</option>
                <?php foreach($this->modelProy->Listar() as $proy): ?>
                <option value="<?php echo $proy->id_Proyecto; ?>" <?php echo $doc->id_Proyecto==$proy->id_Proyecto ? 'selected' : ''; ?> >
                    <?php echo $proy->descripcion; ?>
                </option>
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
    })
</script>