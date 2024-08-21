<?php
$uploadDir = 'uploads/';
$files = scandir($uploadDir);

foreach ($files as $file) {
    if ($file !== '.' && $file !== '..') {
        $filePath = $uploadDir . $file;
        if (preg_match('/\.(jpg|jpeg|png|gif)$/i', $file)) {
            echo "<img src='$filePath' alt='$file' style='max-width: 100px; margin: 10px;'>";
        } elseif (preg_match('/\.(mp4|webm|ogg)$/i', $file)) {
            echo "<video src='$filePath' controls style='max-width: 100px; margin: 10px;'></video>";
        }
    }
}
?>
