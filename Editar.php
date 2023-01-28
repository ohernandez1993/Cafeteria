<?php
require_once './mysqlConnect.php';


$query= "SELECT * FROM productos WHERE id = ".$_GET['data'];

$xResultado = mysqli_query($con, $query);

$vResultado = mysqli_fetch_array($xResultado);

?>
<!DOCTYPE html>
<html>
    
    <head>
        
    </head>
    <body>
        <form method="post">
            
            Nombre Producto:
            <input type="text" name="producto" required="true" value="<?php echo $vResultado['nombre_producto'] ?>"><br>
            
            referencia:
            <input type="text" name="referencia" required="true" value="<?php echo $vResultado['referencia'] ?>" ><br>
            
            precio:
            <input type="number" name="precio" required="true" value="<?php echo $vResultado['precio'] ?>" ><br>
            
            peso:
            <input type="number" name="peso" required="true" value="<?php echo $vResultado['peso'] ?>"><br>
            
            
            Categoria:
            <input type="text" name="categoria" required="true" value="<?php echo $vResultado['categoria'] ?>"><br>
            
            Stock:
            <input type="number" name="stock" required="true" value="<?php echo $vResultado['stock'] ?>"><br>
            
            <br>
            <input type="submit" value="Actualizar" name="act">
            
            
            <br>
            <a href="Consultar.php">Consultar</a>
            <a href="index.php">Registrar</a>
            <a href="Pedir.php">Pedir</a>
        </form>
    </body>
</html>

<?php
    
if(!empty($_POST['act'])){
    
    $query = "UPDATE productos SET nombre_producto = '".$_POST['producto']."', referencia = '".$_POST['referencia']."', precio = ".$_POST['precio'].", peso='".$_POST['categoria']."', stock=".$_POST['stock']." WHERE id = ".$_GET['data']."";
    if(mysqli_query($con, $query)){
        ?>
            <script>alert('Producto actualizado')</script>
        <?php
        header('Location: http://localhost/Cafeteria/Consultar.php');
    }else{
        ?>
            <script>alert('Error al actualizar')</script>
        <?php
    }
    
}

?>

