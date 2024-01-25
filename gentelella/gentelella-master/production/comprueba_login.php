<!DOCTYPE html>
<html>
<head>
	<title>Comprueba Login</title>
</head>
<body>
<?php

try{
	$base=new PDO("mysql:host=localhost; dbname=prueba", "root", "");
	$base=setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql
}catch(Exception $e){
	die("Error: " . $e->getMessage());
}

?>

</body>
</html>