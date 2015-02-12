<?php 
	include_once 'includes/connection_db.php'; //INCLUYO ARCHIVO DE CONEXIÓN
	$query = "SELECT * FROM materia ORDER BY id_materia ASC";
	$resultQuery = mysqli_query($con,$query);
?>
<!DOCTYPE html>
<html>
	<head>
		<title></title>
	</head>
	<body>
		<!-- Select -->
		<form action="estudiantesCurso.php" method="post">
		  Estudiantes:<br/> 
		   <select name="materia">
		   <?php
			   	while ($row = mysqli_fetch_array($resultQuery)) {  
				/*<option value="<?php echo $row['id_estudiante'] ?>"> <?php echo $row['nombre'] ?> </option>*/
					echo "<option value='".$row['id_materia']."'>".$row['nombre_materia'] ."</option>";
				}
			?>
		   </select>
		   <p><input type="submit" value="Ver Estudiantes" /></p>
		</form>
	</body>
</html>