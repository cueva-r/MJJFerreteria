 <header class="main-header">

 	<!--=====================================
	LOGOTIPO
	======================================-->
 	<a href="" class="logo">
 		<!-- mini logo for sidebar mini 50x50 pixels -->
 		<span class="logo-mini"><b>SIS</b> M</span>
 		<!-- logo for regular state and mobile devices -->
 		<span class="logo-lg"><b>SISTEMA</b> MJJ</span>
 	</a>

 	<!--=====================================
	BARRA DE NAVEGACIÓN
	======================================-->
 	<nav class="navbar navbar-static-top" role="navigation">

 		<!-- Botón de navegación -->

 		<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">

 			<span class="sr-only">Toggle navigation</span>

 		</a>

 		<!-- perfil de usuario -->

 		<div class="navbar-custom-menu">

 			<ul class="nav navbar-nav">

 				<li class="dropdown user user-menu">

 					<a href="#" class="dropdown-toggle" data-toggle="dropdown">

					 	<img src="vistas/img/usuarios/admin/administrador.png" style="height : 25px; margin-right:5px;">
 						<span class="hidden-xs"><?php echo $_SESSION["nombre"]; ?></span>

 					</a>

 					<!-- Dropdown-toggle -->

 					<ul class="dropdown-menu">

 						<li class="user-body">

 							<div class="pull-right">

							 	<a href="salir" class="btn btn-default btn-flat">Perfil</a>
 								<a href="salir" class="btn btn-default btn-flat">Cerrar Sesion</a>

 							</div>

 						</li>

 					</ul>

 				</li>

 			</ul>

 		</div>

 	</nav>

 </header>