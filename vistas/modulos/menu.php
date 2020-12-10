<aside class="main-sidebar">

	 <section class="sidebar">

		<ul class="sidebar-menu">

		<?php

		if($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Entrenador"){

			echo 

			'<li class="active">

				<a href="inicio">

					<i class="fa fa-home"></i>
					<span>Inicio</span>

				</a>

			</li>

			
			
			';

		}


		if($_SESSION["perfil"] == "Administrador"){

			
			echo
			'<li>

				<a href="usuarios">

					<i class="fa fa-user"></i>
					<span>Usuarios</span>

				</a>

			</li>';



		}


		if($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Entrenador"){

			echo '

			<li>

				<a href="categorias">

					<i class="fa fa-circle-o"></i>
					<span>Categorías</span>

				</a>

			</li>

			<li>

				<a href="ligas">

					<i class="fa fa-th"></i>
					<span>Ligas</span>

				</a>

			</li>

			<li>

				<a href="catligas">

					<i class="fa fa-sign-out"></i>
					<span>Categorias de ligas</span>

				</a>

			</li>

			<li>

				<a href="entrenadores">

					<i class="fa fa-lightbulb-o"></i>
					<span>Entrenadores</span>

				</a>

			</li>

			<li>

				<a href="entrenadorligas">

					<i class="fa fa-bullhorn"></i>
					<span>Entrenadores a ligas</span>

				</a>

			</li> 
			
			<li>

				<a href="deportistas">

					<i class="fa fa-futbol-o"></i>
					<span>Deportistas</span>

				</a>

			</li>
			
			<li>

				<a href="deportistaligas">

					<i class="fa fa-smile-o"></i>
					<span>Deportistas-ligas</span>

				</a>

			</li> ';




		}


		if($_SESSION["perfil"] == "Administrador"){

			echo 

			'<li>

			<a href="becas">

				<i class="fa fa-cubes"></i>
				<span>Becas</span>

			</a>

			</li> 

			
			
			';



		}

		if($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Entrenador"){

			echo
			'<li>


				<a href="becadeportista">

					<i class="fa fa-check-circle-o"></i>
					<span>Becas asignadas</span> 

				</a>

			</li>';


		}





		?>
			
			<!--<li>

				<a href="catligas">

					<i class="fa fa-circle-o"></i>
					<span>categorias de ligas</span>

				</a>

			</li>-->



			<!--<li>

				<a href="entrenadorligas">

					<i class="fa fa-bullhorn"></i>
					<span>Entrenadores a ligas</span>

				</a>

			</li> 

			<li>

				<a href="deportistaligas">

					<i class="fa fa-smile-o"></i>
					<span>deportistas a ligas</span>

				</a>

			</li> 

			<li>

				<a href="becas">

					<i class="fa fa-cubes"></i>
					<span>Becas</span>

				</a>

			</li> 

			<li>

				<a href="becadeportista">

					<i class="fa fa-check-circle-o"></i>
					<span>Becas asignadas</span> 

				</a>

			</li> 
			

			<li>

				<a href="clientes">

					<i class="fa fa-users"></i>
					<span>Clientes</span>

				</a>

			</li>

			<li class="treeview">

				<a href="#">

					<i class="fa fa-list-ul"></i>
					
					<span>Ventas</span>
					
					<span class="pull-right-container">
					
						<i class="fa fa-angle-left pull-right"></i>

					</span>

				</a>

				<ul class="treeview-menu">
					
					<li>

						<a href="ventas">
							
							<i class="fa fa-circle-o"></i>
							<span>Administrar ventas</span>

						</a>

					</li>

					<li>

						<a href="crear-venta">
							
							<i class="fa fa-circle-o"></i>
							<span>Crear venta</span>

						</a>

					</li>

					<li>

						<a href="reportes">
							
							<i class="fa fa-circle-o"></i>
							<span>Reporte de ventas</span>

						</a>

					</li>-->

				</ul>

			</li>

		</ul>

	 </section>

</aside>