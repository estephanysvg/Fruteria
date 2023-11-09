<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>LA FRUTERIA</title>
</head>
<body>


<?php 
session_start();
if(isset($_GET['cliente'])){
   $_SESSION['nombreCliente']= $_GET['cliente'];
    header("Location:compra.php");

}
?>
<H1> La Frutería del siglo XXI</H1>
<B>BIENVENIDO A LA NUESTRA FRUTERÍA</B><br>
<form action="<?=$_SERVER['PHP_SELF'];?>" method="get">
    Introduzca su nombre del cliente:<input name="cliente" type="text"> <br>
</form>
</body>
</html>
