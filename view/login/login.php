<div class="wrapper">
    <form class="form-signin" id="login" name="login" action="#" method="POST">       
      <h2 class="form-signin-heading">Login</h2>
      <input type="text" class="form-control" name="usuario" placeholder="Usuario" required autofocus="" />
      <input type="password" class="form-control" name="password" placeholder="Password" required />      
      <label class="checkbox">
        <!--<input type="checkbox" value="remember-me" id="rememberMe" name="rememberMe"> Remember me-->
      </label>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>   
    </form>
</div>

<?php
  $ok = false;
  require_once 'model/login.php';

  if($_GET && isset($_GET["close"])){
    if($_GET["close"])
      session_destroy();
      header('Location: ./');
  }
  
  if (!isset($_SESSION)) { session_start(); }

  if($_POST){

    $usuario = $_POST["usuario"];
    $password = $_POST["password"];

     foreach($this->model->ListaUsuario($usuario) as $r){

      if(($r->nombre != null and $r->password != null) ){

         if(strtoupper($r->nombre) == strtoupper($usuario) and $r->password == $password){

      		$_SESSION["user"] = $usuario;
            $_SESSION["rol"] = $r->tipo_usuario; //0 = admin, 1 = user
            header('Location: ./');

         }else{
            echo '<div class="alert alert-danger" role="alert">' .
                '<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true""></span>' .
                '<span class="sr-only">Error:</span>' .
                'Listo!' .
                '</div>';
		 

			
        }
      }
    }
  }

?>