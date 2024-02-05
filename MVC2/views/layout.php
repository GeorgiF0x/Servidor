<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
    <!-- Bootstrap 5 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
</head>

<body>
    <header>
        <?php include 'header.php'; ?>
    </header>

    <main>
        <?php 
        if(isset($_SESSION['vista'])) {
            include $_SESSION['vista'];
        } else {
            // Si no se ha establecido una vista específica, puedes cargar una vista predeterminada aquí
            include 'default_view.php';
        }
        ?>
    </main>

    <footer>
        <?php include 'footer.php'; ?>
    </footer>

    <!-- Bootstrap 5 JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>


