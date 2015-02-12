
<?php 
	include_once 'includes/connection_db.php'; //INCLUYO ARCHIVO DE CONEXIÓN
	
	//======== CONSULTAR ========= //

	$id_materia = $_POST['materia'];
	$id_estudiante= $_POST ['usuario'];

	$selectJoin = "SELECT * FROM estudiantes 
			INNER JOIN notas_estudiante ON estudiantes.id_estudiante = notas_estudiante.id_estudiante
			INNER JOIN nota             ON nota.id_notas             = notas_estudiante.id_notas
			INNER JOIN materia          ON materia.id_materia        = notas_estudiante.id_materia WHERE materia.id_materia=$id_materia AND estudiantes.id_estudiante=$id_estudiante";


	$resultQuery = mysqli_query($con,$selectJoin);
?>


<table border="10">
	 <tr>
	   <td>Nombre Nota</td>
	   <td>Nota</td> 
	   <td>Porcentaje nota</td>
	   <td>Total</td>
	 </tr>

	<?php
		$varAumento=0;
		$nombre;
		while ($row = mysqli_fetch_array($resultQuery)) {
			$nombre=$row['nombre']." ".$row['apellidos'];
			$nombre_materia=$row['nombre_materia'];
				echo "

				  <tr>
				    <td>".$row['nombre_nota']."</td>
				    <td>".$row['valor']."</td> 
				    <td>".$row['porcentaje']."</td>
				    <td>".$row['valor'] * $row['porcentaje']."</td>
				  </tr>
				";

			$varAumento++;

			$arrayNota[$varAumento]=$row['valor'] * $row['porcentaje'];
		}

	?>
</table>

<?php 

	echo $nombre_materia.":";
	echo$arrayNota[1]+$arrayNota[2];
	echo "</br>";
	echo  $nombre;

?>