<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inventario</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Inventario</h1>

    <!-- Formulario de búsqueda -->
    <form action="index.php" method="get">
        <label for="filtro_fecha">Filtrar por Fecha(DD/MM/AA):</label>
        <input type="text" name="filtro_fecha">

        <label for="filtro_area">Filtrar por Área:</label>
        <select name="filtro_area">
            <option value="">Todas</option>
            <option value="admisiones">Admisiones</option>
            <option value="bienestar">Bienestar</option>
            <option value="calidad">Calidad</option>
            <option value="central_de_pagos">Centrsl de pagos</option>
            <option value="comunaciones">Comunaciones</option>
            <option value="contabilidad">Contabilidad</option>
            <option value="gerencia">Gerencia</option>
            <option value="gghh">GGHH</option>
            <option value="mercadeo">Mercadeo</option>
            <option value="porteria">Porteria</option>
            <option value="rectoria">Rectoria</option>
            <option value="sistemas">Sistemas</option>
            <option value="sst">SST</option>
            <option value="tesoreria">tesoreria</option>
            <!-- Agrega más opciones de área según tus necesidades -->
        </select>

        <label for="filtro_sede">Filtrar por Sede:</label>
        <select name="filtro_sede">
            <option value="">Todas</option>
            <option value="bello">Bello</option>
            <option value="rionegro">Rionegro</option>
            <!-- Agrega más opciones de sede según tus necesidades -->
        </select>

        <label for="filtro_responsable">Filtrar por Responsable:</label>
        <input type="text" name="filtro_responsable" placeholder="Nombre del Responsable">

        <button type="submit">Buscar</button>
    </form>

    <?php
    include 'db.php';

    // Construir la consulta SQL base
    $sql = "SELECT * FROM productos WHERE 1";

    // Aplicar filtros según las opciones seleccionadas en el formulario
    if (isset($_GET['filtro_fecha']) && !empty($_GET['filtro_fecha'])) {
        $filtro_fecha = $_GET['filtro_fecha'];
        $sql .= " AND fecha = '$filtro_fecha'";
    }

    if (isset($_GET['filtro_area']) && !empty($_GET['filtro_area'])) {
        $filtro_area = $_GET['filtro_area'];
        $sql .= " AND area = '$filtro_area'";
    }

    if (isset($_GET['filtro_sede']) && !empty($_GET['filtro_sede'])) {
        $filtro_sede = $_GET['filtro_sede'];
        $sql .= " AND sede = '$filtro_sede'";
    }

    if (isset($_GET['filtro_responsable']) && !empty($_GET['filtro_responsable'])) {
        $filtro_responsable = $_GET['filtro_responsable'];
        $sql .= " AND responsable LIKE '%$filtro_responsable%'";
    }

    // Ejecutar la consulta SQL
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>ID</th><th>Tipo</th><th>Sede</th><th>Área</th><th>Código Numérico</th><th>Fecha</th><th>Características</th><th>Responsable</th><th>Acciones</th></tr>";
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
            echo "<td>".$row["acciones"]."</td>";
            echo "<td><a href='editar.php?id=".$row["id"]."'>Ver</a> | <a href='eliminar.php?id=".$row["id"]."'>Eliminar</a></td>";
            echo "</tr>";
        }
        echo "</table>";

        // Botón para borrar el filtro y mostrar todos los datos
        echo "<a href='index.php' class='button'>Mostrar Todos</a>";
    } else {
        echo "No se encontraron productos.";
    }

    $conn->close();
    ?>

    <button><a href="agregar.php">Agregar Producto</a></button><br><br>
    <!-- Botón para exportar a Excel -->


</body>
</html>
