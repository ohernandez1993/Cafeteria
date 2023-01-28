<?php 

require_once './mysqlConnect.php';


$query= "SELECT DISTINCT p.nombre_producto, SUM(pe.cantidad) as cantidad FROM pedidos pe INNER JOIN productos p on pe.id_producto = p.id GROUP by pe.id_producto";

$xResultado = mysqli_query($con, $query);


if(!empty($_POST['marmen'])){
    
    $query= "SELECT DISTINCT p.nombre_producto, SUM(pe.cantidad) as cantidad FROM pedidos pe INNER JOIN productos p on pe.id_producto = p.id GROUP by pe.id_producto ORDER BY cantidad desc";

    $xResultado = mysqli_query($con, $query);
    
}


if(!empty($_POST['menmar'])){
    
    $query= "SELECT DISTINCT p.nombre_producto, SUM(pe.cantidad) as cantidad FROM pedidos pe INNER JOIN productos p on pe.id_producto = p.id GROUP by pe.id_producto ORDER BY cantidad asc";

$xResultado = mysqli_query($con, $query);
}



?>
<html>
    <head>
    </head>
    <body>
        <form method="post">
        <center>
           
                <a href="index.php">Registrar</a>
                <a href="Consultar.php">Consultar</a>
                <a href="Pedir.php">Pedir</a>
                
                <br><br>
                
                <input type="submit" value="MAYOR A MENOR" name="marmen">
                
                <input type="submit" value="MENOR A MAYOR" name="menmar">
                
                
                <br><br>
                <table border="1">
                    <tr>
                        <td>Producto</td>
                        <td>Cantidad</td>
                    </tr>
                    <?php 
                    
                    while ($vResultado = mysqli_fetch_array($xResultado)){
                        ?>
                        <tr>
                            <td><?php echo $vResultado['nombre_producto'] ?></td>
                            <td><?php echo $vResultado['cantidad'] ?></td>
                        </tr>
                        <?php
                    }// while ($vResultado){
                    
                    ?>
                </table>
                
            
        
        </center>
        </form>
    </body>
</html>
