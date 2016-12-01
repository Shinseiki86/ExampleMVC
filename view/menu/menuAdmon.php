
<nav role="navigation" class="navbar navbar-inverse navbar-fixed-top">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a href="#" class="pull-left">
			  <img src="assets/img/logo.png"  width="42" height="42">
			</a>
		</div>

		<div id="navbarCollapse" class="collapse navbar-collapse">
			<ul class="nav navbar-nav">
				<li class="active"><a href="./">Inicio</a></li>
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">Gestionar
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
					  <li><a href="./?c=Proyecto">Gestión de Proyectos</a></li>
					  <li><a href="./?c=Docente">Gestión de Docentes</a></li>
					  <li><a href="./?c=Evento">Gestión de Eventos</a></li> 
					  <li><a href="./?c=Logro">Gestión de Logros</a></li> 
					</ul>
				</li>

				<li><a href="./?c=chat">Soporte</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="#"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION["user"] ?></a></li>
				<li class="active"><a href="./?close=true"><span class="glyphicon glyphicon-off"></span> Cerrar sesión</a></li>
			</ul>
		  </div>
	</div>
</nav>
	