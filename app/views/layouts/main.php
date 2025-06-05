<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?? 'LSP App' ?></title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.0/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-900 font-sans">
    <div class="container mx-auto p-6">
        <?php
        // Pastikan variabel $viewPath tersedia dan file-nya ada
        if (isset($viewPath) && file_exists($viewPath)) {
            require_once $viewPath;
        } else {
            echo "<p class='text-red-600'>File tampilan tidak ditemukan.</p>";
        }
        ?>
    </div>
</body>
</html>
