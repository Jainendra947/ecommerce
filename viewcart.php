<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Viewcart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Bootstrap Icons CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <?php
    include 'header.php'
    ?>
    
    <style>
        body {
            background-color: #f8f9fa;
        }

        .cart-header {
            background-color: #343a40;
            color: #fff;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        h1 {
            font-weight: bold;
            letter-spacing: 1px;
        }

        .table {
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        thead {
            background-color: #dc3545;
            color: white;
        }

        tbody tr:hover {
            background-color: #f1f1f1;
            transition: 0.3s;
        }

        .btn-warning {
            background-color: #ff9800;
            border: none;
        }

        .btn-warning:hover {
            background-color: #e68900;
        }

        .btn-danger {
            background-color: #d9534f;
            border: none;
        }

        .btn-danger:hover {
            background-color: #c9302c;
        }

        .grand-total {
            text-align: center;
            margin-top: 20px;
        }

        .grand-total h3 {
            color: #343a40;
            font-weight: bold;
        }

        .grand-total h1 {
            background-color: #dc3545;
            color: white;
            padding: 10px;
            border-radius: 10px;
            display: inline-block;
            min-width: 200px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center bg-light mb-5 rounded">
                <h1 class="text-warning">MY CART</h1>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row justify-content-around">
            <div class="col-sm-12 col-md-6 col-lg-9">
                <table class="table table-bordered text-center ">
                    <thead class="bg-danger text-white fs-5">
                        <th>SR. No.</th>
                        <th>Product Name</th>
                        <th>Product Price</th>
                        <th>Product Quantity</th>
                        <th>Total Price</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </thead>
                    <tbody>
                    <tbody>
                        <?php
                        $total = 0; 
                        $gtotal=0;
                        if (isset($_SESSION['CART'])) {
                            foreach ($_SESSION['CART'] as $key => $value) {
                                // Ensure values are numeric
                                $price = floatval($value['productPrice']);
                                $quantity = intval($value['productQuantity']);
                                $total = $price * $quantity;
                                $gtotal+=$price * $quantity;
                                $i=$key+1;


                                echo "
            <form action='insertcart.php' method='post'>
            <tr>
                <td>$i</td>
                <td><input type='hidden' name='PName' value='$value[productName]'>$value[productName]</td>
                <td><input type='hidden' name='PPrice' value='$value[productPrice]'>$value[productPrice]</td>
                <td><input type='text' name='PQuantity' class='text-center' value='$value[productQuantity]'></td>
                <td>$total</td>
                <td><button name='update' class='btn btn-warning'>Update</button></td>
                <td><button name='remove' class='btn btn-danger'>Delete</button></td>
                <td><input type='hidden' name='item' value='$value[productName]'></td>
            </tr>
            </form>
            ";
                            }
                        }
                        ?>
                    </tbody>

                    </tbody>
                </table>
                <div class="lg-3 text-center">
                    <h3>GRAND TOTAL</h3>
                    <h1 class='bg-danger text-white'><?php echo"Rs.  "; echo  number_format($gtotal,2)  ?></h1>
                </div>
            </div>
        </div>
    </div>
</body>

</html>