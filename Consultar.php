<?php 

require_once './mysqlConnect.php';

$query= "SELECT * FROM productos";

$xResultado = mysqli_query($con, $query);

if(isset($_GET['data'])){
    
    $delete = mysqli_query($con,"DELETE FROM productos WHERE id=".$_GET['data']);
    if($delete){
        ?>
            <script>alert('Producto eliminado correctamente')</script>
        <?php
        header('Location: http://localhost/Cafeteria/Consultar.php');
        
    }else{
        ?>
            <script>alert('Ocurrio un error al eliminar el registro')</script>
        <?php
        header('Location: http://localhost/Cafeteria/Consultar.php');
    }
}

?>
<html>
    <head>
    </head>
    <body>
        
        <center>
           
                <a href="index.php">Registrar</a>
                <a href="Pedir.php">Pedir</a>
                <a href="Estadisticas.php">Estadisticas</a>
                
                <br><br>
                <table border="1">
                    <tr>
                        <td>Producto</td>
                        <td>Referencia</td>
                        <td>Precio</td>
                        <td>Peso</td>
                        <td>Categoria</td>
                        <td>stock</td>
                        <td>Editar</td>
                        <td>Eliminar</td>
                    </tr>
                    <?php 
                    
                    while ($vResultado = mysqli_fetch_array($xResultado)){
                        ?>
                        <tr>
                            <td><?php echo $vResultado['nombre_producto'] ?></td>
                            <td><?php echo $vResultado['referencia'] ?></td>
                            <td><?php echo $vResultado['precio'] ?></td>
                            <td><?php echo $vResultado['peso'] ?></td>
                            <td><?php echo $vResultado['categoria'] ?></td>
                            <td><?php echo $vResultado['stock'] ?></td>
                            <td>
                                <input type="submit" value="Editar" onclick=" window.location.href ='http://localhost/Cafeteria/Editar.php?data=<?php echo $vResultado['id']  ?>'"/>
                            </td>
                            <td>
                                <input type="submit" value="eliminar" onclick=" window.location.href ='http://localhost/Cafeteria/Consultar.php?data=<?php echo $vResultado['id']  ?>'"/>
                                
                            </td>
                            
                        </tr>
                        <?php
                    }// while ($vResultado){
                    
                    ?>
                </table>
                
            
        
        </center>
        
    </body>
</html>

