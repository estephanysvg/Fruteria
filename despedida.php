<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>LA FRUTERIA</title>
</head>
<body>

<?php session_start();



$compraRealizada ="Este es su pedido: <br></br>" .'<table border="1">';
            
foreach($_SESSION['compraRealizada'] as $key => $value){
    $compraRealizada .= "<tr>";
    $compraRealizada .= "<td>$key</td>";
    $compraRealizada .= "<td>$value</td>";
    $compraRealizada .= "</tr>";
}

$compraRealizada .= '</table>';

session_destroy();
 ?>
<H1> La Frutería del siglo XXI</H1>
<?=$compraRealizada ?>
<br> Muchas gracias, por su pedido. <br><br>
<input type="button" value=" NUEVO CLIENTE " onclick="window.location.href='bienvenida.php';">
</body>
</html>