<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Producto</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Agregar Producto</h1>

    <form action="agregar.php" method="post">
        <label for="tipo">Tipo:</label>
        <select name="tipo">
          <option value="sistemas">Sistemas</option>
          <option value="inmobiliario" selected>Inmobiliario</option>
       </select><br><br>
        <label for="sede">Sede:</label>
        <input type="sede" id="sede" name="sede" required><br><br>
        <label for="area">Area:</label>
        <input type="sede" id="area" name="area" required><br><br>
        <label for="codig_num">Codigo Num:</label>
        <input type="number" id="codig_num" name="codig_num" required><br><br>
        <label for="fecha">Fecha DD/MM/AAAA:</label>
        <input type="fecha" id="fecha" name="fecha" required><br><br>
        <label for="caracteristicas">Caracteristas:</label><br><br>
        <textarea name="caracteristicas" rows="10" cols="50" type="text" id="caracteristicas"></textarea><br><br>
        <label for="responsable">Responsable:</label>
        <input type="text" id="responsable" name="responsable" required><br><br>
        <input type="submit" value="Agregar">
    </form>

    <?php
    include 'db.php';

    // Procesar el formulario de agregar
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $tipo = $_POST["tipo"];
        $sede = $_POST["sede"];
        $area = $_POST["area"];
        $codig_num = $_POST["codig_num"];
        $fecha = $_POST["fecha"];
        $caracteristicas = $_POST["caracteristicas"];
        $responsable = $_POST["responsable"];
    

        $sql = "INSERT INTO productos (tipo, sede, area, codig_num, fecha, caracteristicas, responsable) VALUES ('$tipo', '$sede', '$area', '$codig_num', '$fecha', '$caracteristicas', '$responsable')";

        if ($conn->query($sql) === TRUE) {
            echo "<p>Producto agregado correctamente.</p>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    $conn->close();
    ?>

   <button><a href="index.php">Volver al Inventario</a></button>

</body>
</html>