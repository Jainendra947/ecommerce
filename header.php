<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Bootstrap Icons CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <style>
        .emart{
            position:absolute;
            bottom: 12px;
            left: 5%;
        }
    </style>
</head>
<?php

session_start();
$count = 0;
if (isset($_SESSION['CART'])) {
    $count = count($_SESSION['CART']);
}

?>

<body>
    <nav class="navbar navbar-light bg-dark">
        <div class="container-fluid font-monospace">
            <a class="navbar-brand pb-2"><img src="data:image/jpeg;base64,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" style="height:50px; width:50px; border-radius:50%;" alt=""></a>
            <div class='emart'>
                <h2 class="text-white">E-MART</h2>
            </div>

            <div class="d-flex">
                <a href="index.php" class="text-warning text-decoration-none pe-2"><i class="bi bi-house"></i>Home |</a>
                <a href="viewcart.php" class="text-warning text-decoration-none pe-2"><i class="bi bi-cart-fill"></i> Cart(<?php echo $count  ?>) |</a>
                <span class="text-warning pe-2">
                    <i class="bi bi-person"></i>Hello,

                    <?php
                    if (isset($_SESSION['user'])) {
                        echo $_SESSION['user'];
                        echo " |";
                        echo "
                    <a href='form/logout.php' class='text-warning text-decoration-none pe-2'><i class='bi bi-box-arrow-in-right'></i> Logout|</a>
                    ";
                    } else {

                        echo "
                    <a href='form/login.php'  class='text-warning text-decoration-none pe-2'><i class='bi bi-box-arrow-in-right'></i> Login|</a>
                    ";
                    }
                    ?>
                    <a href="../admin/mystore.php" class="text-warning text-decoration-none pe-2">Admin</a>
                </span>
    </nav>
    </div>
    <div class="bg-success sticky-top font-monospace">
        <ul class="list-unstyled d-flex justify-content-center">
            <li>
                <a href="mobile.php" class="text-decoration-none text-white fw-bold fs-4 px-5">Mobiles</a>
                <a href="bag.php" class="text-decoration-none text-white fw-bold fs-4 px-5">Fashion</a>
                <a href="laptop.php" class="text-decoration-none text-white fw-bold fs-4 px-5">Laptops</a>
            </li>
        </ul>
    </div>
</body>


</html>