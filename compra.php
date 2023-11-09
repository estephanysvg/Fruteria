<html>
<head>
<meta charset="UTF-8">
<title>compra</title>
</head>
<body>
<?php 

//iniciamos la sesion
session_start();

//una de las dos opciones será realizada (Anotar o Eliminar)

if(isset($_POST['accion'])){
    switch($_POST['accion']){
        case 'Anotar':

          //si están definidas...
            if(isset($_POST['fruta']) && isset($_POST['cantidad'])){
                $fruta = $_POST['fruta'];
                $cantidad = $_POST['cantidad'];
                
              // si ya se le ha dado una vez a anotar entonces puede que la fruta ya haya sido seleccionada ateriormente, si es así se le sumará el valor anterios
                if(isset($_SESSION['compraRealizada'][$fruta])){
                    $_SESSION['compraRealizada'][$fruta] += $cantidad;
                    if( $_SESSION['compraRealizada'][$fruta] <= 0){
                      unset($_SESSION['compraRealizada'][$fruta]);
                    }
                } else {
                    // si no, agregará la fruta 
                    $_SESSION['compraRealizada'][$fruta] = $cantidad;

                    if($cantidad <= 0){
                      unset($_SESSION['compraRealizada'][$fruta]);
                    }
                }
              }
                
                $compraRealizada = "";

                //para visualizar la compra
             
                $compraRealizada = '<table border="1">';
            
            foreach($_SESSION['compraRealizada'] as $key => $value){
                $compraRealizada .= "<tr>";
                $compraRealizada .= "<td>$key</td>";
                $compraRealizada .= "<td>$value</td>";
                $compraRealizada .= "</tr>";
            }
            
            $compraRealizada .= '</table>';
            break;
        case 'Terminar':
          //si se termina entonces volvemos a bienvenida
              header('Location:despedida.php');
  
    }
} else {

    $compraRealizada = "No ha seleccionado nada aún.";
}

if(isset($_SESSION['nombreCliente'])){
  //ponemos el nombre en mayusculas
    $nombreMayus = strtoupper($_SESSION['nombreCliente']);
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>compra</title>
</head>
<body>
    <h1>La Frutería del siglo XXI</h1>
    <?= $compraRealizada?> 
    <b><br>REALICE SU COMPRA  <?= $nombreMayus?></b><br>
    <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
        <b>Selecciona la fruta: 
        <select name="fruta">
            <option value="Platanos">Platanos</option>
            <option value="Naranjas">Naranjas</option>
            <option value="Limones">Limones</option>
            <option value="Manzanas">Manzanas</option>
        </select>
        Cantidad: <input name="cantidad" type="number" value="0" size="4">
        <input type="submit" name="accion" value="Anotar">    
        <input type="submit" name="accion" value="Terminar">    
    </form>
</body>
</html>
