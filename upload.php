<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['files'])) {
    $uploadDir = 'uploads/'; // Directorio donde se guardarán los archivos
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true); // Crear el directorio si no existe
    }

    foreach ($_FILES['files']['tmp_name'] as $key => $tmpName) {
        $fileName = basename($_FILES['files']['name'][$key]);
        $uploadFile = $uploadDir . $fileName;

        // Mover el archivo al directorio de subida
        if (move_uploaded_file($tmpName, $uploadFile)) {
            echo "Archivo subido: " . $fileName . "<br>";
        } else {
            echo "Error al subir el archivo: " . $fileName . "<br>";
        }
    }
    // Redirigir de vuelta a la página principal después de la subida
    header("Location: index.html");
    exit();
}
?>
