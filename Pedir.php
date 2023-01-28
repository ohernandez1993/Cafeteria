<?php
require_once './mysqlConnect.php';

?>
<!DOCTYPE html>
<html>
    
    <head>
        
    </head>
    <body>
        <form method="post">
            
            Producto:
            <select name="producto" required="true">
                <option value="">Seleccione</option>
                <?php 
                    
                    $query = "SELECT * FROM productos";
                    $xResultado = mysqli_query($con, $query);
                    while ($vResultado = mysqli_fetch_array($xResultado)){
                        ?>
                        <option value="<?php echo $vResultado['stock']."-".$vResultado['id'] ?>"><?php echo $vResultado['nombre_producto']." stock ".$vResultado['stock'] ?></option>
                        <?php
                    }
                
                ?>
            </select>
            
            <br><br>
            
            Cantidad:
            <input type="number" name="cantidad" required="true"><br>
            
            <br><br>
            
            <input type="submit" value="Pedir" name="pedir">
            
            <br>
            <br><br>
            <a href="index.php">Registrar</a>
            <a href="Consultar.php">Consultar</a>
            <a href="Pedir.php">Pedir</a>
        </form>
    </body>
</html>

<?php
    
if(!empty($_POST['pedir'])){
    
    $vRegistros = explode("-",$_POST['producto']);
    
    $nCantidad = $vRegistros[0];
    $nId = $vRegistros[1];
    
    if($nCantidad <= 0){
        
        ?>
        <script>alert('No se encuentran productos en stock')</script>
        <?php
        
    }else{
        
        $resta = $nCantidad - $_POST['cantidad'];
        
        $actualiza = mysqli_query($con, "UPDATE productos SET stock = ".$resta." WHERE id = ".$nId);
        
        if($actualiza){
            
            if($_POST['cantidad'] > $nCantidad){
                
                ?>
                    <script>alert('El pedido es mayor a la cantidad de stock disponibles')</script>
                <?php
                
            }else{
            
                $inserta = mysqli_query($con,"INSERT INTO pedidos (id_producto,cantidad,fecha) values (".$nId.",".$_POST['cantidad'].",".date("Y-m-d").")");
            
                if($inserta){
                
                    ?>
                        <script>alert('Pedido realizado con exito')</script>
                    <?php
                    header('Location: http://localhost/Cafeteria/Pedir.php');
                }else{
                    
                    ?>
                        <script>alert('Ocurrio un error al realizar el pedido')</script>
                    <?php
                
                }
            }
            
        }
        
    }
    
}

?>
