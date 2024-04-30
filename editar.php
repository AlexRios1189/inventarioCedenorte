<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ver Producto</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
  <?php
    include 'db.php';

    // Mostrar todos los productos en una tabla
    echo "<h2>Inventario Actual</h2>";
    $sql_select = "SELECT * FROM productos";
    $result = $conn->query($sql_select);

    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>ID</th><th>Tipo</th><th>Sede</th><th>Area</th><th>Codig_num</th><th>Fecha</th><th>Caracteristicas</th><th>Responsable</th><th>Acciones</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$row["id"]."</td>";
            echo "<td>".$row["tipo"]."</td>";
            echo "<td>".$row["sede"]."</td>";
            echo "<td>".$row["area"]."</td>";
            echo "<td>".$row["codig_num"]."</td>";
            echo "<td>".$row["fecha"]."</td>";
            echo "<td>".$row["caracteristicas"]."</td>";
            echo "<td>".$row["responsable"]."</td>";
            echo "<td><a href='editar.php?id=".$row["id"]."'>Editar</a></td>"; // Enlace para editar el producto
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No hay productos en el inventario.</p>";
    }

    $conn->close();
    ?>

    <button><a href="index.php">Volver al Inventario</a></button><br><br>
   
</body>
</html>
