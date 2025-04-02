<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home-Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Bootstrap Icons CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .card {
            transition: transform 0.3s, box-shadow 0.3s;
            border-radius: 10px;
            overflow: hidden;
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.2);
        }

        .card img {
            height: 200px;
            object-fit: cover;
            border-bottom: 2px solid #ffc107;
        }

        .card-title {
            font-size: 1.2rem;
        }

        .card-text {
            font-size: 1.1rem;
        }

        .btn-warning {
            font-weight: bold;
        }

        .quantity-input {
            width: 100%;
            padding: 5px;
            text-align: center;
            border: 2px solid #ffc107;
            border-radius: 5px;
        }
    </style>
    <?php
    include 'header.php';
    ?>

</head>

<body>
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <h1 class="text-warning font-monospace my-3 text-center">LAPTOP</h1>
                <?php
                include 'config.php';
                $Record = mysqli_query($con, "select * from tblproduct");
                while ($row = mysqli_fetch_array($Record)) {

                    $check_page = $row['PCategory'];
                    if ($check_page === 'Laptop') {


                        echo "
                        <div class='col-md-6 col-lg-4' m-auto mb-3>
                    <form action='insertcart.php' method='post'>
                    <div class='card m-auto' style='width: 18rem;'>
                    <img src='../admin/product/$row[PImage]' class=card-img-top'>
                    <div class='card-body text-center'>
                    <h5 class='card-title text-danger fs-4 fw-bold'>$row[PName]</h5>
                    <p class='card-text text-warning fs-4 fw-bold''>Rs: $row[PPrice]</p>
                        <input type='Hidden' name='PName'value='$row[PName]'>
                        <input type='Hidden' name='PPrice' value='$row[PPrice]'>
                    <input type='number' name='PQuantity' value='min='1' max='20'' placeholder='Quantity'><br><br>
                    <input type='submit' name='addcart' class='btn btn-warning text-white w-100' value='Add To Cart'>
                    
                    </div>
                </div>
                </form>
                </div>
                ";
                    }
                }
                ?>
            </div>
            <?php
            include 'footer.php';
            ?>

</body>

</html>