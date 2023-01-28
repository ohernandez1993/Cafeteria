<?php
require_once './mysqlConnect.php';

?>
<!DOCTYPE html>
<html>
    
    <head>
        
    </head>
    <body>
        <form method="post">
            
            Nombre Producto:
            <input type="text" name="producto" required="true"><br>
            
            referencia:
            <input type="text" name="referencia" required="true"><br>
            
            precio:
            <input type="number" name="precio" required="true"><br>
            
            peso:
            <input type="number" name="peso" required="true"><br>
            
            
            Categoria:
            <input type="text" name="categoria" required="true"><br>
            
            Stock:
            <input type="number" name="stock" required="true"><br>
            
            <input type="submit" value="Guardar" name="guard">
            
            
            <br>
            <a href="Consultar.php">Consultar</a>
            <a href="Pedir.php">Pedir</a>
        </form>
    </body>
</html>

<?php
    
if(!empty($_POST['guard'])){
    
    $query = "INSERT INTO productos (nombre_producto,referencia,precio,peso,categoria,stock,fecha) values('".$_POST['producto']."','".$_POST['referencia']."',".$_POST['precio'].",".$_POST['peso'].",'".$_POST['categoria']."',".$_POST['stock'].",".date("Y-m-d").")";
    if(mysqli_query($con, $query)){
        ?>
            <script>alert('Registro exitoso')</script>
        <?php
        
    }else{
        ?>
            <script>alert('Error al registrar')</script>
        <?php
    }
    
}

?>
