<?php 
	include_once 'includes/connection_db.php'; //INCLUYO ARCHIVO DE CONEXIÓN

		$materiaEscogida=$_POST['materia'];
		//======== Unir consultas de distintas tablas ========= // 
		//inner Join es igual a Join";
		$selectJoin = "SELECT estudiantes.id_estudiante, estudiantes.nombre, estudiantes.apellidos,materia.nombre_materia FROM estudiantes 
			INNER JOIN estudiante_materia ON estudiantes.id_estudiante = estudiante_materia.id_estudiante
			INNER JOIN materia            ON materia.id_materia        = estudiante_materia.id_materia WHERE materia.id_materia=$materiaEscogida";

		$resultQueryJoin = mysqli_query($con,$selectJoin);

		while ($row = mysqli_fetch_array($resultQueryJoin)) {

			echo "  
				<form action='notas.php' method='post'>
					<select name='usuario'>
						<option value='".$row['id_estudiante']."'>".$row['id_estudiante'] ."</option>
					</select>"
					
					." ".

					$row["nombre"]." ".$row["apellidos"]

					." ".
				
					"<select name='materia'>
						<option value='".$materiaEscogida."'>".$row['nombre_materia'] ."</option>
					</select>"
					
					." ".
					
					"<input type='submit' value='Ver notas'>

				</form>
			"
			;
 		}
			
 ?>