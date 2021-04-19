
<?php 
$conexion=mysqli_connect('localhost','root','','cotel');
$continente=$_POST['gerencia'];

	$sql="SELECT id_departamento, id_gerencia, nom_depto FROM departamento WHERE id_gerencia = '$continente'";
	$result=mysqli_query($conexion,$sql);
	$cadena="<label>departamentos</label> 
			<select id='lista2' name='lista2'>";

	while ($ver=mysqli_fetch_row($result)) {
		$cadena=$cadena.'<option value='.$ver[0].'>'.utf8_encode($ver[2]).'</option>';
	}
	echo  $cadena."</select>";
	

?>

