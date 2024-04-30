<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $id = $_GET["id"];

    // Eliminar el producto de la base de datos
    $sql = "DELETE FROM productos WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "<p>Producto eliminado correctamente.</p>";
        // Mostrar botón para volver al índice
        echo "<a href='index.php'><button>Volver al Inventario</button></a>";
    } else {
        echo "Error al eliminar el producto: " . $conn->error;
    }

    $conn->close();
}
?>