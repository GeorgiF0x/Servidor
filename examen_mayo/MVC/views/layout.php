<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/index.css">
    <style>
        tr, td, th {
            border: 1px solid black;
            text-align: center;
        }
      .card-body,
      .card-text {
          margin: 0;
          padding: 0;
      }

      /* CSS para ajustar la altura si es necesario */
      .card {
          height: auto; /* O ajusta la altura según sea necesario */
      }
    </style>
</head>
<body>                  
  <div class="container">
    <header class="mt-5">
        <form action="" method="post" class="ms-2">
            <div class="col-2">
                <input type="submit" value="Log Out" name="Login_CerrarSesion" class="btn btn-dark w-50 ">
                <input type="submit" value="Home" name="ir_home" class="btn btn-dark ">
            </div>
        </form>
    </header>
   
  <main>
      <?php
          if(!isset($_SESSION['vista'])){
              require VIEW.'login.php';
          } else {
              require $_SESSION['vista'];
          }
      ?>
  </main>
  </div>
  
</div>

</body>
</html>